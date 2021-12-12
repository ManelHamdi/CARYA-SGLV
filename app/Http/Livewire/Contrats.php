<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ContratController;
use App\Models\Checkout;
use App\Models\Client;
use App\Models\Conducteur;
use App\Models\Contrat;
use App\Models\Designmontant;
use App\Models\Designunit;
use App\Models\Montant;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Livewire\Component;

class Contrats extends Component
{
    public $contrats, $client_id, $vehicule_matricule,
        $livraison, $reprise,
        $dateDebut, $dateFin,
        $carburationD, $carburationR,
        $kmD, $kmR, $nbrJour, $prolongation,
        $contrat_id, $vehicule;

    public $client = '\App\Http\Livewire\Contrats::findClient';
    public $montant = '\App\Http\Livewire\Contrats::getMontant';

    public $updateMode = false;

    public function render()
    {
        $this->contrats = Contrat::latest()->paginate(5);

        $this->client_id = 221133;
        return view('contrats.index', [
            'contrats' => $this->contrats,
            'client' => $this->client,
            'montant' => $this->montant
        ]);
    }

    static function findClient($client_id)
    {
        return Client::find($client_id);
    }

    static function getMontant($contrat_id)
    {
        return Montant::where('contrat_id', $contrat_id)->first();
    }

    public function create()
    {
        $vehicules = Vehicule::all()->where('disponibilite', 1);
        //$clients = Client::all();
        return view('contrats.create', [
            'vehicules' => $vehicules,
            //'clients' => $clients,
        ]);
    }

    public function store(Request $request)
    {
        $contratController = new ContratController();
        $contratController->store($request);
    }

    public function edit(Contrat $contrat)
    {
        //dd($contrat->vehicule_matricule);
        $vehicules = Vehicule::all()->where('disponibilite', 1);
        $client = Client::find($contrat->client_id);
        return view('contrats.edit', [
            'contrat' => $contrat,
            'vehicule' => $contrat->vehicule_matricule,
            'client' => $client,
            'vehicules' => $vehicules,
        ]);
        //return view('contrats.edit', compact('contrat'));
    }

    public function update(Request $request, Contrat $contrat)
    {
        $client = Client::find($contrat->client_id);
        $montant = Montant::where('contrat_id', $contrat->id)->first();
        $checkOut = Checkout::where('contrat_id', $contrat->id)->first();
        $designUnit = Designunit::where('contrat_id', $contrat->id)->first();
        $designMontant = Designmontant::where('contrat_id', $contrat->id)->first();
        $conducteur = Conducteur::where('client_id', $client->id)->first();
        $contratController = new ContratController();
        $contratController->update($request, $contrat, $checkOut, $designUnit, $designMontant, $montant, $client, $conducteur);
    }


}
