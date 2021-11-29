<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
    use HasFactory;

    protected $fillable = [
        'panne', 'desc',
        'prix',
        'datePanna', 'nbrJour',
        'vehicule_matricule', 'employe_id',
    ];

    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class);
    }

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}
