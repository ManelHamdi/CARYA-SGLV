<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Contrat;
use App\Models\Vehicule;
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
        $contrats = Contrat::latest()->paginate(5);

        return view('contrats.index', compact('contrats'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contrats.create');
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
                'nbrJour' => 'required',
                'remise' => 'required', 'montant' => 'required',
                'fraisLivraison' => 'required', 'fraisReprise' => 'required',
            ]);


            $input = $request->all();
            Contrat::create($input);

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
    public function show(Contrat $contrat)
    {
        return view('contrats.show', compact('contrat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contrat  $contrat
     * @return \Illuminate\Http\Response
     */
    public function edit(Contrat $contrat)
    {
        return view('contrats.edit', compact('contrat'));
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
                'nbrJour' => 'required',
                'remise' => 'required', 'montant' => 'required',
                'fraisLivraison' => 'required', 'fraisReprise' => 'required',
            ]);


            $input = $request->all();
            Contrat::update($input);

        } catch (\Illuminate\Database\QueryException $ex) {
            dd($ex->getMessage());
        }
        
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

    // To get all vehicules of a client
    public function getVehicules($client_id)
    {
        return Client::find($client_id)->vehicules;
    }

    // To get all clients by vehicule
    public function getClients($vehicule_matricule)
    {
        return Vehicule::find($vehicule_matricule)->clients;
    }
}
