<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Contrats;
use App\Models\Checkout;
use App\Models\Client;
use App\Models\Conducteur;
use App\Models\Contrat;
use App\Models\Designmontant;
use App\Models\Designunit;
use App\Models\Montant;
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
        $contratscomp = new Contrats();
        $contratscomp->render();
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
                'vehicule_matricule' => 'required|not_in:--- Sélectionnez Matricule *---',
                'nom' => 'required', 'prenom' => 'required',
                //'adresse' => 'required', 'ville' => 'required',
                'tel' => 'sometimes|nullable|numeric|digits:8', 'telc' => 'sometimes|nullable|numeric|digits:8',
                'cin' => 'required|numeric|digits:8', 'permisConduire' => 'required',
                'dateDebut' => 'required', 'dateFin' => 'required',
                'livraison' => 'required', 'reprise' => 'required',
                'montantRecu' => 'required',
                /*
                'sousTotal' => 'required', 'montantNet' => 'required',
                'montantDuD' => 'required', 'montantDu' => 'required',
                */
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
            $vehiculeController = new VehiculeController();


            $checkOutController->addCheckout($request, $contrat);
            $designunitController->addDesignU($request, $contrat);
            $designmontantController->addDesignM($request, $contrat);
            $montantController->addMontant($request, $contrat);


            $vehiculeController = new VehiculeController();
            $vehiculeController->updatennDispo($request->vehicule_matricule);
        } catch (\Illuminate\Database\QueryException $ex) {
            dd($ex->getMessage());
        }

        //return view('contrats.index')
          //  ->with('success', 'Contrat created successfully.');
          return true;
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
    public function update(
        Request $request,
        Contrat $contrat,
        Checkout $checkOut,
        Designunit $designUnit,
        Designmontant $designMontant,
        Montant $montant,
        Client $client,
        Conducteur $conducteur
    ) {
        try {
            $request->validate([
                'vehicule_matricule' => 'required',
                'nom' => 'required', 'prenom' => 'required',
                'adresse' => 'required', 'ville' => 'required',
                'tel' => 'numeric|digits:8', 'telc' => 'numeric|digits:8',
                'cin' => 'required|numeric|digits:8', 'permisConduire' => 'required',
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
            //$input = $request->all();

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

            $clientController->updateClient($request, $client, $conducteur);
            //$vehicule = Vehicule::find($request->vehicule_matricule);
            //$vehicule->clients()->attatch($client->id, $contrat);

            $contrat->vehicule_matricule = $request->vehicule_matricule;
            $contrat->client_id = $client->id;
            $contrat->update();


            //Contrat::create(array_merge($input, ['nbrJour' => $days]));

            $checkOutController = new ChekoutController();
            $designunitController = new DesignunitController();
            $designmontantController = new DesignmontantController;
            $montantController = new MontantController();
            $vehiculeController = new VehiculeController();

            $checkOutController->updateCheckout($request, $contrat, $checkOut);
            $designunitController->updateDesignU($request, $contrat, $designUnit);
            $designmontantController->updateDesignM($request, $contrat, $designMontant);
            $montantController->updateMontant($request, $contrat, $montant);

            if (!empty($request->matricule)) {
                $vehiculeController = new VehiculeController();
                $vehiculeController->updatennDispo($request->matricule);
            }

        } catch (\Illuminate\Database\QueryException $ex) {
            dd($ex->getMessage());
        }

        return true;
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
