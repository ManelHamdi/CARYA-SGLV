<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use HasFactory;

    protected $fillable = [
        'idClient', 'matricule',
        'dateDebut', 'dateFin',
        'nbrJour',
        'remise', 'montant',
        'fraisLivraison', 'fraisReprise',
    ];
}
