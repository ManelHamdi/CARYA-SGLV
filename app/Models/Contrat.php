<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Contrat extends Pivot
{
    use HasFactory;
    public $table = "contrat";
    protected $fillable = [
        'client_id', 'vehicule_matricule',
        'dateDebut', 'dateFin',
        'nbrJour',
        'remise', 'montant',
        'fraisLivraison', 'fraisReprise',
    ];
}
