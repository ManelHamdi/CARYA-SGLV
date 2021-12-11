<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Contrat extends Pivot
{
    use HasFactory;

    public $incrementing = true;

    public $table = "contrats";

    protected $fillable = [
        'id', 'client_id', 'vehicule_matricule',
        'livraison', 'reprise',
        'dateDebut', 'dateFin',
        'carburationD', 'carburationR',
        'kmD', 'kmR',
        'nbrJour', 'prolongation',
    ];

    public function designunit()
    {
        return $this->hasOne(Designunit::class);
    }

    public function designmontant()
    {
        return $this->hasOne(Designmontant::class);
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
