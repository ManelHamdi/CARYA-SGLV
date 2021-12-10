<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Contrat extends Pivot
{
    use HasFactory;

    public $incrementing = true;
    
    public $table = "contrat";

    protected $fillable = [
        'id', 'client_id', 'vehicule_matricule',
        'livraison', 'reprise',
        'dateDebut', 'dateFin',
        'carburationL', 'carburationR',
        'kmL', 'kmR',
        'nbrJour', 'prolongation',
    ];

    public function designUnit()
    {
        return $this->hasOne(DesignUnit::class);
    }

    public function designMontant()
    {
        return $this->hasOne(DesignMontant::class);
    }

    public function checkout()
    {
        return $this->hasOne(Checkout::class);
    }

    public function montant()
    {
        return $this->hasOne(Montant::class);
    }
}
