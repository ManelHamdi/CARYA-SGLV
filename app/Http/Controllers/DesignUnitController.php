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
        $designunit->locationBase = $request->locationBaseu;
        $designunit->conducteur = $request->conducteuru;
        $designunit->siegeBebe = $request->siegeBebeu;
        $designunit->chauffeur = $request->chauffeuru;
        $designunit->surchargeAerop = $request->surchargeAeropu;
        $designunit->remise = $request->remiseu;
        $designunit->fraisLivraison = $request->fraisLivraisonu;
        $designunit->fraisReprise = $request->fraisRepriseu;
        $designunit->tva = $request->tvau;
        $designunit->suppFranchise = $request->suppFranchiseu;
        $designunit->assurancePassager = $request->assurancePassageru;
        $designunit->timbre = $request->timbreu;

        $designunit->contrat_id = $contrat->id;
        $designunit->save();
    }

    public function updateDesignU(Request $request, Contrat $contrat, Designunit $designunit)
    {
        $designunit->locationBase = $request->locationBaseu;
        $designunit->conducteur = $request->conducteuru;
        $designunit->siegeBebe = $request->siegeBebeu;
        $designunit->chauffeur = $request->chauffeuru;
        $designunit->surchargeAerop = $request->surchargeAeropu;
        $designunit->remise = $request->remiseu;
        $designunit->fraisLivraison = $request->fraisLivraisonu;
        $designunit->fraisReprise = $request->fraisRepriseu;
        $designunit->tva = $request->tvau;
        $designunit->suppFranchise = $request->suppFranchiseu;
        $designunit->assurancePassager = $request->assurancePassageru;
        $designunit->timbre = $request->timbreu;

        $designunit->contrat_id = $contrat->id;
        $designunit->update();
    }

}
