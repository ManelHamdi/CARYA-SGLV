<?php

namespace App\Http\Controllers;

use App\Models\Conducteur;
use Illuminate\Http\Request;

class ConducteurController extends Controller
{
    public function addConducteur(Request $request)
    {
            $conducteur = new Conducteur();
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

    public function updateConducteur(Request $request, Conducteur $conducteur)
    {
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
            return $conducteur;
    }

}
