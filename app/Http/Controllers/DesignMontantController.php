<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use App\Models\Designmontant;
use Illuminate\Http\Request;

class DesignmontantController extends Controller
{
    public function addDesignM(Request $request, Contrat $contrat) 
    {
        $designm = new Designmontant();
        $designm->locationBase = $request->locationBase;
        $designm->conducteur = $request->conducteur;
        $designm->siegeBebe = $request->siegeBebe;
        $designm->chauffeur = $request->chauffeur;
        $designm->surchargeAerop = $request->surchargeAerop;
        $designm->remise = $request->remise;
        $designm->fraisLivraison = $request->fraisLivraison;
        $designm->fraisReprise = $request->fraisReprise;
        $designm->tva = $request->tva;
        $designm->suppFranchise = $request->suppFranchise;
        $designm->assurancePassager = $request->assurancePassager;
        $designm->timbre = $request->timbre;

        $designm->contrat_id = $contrat->id;
        $designm->save();
    }
}
