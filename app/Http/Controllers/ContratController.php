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
        /*$contrats = Contrat::latest()->paginate(5);
        $clients = Client::all();

        return view('contrats.index', compact('contrats', 'clients'))
            ->with('i', (request()->input('page', 1) - 1) * 4);*/
        //$contrats = Contrat::latest()->paginate(5);
        $vehicules = Vehicule::with('clients')->get();
        //dd($contrats);
        return view('contrats.index', compact('vehicules'))
            ->with('mvehicules', Vehicule::with('clients')->paginate(5));
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
            $input = $request->all();
            Contrat::create(array_merge($input, ['nbrJour' => $days]));
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
