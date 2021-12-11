<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Contrat;
use App\Models\Vehicule;
use DateTime;
use Illuminate\Http\Request;

class ContratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$contrats = Contrat::latest()->paginate(5);
        //$clients = Client::all();

        return view('contrats.index', compact('contrats'))
            ->with('i', (request()->input('page', 1) - 1) * 4);
        //$contrats = Contrat::latest()->paginate(5);
        /*$vehicules = Vehicule::with('clients')->get();
        //dd($contrats);
        return view('contrats.index', compact('vehicules'))
            ->with('mvehicules', Vehicule::with('clients')->paginate(5));*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicules = Vehicule::all()->where('disponibilite', 1);
        $clients = Client::all();
        return view('contrats.create', compact('vehicules', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'vehicule_matricule' => 'required',
                'nom' => 'required', 'prenom' => 'required',
                'adresse' => 'required', 'ville' => 'required',
                'cin' => 'required', 'permisConduire' => 'required',
                'dateDebut' => 'required', 'dateFin' => 'required',
                'livraison' => 'required', 'reprise' => 'required',
                'sousTotal' => 'required', 'montantNet' => 'required',
                'montantDuD' => 'required', 'montantRecu' => 'required',
                'montantDu' => 'required',
            ]);

            $clientController = new ClientController();


            $sdate = $request->dateDebut;
            $fdate = $request->dateFin;
            $datetime1 = new DateTime($sdate);
            $datetime2 = new DateTime($fdate);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');
            $input = $request->all();

            $contrat = new Contrat();
            $contrat->vehicule_matricule = $request->matricule;
            $contrat->livraison = $request->livraison;
            $contrat->reprise = $request->reprise;
            $contrat->dateDebut = $request->dateDebut;
            $contrat->dateFin = $request->dateFin;
            $contrat->carburationD = $request->carburationD;
            $contrat->carburationR = $request->carburationR;
            $contrat->kmD = $request->kmD;
            $contrat->kmR = $request->kmR;
            $contrat->nbrJour = $days;
            $contrat->prolongation = $request->prolongation;

            $client = $clientController->addClient($request);
            //$vehicule = Vehicule::find($request->vehicule_matricule);
            //$vehicule->clients()->attatch($client->id, $contrat);

            $contrat->vehicule_matricule = $request->vehicule_matricule;
            $contrat->client_id = $client->id;
            $contrat->save();



            //Contrat::create(array_merge($input, ['nbrJour' => $days]));

            $checkOutController = new ChekoutController();
            $designunitController = new DesignunitController();
            $designmontantController = new DesignmontantController;
            $montantController = new MontantController();


            $checkOutController->addCheckout($request, $contrat);
            $designunitController->addDesignU($request, $contrat);
            $designmontantController->addDesignM($request, $contrat);
            $montantController->addMontant($request, $contrat);

            //$contrat->checkout()->save($checkOut);
            //$contrat->designUnit()->save($designUnit);
            //$contrat->designMontant()->save($designMontant);
            //$contrat->montant()->save($montatnt);

        } catch (\Illuminate\Database\QueryException $ex) {
            dd($ex->getMessage());
        }

        return redirect()->route('contrats.index')
            ->with('success', 'Contrat created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contrat  $contrat
     * @return \Illuminate\Http\Response
     */
    public function show(Contrat $contrat, Vehicule $vehicule, Client $client)
    {
        return view('contrats.show', compact('contrat', 'vehicule', 'client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contrat  $contrat
     * @return \Illuminate\Http\Response
     */
    public function edit(Contrat $contrat, Vehicule $vehicule, Client $client)
    {
        $vehicules = Vehicule::all()->where('disponibilite', 1);
        $clients = Client::all();
        return view('contrats.edit', compact('contrat', 'vehicule', 'client', 'vehicules', 'clients'));
        //return view('contrats.edit', compact('contrat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contrat  $contrat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contrat $contrat)
    {
        try {
            $request->validate([
                'client_id' => 'required', 'vehicule_matricule' => 'required',
                'dateDebut' => 'required', 'dateFin' => 'required',
                //'remise' => 'required', 'montant' => 'required',
                //'fraisLivraison' => 'required', 'fraisReprise' => 'required',
            ]);

            $sdate = $request->dateDebut;
            $fdate = $request->dateFin;
            $datetime1 = new DateTime($sdate);
            $datetime2 = new DateTime($fdate);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');
            $request->request->add(['nbrJour' => $days]);
            $input = $request->all();
            $contrat->update($input);

        } catch (\Illuminate\Database\QueryException $ex) {
            dd($ex->getMessage());
        }

        return redirect()->route('contrats.index')
            ->with('success', 'Contrat updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contrat  $contrat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contrat $contrat)
    {
        $contrat->delete();

        return redirect()->route('contrats.index')
            ->with('success', 'Contrat deleted successfully');
    }
}
