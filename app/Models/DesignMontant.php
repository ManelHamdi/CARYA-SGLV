<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designmontant extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'contrat_id', 
        'locationBase', 'conducteur', 
        'siegeBebe', 'chauffeur', 
        'surchargeAerop', 'remise', 
        'fraisLivraison', 'fraisReprise', 
        'tva', 'suppFranchise', 
        'assurancePassager', 'timbre',
    ];

    public function contrat()
    {
        return $this->belongsTo(Contrat::class);
    }
}
