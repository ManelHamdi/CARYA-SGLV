<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Contrat;
use App\Models\Montant;
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
}
