<?php

namespace App\Http\Controllers;

use App\Models\Conduire;
use Illuminate\Http\Request;

class ConduireController extends Controller
{
    public function addConducteur(Request $request)
    {
        if (empty($request->nomc)) {
            return null;
        } else {
            $conducteur = new Conduire();
            $conducteur->nom = $request->nomc;
            $conducteur->prenom = $request->prenomc;
            $conducteur->adresse = $request->adressec;
            $conducteur->ville = $request->villec;
            $conducteur->tel = $request->telc;
            $conducteur->dateNaissance = $request->dateNaissancec;
            $conducteur->lieuNaissance = $request->lieuNaissancec;
            $conducteur->cin = $request->cinc;
            $conducteur->nationalite = $request->nationalitec;
            $conducteur->dateEmit = $request->dateEmitc;
            $conducteur->permisConduire = $request->permisConduirec;
            $conducteur->dateEmitPermis = $request->dateEmitPermisc;
            $conducteur->delivrePermis = $request->delivrePermisc;
            //$conducteur->client_id = $request->client_id;
            //$conducteur->save();
            return $conducteur;
        }
    }
}
