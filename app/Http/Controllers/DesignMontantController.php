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
        $designm->locationBase = $request->locationBasem;
        $designm->conducteur = $request->conducteurm;
        $designm->siegeBebe = $request->siegeBebem;
        $designm->chauffeur = $request->chauffeurm;
        $designm->surchargeAerop = $request->surchargeAeropm;
        $designm->remise = $request->remisem;
        $designm->fraisLivraison = $request->fraisLivraisonm;
        $designm->fraisReprise = $request->fraisReprisem;
        $designm->tva = $request->tvam;
        $designm->suppFranchise = $request->suppFranchisem;
        $designm->assurancePassager = $request->assurancePassagerm;
        $designm->timbre = $request->timbrem;

        $designm->contrat_id = $contrat->id;
        $designm->save();
    }

    public function updateDesignM(Request $request, Contrat $contrat, Designmontant $designm)
    {
        $designm->locationBase = $request->locationBasem;
        $designm->conducteur = $request->conducteurm;
        $designm->siegeBebe = $request->siegeBebem;
        $designm->chauffeur = $request->chauffeurm;
        $designm->surchargeAerop = $request->surchargeAeropm;
        $designm->remise = $request->remisem;
        $designm->fraisLivraison = $request->fraisLivraisonm;
        $designm->fraisReprise = $request->fraisReprisem;
        $designm->tva = $request->tvam;
        $designm->suppFranchise = $request->suppFranchisem;
        $designm->assurancePassager = $request->assurancePassagerm;
        $designm->timbre = $request->timbrem;

        $designm->contrat_id = $contrat->id;
        $designm->update();
    }

}
