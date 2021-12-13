<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ContratController;
use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\Client;
use App\Models\Conducteur;
use App\Models\Contrat;
use App\Models\Designmontant;
use App\Models\Designunit;
use App\Models\Montant;
use App\Models\Vehicule;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;
use RealRashid\SweetAlert\Toaster;

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

    static function getConducteur($client_id)
    {
        return Conducteur::where('client_id', $client_id)->first();
    }

    static function getMontant($contrat_id)
    {
        return Montant::where('contrat_id', $contrat_id)->first();
    }

    static function getCheckOut($contrat_id)
    {
        return Checkout::where('contrat_id', $contrat_id)->first();
    }

    static function getDesignUnit($contrat_id)
    {
        return Designunit::where('contrat_id', $contrat_id)->first();
    }

    static function getDesignMontant($contrat_id)
    {
        return Designmontant::where('contrat_id', $contrat_id)->first();
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
        toast('Contrat cree avec success', 'success');
        return redirect()->to('/contrats');
    }

    public function edit(Contrat $contrat)
    {
        //dd($contrat->vehicule_matricule);
        $vehicules = Vehicule::all()->where('disponibilite', 1);
        $client = $this->findClient($contrat->client_id);
        $montant = $this->getMontant($contrat->id);
        $checkOut = $this->getCheckOut($contrat->id);
        $designUnit = $this->getDesignUnit($contrat->id);
        $designMontant = $this->getDesignMontant($contrat->id);
        $conducteur = $this->getConducteur($client->id);
        return view('contrats.edit', [
            'contrat' => $contrat,
            'vehicule' => $contrat->vehicule_matricule,
            'client' => $client,
            'vehicules' => $vehicules,
            'montant' => $montant,
            'checkOut' => $checkOut,
            'designUnit' => $designUnit,
            'designMontant' => $designMontant,
            'conducteur' => $conducteur,
        ]);
        //return view('contrats.edit', compact('contrat'));
    }

    public function update(Request $request, Contrat $contrat)
    {
        $client = $this->findClient($contrat->client_id);
        $montant = $this->getMontant($contrat->id);
        $checkOut = $this->getCheckOut($contrat->id);
        $designUnit = $this->getDesignUnit($contrat->id);
        $designMontant = $this->getDesignMontant($contrat->id);
        $conducteur = $this->getConducteur($client->id);
        $contratController = new ContratController();
        $contratController->update($request, $contrat, $checkOut, $designUnit, $designMontant, $montant, $client, $conducteur);

        //Alert::success('Contrat', 'modifier avec success');
        //Alert::toast('Toast Message', 'success');
        toast('Contrat modifier avec success', 'success');
        return redirect()->to('/contrats');


    }
}
