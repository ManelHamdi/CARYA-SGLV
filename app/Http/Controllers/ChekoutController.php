<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Contrat;
use Illuminate\Http\Request;

class ChekoutController extends Controller
{
    public function addCheckout(Request $request, Contrat $contrat)
    {
        /*if (empty($request->cartGrise)) {

        }*/
        $checkOut = new Checkout();
        if (is_null($request->cartGrise)) {
            $checkOut->cartGrise = 0;
        } else {
            $checkOut->cartGrise = 1;
        }
        if (is_null($request->attestAssurance)) {
            $checkOut->attestAssurance = 0;
        } else {
            $checkOut->attestAssurance = 1;
        }
        if (is_null($request->carteExploitation)) {
            $checkOut->carteExploitation = 0;
        } else {
            $checkOut->carteExploitation = 1;
        }
        if (is_null($request->vignatte)) {
            $checkOut->vignatte = 0;
        } else {
            $checkOut->vignatte = 1;
        }
        if (is_null($request->visiteTechnique)) {
            $checkOut->visiteTechnique = 0;
        } else {
            $checkOut->visiteTechnique = 1;
        }
        if (is_null($request->roueSecours)) {
            $checkOut->roueSecours = 0;
        } else {
            $checkOut->roueSecours = 1;
        }
        if (is_null($request->lecteurCd)) {
            $checkOut->lecteurCd = 0;
        } else {
            $checkOut->lecteurCd = 1;
        }
        if (is_null($request->tapis)) {
            $checkOut->tapis = 0;
        } else {
            $checkOut->tapis = 1;
        }
        if (is_null($request->cric)) {
            $checkOut->cric = 0;
        } else {
            $checkOut->cric = 1;
        }
        if (is_null($request->enjoliveur)) {
            $checkOut->enjoliveur = 0;
        } else {
            $checkOut->enjoliveur = 1;
        }
        if (is_null($request->antenne)) {
            $checkOut->antenne = 0;
        } else {
            $checkOut->antenne = 1;
        }
        if (is_null($request->allumeCigar)) {
            $checkOut->allumeCigar = 0;
        } else {
            $checkOut->allumeCigar = 1;
        }
        if (is_null($request->trianglePanne)) {
            $checkOut->trianglePanne = 0;
        } else {
            $checkOut->trianglePanne = 1;
        }
        if (is_null($request->autre)) {
            $checkOut->autre = 0;
        } else {
            $checkOut->autre = 1;
        }
        
        // TODO 
        $checkOut->contrat_id = $contrat->id;
        $checkOut->save();
    }
}
