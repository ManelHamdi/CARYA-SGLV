<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Conducteur;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function addClient(Request $request){
        $condController = new ConducteurController();
        $conducteur = $condController->addConducteur($request);
        $client = new Client();
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->adresse = $request->adresse;
        $client->ville = $request->ville;
        $client->tel = $request->tel;
        $client->email = $request->email;
        $client->dateNaissance = $request->dateNaissance;
        $client->lieuNaissance = $request->lieuNaissance;
        $client->cin = $request->cin;
        $client->nationalite = $request->nationalite;
        $client->dateEmit = $request->dateEmit;
        $client->permisConduire = $request->permisConduire;
        $client->dateEmitPermis = $request->dateEmitPermis;
        $client->delivrePermis = $request->delivrePermis;
        $client->save();
        $client->conducteur()->save($conducteur);
        return $client;
    }

    public function updateClient(Request $request, Client $client, Conducteur $conducteur){
        $condController = new ConducteurController();
        $conducteur = $condController->updateConducteur($request, $conducteur);
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->adresse = $request->adresse;
        $client->ville = $request->ville;
        $client->tel = $request->tel;
        $client->email = $request->email;
        $client->dateNaissance = $request->dateNaissance;
        $client->lieuNaissance = $request->lieuNaissance;
        $client->cin = $request->cin;
        $client->nationalite = $request->nationalite;
        $client->dateEmit = $request->dateEmit;
        $client->permisConduire = $request->permisConduire;
        $client->dateEmitPermis = $request->dateEmitPermis;
        $client->delivrePermis = $request->delivrePermis;
        $client->update();
        $client->conducteur()->update($conducteur);
        return $client;
    }

}
