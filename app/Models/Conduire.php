<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conduire extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'adresse',
        'ville', 'tel',
        'dateNaissance', 'lieuNaissance',
        'nationalite', 'cin', 'dateEmit',
        'permisConduire', 'dateEmitPermis',
        'delivrePermis',
        'client_id',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
