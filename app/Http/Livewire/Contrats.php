<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ContratController;
use App\Models\Checkout;
use App\Models\Client;
use App\Models\Conducteur;
use App\Models\Contrat;
use App\Models\Designmontant;
use App\Models\Designunit;
use App\Models\Entreprise;
use App\Models\Montant;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Meneses\LaravelMpdf\Facades\LaravelMpdf as PDf;

class Contrats extends Component
{
    public $contrats, $client_id, $vehicule_matricule,
        $livraison, $reprise,
        $dateDebut, $dateFin,
        $carburationD, $carburationR,
        $kmD, $kmR, $nbrJour, $prolongation,
        $contrat_id;

    public $client = '\App\Http\Livewire\Contrats::findClient';
    public $vehicule = '\App\Http\Livewire\Contrats::findVehicule';
    public $montant = '\App\Http\Livewire\Contrats::getMontant';
    public $designu = '\App\Http\Livewire\Contrats::getDesignUnit';
    public $designm = '\App\Http\Livewire\Contrats::getDesignMontant';
    public $conducteur = '\App\Http\Livewire\Contrats::getConducteur';
    public $checkOut = '\App\Http\Livewire\Contrats::getCheckOut';

    public $updateMode = false;
    public $search = '';

    public function __construct()
    {
        $this->contrats = Contrat::latest()->paginate(4);
    }

    public function render()
    {
        //Log::error("message: ". $this->search);
        $this->contrats = Contrat::latest()->paginate(4);
        //$search = '%'.$this->search.'%';

        return view('Livewire.index', [
            //'contrats' => $this->contrats,
            'client' => $this->client,
            'montant' => $this->montant,
            //'contrats' => $this->contrats,
            'search' => $this->search,


            'contrats' => Contrat::whereLike('vehicule_matricule', $this->search ?? '')->latest()->paginate(4),
        ]);
    }

    public function indexFiltering(Request $request)
    {
        $this->search = $request->query('search');
        info('search func.');
        $this->contrats = Contrat::whereLike('vehicule_matricule', $this->search ?? '')->paginate(4);

        return view('Livewire.index', ['client' => $this->client,
        'montant' => $this->montant,])->with('contrats', $this->contrats)->with('search', $this->search);
    }

    public function show(Contrat $contrat)
    {
        //$ident = Auth::employe();
        $idEntreprise = Auth::guard('employe')->user()->entreprise_id;
        $cemploye = Auth::guard('employe')->user();
        $entreprise = $this->getEntreprise($idEntreprise);
        return view('contrats.show', [
            'contrat' => $contrat,
            'client' => $this->client,
            'vehicule' => $this->vehicule,
            'entreprise' => $entreprise,
            'designu' => $this->designu,
            'designm' => $this->designm,
            'montant' => $this->montant,
            'conducteur' => $this->conducteur,
            'checkOut' => $this->checkOut,
            'cemploye' => $cemploye,
        ]);
    }

    public function print(Contrat $contrat)
    {
        $idEntreprise = Auth::guard('employe')->user()->entreprise_id;
        $cemploye = Auth::guard('employe')->user();
        $entreprise = $this->getEntreprise($idEntreprise);
        return view('contrats.printpaper', [
            'contrat' => $contrat,
            'client' => $this->client,
            'vehicule' => $this->vehicule,
            'entreprise' => $entreprise,
            'designu' => $this->designu,
            'designm' => $this->designm,
            'montant' => $this->montant,
            'conducteur' => $this->conducteur,
            'checkOut' => $this->checkOut,
            'cemploye' => $cemploye,
        ]);
    }

    public function printpdf(Contrat $contrat)
    {
        $idEntreprise = Auth::guard('employe')->user()->entreprise_id;
        $cemploye = Auth::guard('employe')->user();
        $entreprise = $this->getEntreprise($idEntreprise);
    }

    public function create()
    {
        $vehicules = Vehicule::all()->where('disponibilite', 1);
        //$clients = Client::all();
        return view('contrats.create', [
            'vehicules' => $vehicules,
            'fvehicule' => $this->vehicule,
            //'clients' => $clients,
        ]);
    }

    public function store(Request $request)
    {
        $contratController = new ContratController();
        $contratController->store($request);
        toast('Contrat cree avec success', 'success');
        return redirect()->to('/contrat');
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
        return redirect()->to('/contrat');
    }

    public function destroy(Contrat $contrat)
    {
        $contrat->delete();
        toast('Contrat supprimer avec success', 'info');
        return redirect()->to('/contrat');
    }

    static function findClient($client_id)
    {
        return Client::find($client_id);
    }

    static function findVehicule($vehicule_matricule)
    {
        return Vehicule::find($vehicule_matricule);
    }

    static function getEntreprise($idEntreprise)
    {
        return Entreprise::find($idEntreprise);
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
}
