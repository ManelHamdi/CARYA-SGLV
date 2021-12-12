<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use App\Models\Montant;
use Illuminate\Http\Request;

class MontantController extends Controller
{
    public function addMontant(Request $request, Contrat $contrat)
    {
        $montant = new Montant();
        $montant->sousTotal = $request->sousTotal;
        $montant->montantNet = $request->montantNet;
        $montant->montantDuD = $request->montantDuD;
        $montant->montantRecu = $request->montantRecu;
        $montant->montantDu = $request->montantDu;

        $montant->contrat_id = $contrat->id;
        $montant->save();
    }

    public function updateMontant(Request $request, Contrat $contrat, Montant $montant)
    {
        $montant->sousTotal = $request->sousTotal;
        $montant->montantNet = $request->montantNet;
        $montant->montantDuD = $request->montantDuD;
        $montant->montantRecu = $request->montantRecu;
        $montant->montantDu = $request->montantDu;

        $montant->contrat_id = $contrat->id;
        $montant->update();
    }

}
