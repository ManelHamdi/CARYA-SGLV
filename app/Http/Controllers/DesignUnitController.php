<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use App\Models\Designunit;
use Illuminate\Http\Request;

class DesignunitController extends Controller
{
    public function addDesignU(Request $request, Contrat $contrat) 
    {
        $designunit = new Designunit();
        $designunit->locationBase = $request->locationBase;
        $designunit->conducteur = $request->conducteur;
        $designunit->siegeBebe = $request->siegeBebe;
        $designunit->chauffeur = $request->chauffeur;
        $designunit->surchargeAerop = $request->surchargeAerop;
        $designunit->remise = $request->remise;
        $designunit->fraisLivraison = $request->fraisLivraison;
        $designunit->fraisReprise = $request->fraisReprise;
        $designunit->tva = $request->tva;
        $designunit->suppFranchise = $request->suppFranchise;
        $designunit->assurancePassager = $request->assurancePassager;
        $designunit->timbre = $request->timbre;
        
        $designunit->contrat_id = $contrat->id;
        $designunit->save();
    }
}
