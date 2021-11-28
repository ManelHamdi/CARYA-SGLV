<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;

    protected $table = 'vehicules';
    protected $primaryKey = 'matricule';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'matricule', 'prixLoc',
        'dateAchat',
        'type', 'model',
        'marque', 'couleur',
        'nbrPlaces', 'climatisation',
        'description', 'carburation',
        'kilometrage', 'puissance',
        'boiteVitesse', 'tailleMoteur',
        'disponibilite',
    ];


    public function clients()
    {
        return $this->belongsToMany(Client::class, 'contrat');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function rapports()
    {
        return $this->hasMany(Rapport::class);
    }
}
