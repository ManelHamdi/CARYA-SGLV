<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Client extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'cin', 'nom', 'prenom',
        'tel', 'email', 'password',
        'dateNaissance', 'lieuNaissance',
        'adresse',
        'permisConduire', 'dateEmitCond',
        'ville', 'codePostal',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public function vehicules()
    {
        return $this->belongsToMany(Vehicule::class, 'contrat', 'client_id', 'vehicule_matricule')
        ->withTimestamps()
        ->withPivot('id', 'dateDebut', 'dateFin', 
        'nbrJour', 'remise', 'montant', 
        'fraisLivraison', 'fraisReprise')
        ->as('contrat');
    }
}
