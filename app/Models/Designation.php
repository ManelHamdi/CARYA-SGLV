<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;

    protected $fillable = [
        'contrat_id',
        'name',
        'prixUnitaire', 'montant',
    ];

    public function contrat()
    {
        return $this->belongsTo(Contrat::class);
    }
}
