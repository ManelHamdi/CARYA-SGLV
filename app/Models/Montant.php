<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Montant extends Model
{
    use HasFactory;

    protected $fillable = [
        'sousTotal',
        'montantNet', 'montantDuD',
        'montantRecu', 'montantDu',
        'contrat_id',
    ];

    public function contrat()
    {
        return $this->belongsTo(Contrat::class);
    }
}
