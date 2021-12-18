@extends('layouts.app', ['activePage' => 'Contrats', 'titlePage' => __('Contrats')])

@section('content')
<style>
    .accordion {
        background-color: #eee;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
    }

    .accordion:after {
        content: '\002B';
        color: #777;
        font-weight: bold;
        float: right;
        margin-left: 5px;
    }

    .active:after {
        content: "\2212";
    }

    .panel {
        padding: 0 18px;
        background-color: white;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
    }

    .minput {
        display: inline-block;
        width: 45%;
        padding-right: 3em;
    }

    .float {
        position: fixed;
        width: 70px;
        height: 70px;
        bottom: 50px;
        right: 40px;
        background-color: rgb(8, 151, 67);
        color: #FFF;
        border-radius: 50px;
        text-align: center;
        box-shadow: 2px 2px 3px #999;
    }
    .float:hover {
        transform: scale(0.98);
        /* Scaling button to 0.98 to its original size */
        box-shadow: 3px 2px 22px 1px rgba(0, 0, 0, 0.24);
        /* Lowering the shadow */
    }
    .my-float {
        margin-top: 22px;
    }

</style>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Modifier contrat de client {{ $client->nom }} {{ $client->prenom }}
                                et vehicule : {{ $vehicule }}</h4>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('contrats.update', $contrat) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            @method('PUT')

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th width="25%"> Matricule </th>
                                            <td>
                                                <select id="matricule" name="vehicule_matricule" class="form-control">
                                                    <option> {{ $vehicule }} </option>
                                                    @foreach ($vehicules as $mvehicule)
                                                        <option value="{{ $mvehicule->matricule }}">
                                                            {{ $mvehicule->matricule }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                    </table>


                                    <!-- TODO Client -->
                                    <p class="accordion"> Client </p>
                                    <div class="panel">
                                        <table class="table">
                                            <tr>
                                                <th>
                                                    Nom client
                                                </th>
                                                <td>
                                                    <input type="text" name="nom" class="form-control"
                                                        value="{{ $client->nom }}" placeholder="Nom client *">
                                                </td>
                                                <th>
                                                    Prenom client
                                                </th>
                                                <td>
                                                    <input type="text" name="prenom" class="form-control"
                                                        value="{{ $client->prenom }}" placeholder="Prenom client *">
                                                </td>

                                            </tr>
                                            <tr>
                                                <th>
                                                    Telephone
                                                </th>
                                                <td>
                                                    <input type="number" name="tel" class="form-control"
                                                    value="{{ $client->tel }}" placeholder="Telephone">
                                                </td>
                                                <th>
                                                    Email
                                                </th>
                                                <td>
                                                    <input type="email" name="email" class="form-control"
                                                    value="{{ $client->email }}" placeholder="Email">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Adresse du domicile
                                                </th>
                                                <td>
                                                    <input type="text" name="adresse" class="form-control"
                                                    value="{{ $client->adresse }}" placeholder="Adresse du domicile *">
                                                </td>
                                                <th>
                                                    Adresse locale
                                                </th>
                                                <td>
                                                    <input type="text" name="ville" class="form-control"
                                                    value="{{ $client->ville }}" placeholder="Adresse locale *">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Date de naissance
                                                </th>
                                                <td>
                                                    <input type="date" name="dateNaissance" class="form-control"
                                                    value="{{ $client->dateNaissance }}" placeholder="Date naissance">
                                                </td>
                                                <th>
                                                    Lieu de naissance
                                                </th>
                                                <td>
                                                    <input type="text" name="lieuNaissance" class="form-control"
                                                    value="{{ $client->lieuNaissance }}" placeholder="Lieu naissance">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Nationalite
                                                </th>
                                                <td>
                                                    <input type="text" name="nationalite" class="form-control"
                                                    value="{{ $client->nationalite }}" placeholder="Nationalite">
                                                </td>
                                                <th>
                                                    CIN
                                                </th>
                                                <td>
                                                    <input type="number" name="cin" class="form-control"
                                                    value="{{ $client->cin }}" placeholder="CIN *">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Date d'émission
                                                </th>
                                                <td>
                                                    <input type="date" name="dateEmit" class="form-control"
                                                    value="{{ $client->dateEmit }}" placeholder="Date d'émission">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Permis de conduire
                                                </th>
                                                <td>
                                                    <input type="text" name="permisConduire" class="form-control"
                                                    value="{{ $client->permisConduire }}" placeholder="Permis de conduire *">
                                                </td>
                                                <th>
                                                    Date d'émission (permis conduire)
                                                </th>
                                                <td>
                                                    <input type="date" name="dateEmitPermis" class="form-control"
                                                    value="{{ $client->dateEmitPermis }}" placeholder="Date d'émission">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Délivré par
                                                </th>
                                                <td>
                                                    <input type="text" name="delivrePermis" class="form-control"
                                                    value="{{ $client->delivrePermis }}" placeholder="Délivré par">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>



                                    <!-- TODO Conducteur -->
                                    <p class="accordion"> 2éme Conducteur </p>
                                    <div class="panel">
                                        <table class="table">
                                            <tr>
                                                <th>
                                                    Nom conducteur
                                                </th>
                                                <td>
                                                    <input type="text" name="nomc" class="form-control"
                                                    value="{{ $conducteur->nom }}" placeholder="Nom conducteur">
                                                </td>
                                                <th>
                                                    Prenom conducteur
                                                </th>
                                                <td>
                                                    <input type="text" name="prenomc" class="form-control"
                                                    value="{{ $conducteur->prenom }}" placeholder="Prenom conducteur">
                                                </td>

                                            </tr>
                                            <tr>
                                                <th>
                                                    Telephone conducteur
                                                </th>
                                                <td>
                                                    <input type="number" name="telc" class="form-control"
                                                    value="{{ $conducteur->tel }}" placeholder="Telephone conducteur">
                                                </td>
                                                <th>
                                                    Lieu de naissance
                                                </th>
                                                <td>
                                                    <input type="text" name="lieuNaissancec" class="form-control"
                                                    value="{{ $conducteur->lieuNaissance }}" placeholder="Lieu naissance">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Adresse du domicile
                                                </th>
                                                <td>
                                                    <input type="text" name="adressec" class="form-control"
                                                    value="{{ $conducteur->adresse }}" placeholder="Adresse du domicile">
                                                </td>
                                                <th>
                                                    Adresse locale
                                                </th>
                                                <td>
                                                    <input type="text" name="villec" class="form-control"
                                                    value="{{ $conducteur->ville }}" placeholder="Adresse locale">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Date de naissance
                                                </th>
                                                <td>
                                                    <input type="date" name="dateNaissancec" class="form-control"
                                                    value="{{ $conducteur->dateNaissance }}" placeholder="Date naissance">
                                                </td>
                                                <th>
                                                    Nationalite
                                                </th>
                                                <td>
                                                    <input type="text" name="nationalitec" class="form-control"
                                                    value="{{ $conducteur->nationalite }}" placeholder="Nationalite">
                                                </td>
                                            </tr>
                                            <tr>

                                                <th>
                                                    CIN
                                                </th>
                                                <td>
                                                    <input type="number" name="cinc" class="form-control"
                                                    value="{{ $conducteur->cin }}" placeholder="CIN">
                                                </td>
                                                <th>
                                                    Date d'émission
                                                </th>
                                                <td>
                                                    <input type="date" name="dateEmitc" class="form-control"
                                                    value="{{ $conducteur->dateEmit }}" placeholder="Date d'émission">
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>
                                                    Permis de conduire
                                                </th>
                                                <td>
                                                    <input type="text" name="permisConduirec" class="form-control"
                                                    value="{{ $conducteur->permisConduire }}" placeholder="Permis de conduire">
                                                </td>
                                                <th>
                                                    Date d'émission (permis conduire)
                                                </th>
                                                <td>
                                                    <input type="date" name="dateEmitPermisc" class="form-control"
                                                    value="{{ $conducteur->dateEmitPermis }}" placeholder="Date d'émission">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Délivré par
                                                </th>
                                                <td>
                                                    <input type="text" name="delivrePermisc" class="form-control"
                                                    value="{{ $conducteur->delivrePermis }}" placeholder="Délivré par">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>



                                    <!-- TODO Contrat -->
                                    <!-- TODO Depart & Retour -->
                                    <p class="accordion"> Detail Depart & Retour </p>
                                    <div class="panel">
                                        <table class="table">
                                            <tr>
                                                <th>
                                                    Livraison
                                                </th>
                                                <td colspan="2">
                                                    <input type="text" name="livraison" class="form-control"
                                                    value="{{ $contrat->livraison }}" placeholder="Livraison *">
                                                </td>
                                                <th>
                                                    Reprise
                                                </th>
                                                <td colspan="2">
                                                    <input type="text" name="reprise" class="form-control"
                                                    value="{{ $contrat->reprise }}" placeholder="Reprise *">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-primary" colspan="6"
                                                    style="text-align: center; font-size: 20px">
                                                    Départ
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Date et heure
                                                </th>
                                                <td>
                                                    <input type="datetime-local" name="dateDebut" class="form-control"
                                                    value="{{date("Y-m-d\TH:i:s", strtotime($contrat->dateDebut))}}" placeholder="Date et heure *">
                                                </td>
                                                <th>
                                                    KM
                                                </th>
                                                <td>
                                                    <input type="number" name="kmD" class="form-control"
                                                    value="{{ $contrat->kmD }}" placeholder="KM">
                                                </td>
                                                <th>
                                                    Carburant
                                                </th>
                                                <td>
                                                    <input type="text" name="carburationD" class="form-control"
                                                    value="{{ $contrat->carburationD }}" placeholder="Carburant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-primary" colspan="6"
                                                    style="text-align: center; font-size: 20px">
                                                    Retour
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Date et heure
                                                </th>
                                                <td>
                                                    <input type="datetime-local" name="dateFin" class="form-control"

                                                    value="{{date("Y-m-d\TH:i:s", strtotime($contrat->dateFin))}}" placeholder="Date et heure *">
                                                </td>
                                                <th>
                                                    KM
                                                </th>
                                                <td>
                                                    <input type="number" name="kmR" class="form-control"
                                                    value="{{ $contrat->kmR }}" placeholder="KM">
                                                </td>
                                                <th>
                                                    Carburant
                                                </th>
                                                <td>
                                                    <input type="text" name="carburationR" class="form-control"
                                                    value="{{ $contrat->carburationR }}" placeholder="Carburant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Prolongation autorisé
                                                </th>
                                                <td>
                                                    <input type="text" name="prolongation" class="form-control"
                                                    value="{{ $contrat->prolongation }}" placeholder="Prolongation autorisé">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>



                                    <!-- TODO Designation -->
                                    <p class="accordion"> Désignation </p>
                                    <div class="panel">
                                        <table class="table">
                                            <tr>
                                                <th>
                                                    Location de base
                                                </th>
                                                <td>
                                                    <input type="number" name="locationBaseu" class="form-control"
                                                    value="{{ $designUnit->locationBase }}" step="any" placeholder="Prix Unitaire">
                                                </td>
                                                <td>
                                                    <input type="number" name="locationBasem" class="form-control"
                                                    value="{{ $designMontant->locationBase }}" step="any" placeholder="Montant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    2éme Conducteur
                                                </th>
                                                <td>
                                                    <input type="number" name="conducteuru" class="form-control"
                                                    value="{{ $designUnit->conducteur }}" step="any" placeholder="Prix Unitaire">
                                                </td>
                                                <td>
                                                    <input type="number" name="conducteurm" class="form-control"
                                                    value="{{ $designMontant->conducteur }}" step="any" placeholder="Montant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Siege bébé
                                                </th>
                                                <td>
                                                    <input type="number" name="siegeBebeu" class="form-control" step="any"
                                                    value="{{ $designUnit->siegeBebe }}" placeholder="Prix Unitaire">
                                                </td>
                                                <td>
                                                    <input type="number" name="siegeBebem" class="form-control" step="any"
                                                    value="{{ $designMontant->siegeBebe }}" placeholder="Montant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Chauffeur
                                                </th>
                                                <td>
                                                    <input type="number" name="chauffeuru" class="form-control" step="any"
                                                    value="{{ $designUnit->chauffeur }}" placeholder="Prix Unitaire">
                                                </td>
                                                <td>
                                                    <input type="number" name="chauffeurm" class="form-control" step="any"
                                                    value="{{ $designMontant->chauffeur }}" placeholder="Montant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Surcharge Aéroport
                                                </th>
                                                <td>
                                                    <input type="number" name="surchargeAeropu" class="form-control"
                                                    value="{{ $designUnit->surchargeAerop }}" step="any" placeholder="Prix Unitaire">
                                                </td>
                                                <td>
                                                    <input type="number" name="surchargeAeropm" class="form-control"
                                                    value="{{ $designMontant->surchargeAerop }}" step="any" placeholder="Montant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-primary" style="font-size: 18px">
                                                    Sous Total HT
                                                </th>
                                                <td colspan="2">
                                                    <input type="number" name="sousTotal" class="form-control" step="any"
                                                    value="{{ $montant->sousTotal }}" placeholder="Montant *">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Remise
                                                </th>
                                                <td>
                                                    <input type="number" name="remiseu" class="form-control" step="any"
                                                    value="{{ $designUnit->remise }}" placeholder="Prix Unitaire">
                                                </td>
                                                <td>
                                                    <input type="number" name="remisem" class="form-control" step="any"
                                                    value="{{ $designMontant->remise }}" placeholder="Montant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Frais de livraison
                                                </th>
                                                <td>
                                                    <input type="number" name="fraisLivraisonu" class="form-control"
                                                    value="{{ $designUnit->fraisLivraison }}" step="any" placeholder="Prix Unitaire">
                                                </td>
                                                <td>
                                                    <input type="number" name="fraisLivraisonm" class="form-control"
                                                    value="{{ $designMontant->fraisLivraison }}" step="any" placeholder="Montant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Frais de reprise
                                                </th>
                                                <td>
                                                    <input type="number" name="fraisRepriseu" class="form-control"
                                                    value="{{ $designUnit->fraisReprise }}" step="any" placeholder="Prix Unitaire">
                                                </td>
                                                <td>
                                                    <input type="number" name="fraisReprisem" class="form-control"
                                                    value="{{ $designMontant->fraisReprise }}" step="any" placeholder="Montant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-primary" style="font-size: 18px">
                                                    Montant Net HT
                                                </th>
                                                <td colspan="2">
                                                    <input type="number" name="montantNet" class="form-control" step="any"
                                                    value="{{ $montant->montantNet }}" placeholder="Montant *">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    TVA
                                                </th>
                                                <td>
                                                    <input type="number" name="tvau" class="form-control" step="any"
                                                    value="{{ $designUnit->tva }}" placeholder="Prix Unitaire">
                                                </td>
                                                <td>
                                                    <input type="number" name="tvam" class="form-control" step="any"
                                                    value="{{ $designMontant->tva }}" placeholder="Montant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Suppression Franchise
                                                </th>
                                                <td>
                                                    <input type="number" name="suppFranchiseu" class="form-control"
                                                    value="{{ $designUnit->suppFranchise }}" step="any" placeholder="Prix Unitaire">
                                                </td>
                                                <td>
                                                    <input type="number" name="suppFranchisem" class="form-control"
                                                    value="{{ $designMontant->suppFranchise }}" step="any" placeholder="Montant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Assurance Passage
                                                </th>
                                                <td>
                                                    <input type="number" name="assurancePassageru" class="form-control"
                                                    value="{{ $designUnit->assurancePassager }}" step="any" placeholder="Prix Unitaire">
                                                </td>
                                                <td>
                                                    <input type="number" name="assurancePassagerm" class="form-control"
                                                    value="{{ $designMontant->assurancePassager }}" step="any" placeholder="Montant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Timbre
                                                </th>
                                                <td>
                                                    <input type="number" name="timbreu" class="form-control" step="any"
                                                    value="{{ $designUnit->timbre }}" placeholder="Prix Unitaire">
                                                </td>
                                                <td>
                                                    <input type="number" name="timbrem" class="form-control" step="any"
                                                    value="{{ $designMontant->timbre }}" placeholder="Montant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-primary" style="font-size: 18px">
                                                    Montant du
                                                </th>
                                                <td colspan="2">
                                                    <input type="number" name="montantDuD" class="form-control" step="any"
                                                    value="{{ $montant->montantDuD }}" placeholder="Montant *">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-primary" style="font-size: 18px">
                                                    Montant recu avec remerciments
                                                </th>
                                                <td>
                                                    <input type="number" name="montantRecu" class="form-control" step="any"
                                                    value="{{ $montant->montantRecu }}" placeholder="Montant *">
                                                </td>
                                                <th class="text-primary" style="font-size: 18px">
                                                    Montant du
                                                </th>
                                                <td>
                                                    <input type="number" name="montantDu" class="form-control" step="any"
                                                    value="{{ $montant->montantDu }}" placeholder="Montant *">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>



                                    <!-- TODO CheckOut -->
                                    <p class="accordion"> Check Out </p>
                                    <div class="panel">
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <input type="checkbox" id="cartGrise" name="cartGrise"
                                                    value="1" {{ $checkOut->cartGrise == 1 ? 'checked' : '' }}>
                                                    <strong for="cartGrise"> Carte grise </strong>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="attestAssurance" name="attestAssurance"
                                                    value="1" {{ $checkOut->attestAssurance == 1 ? 'checked' : '' }}>
                                                    <strong for="attestAssurance"> Attestation d'assurance </strong>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="carteExploitation" name="carteExploitation"
                                                    value="1" {{ $checkOut->carteExploitation == 1 ? 'checked' : '' }}>
                                                    <strong for="carteExploitation"> Carte d'exploitation </strong>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="vignatte" name="vignatte"
                                                    value="1" {{ $checkOut->vignatte == 1 ? 'checked' : '' }}>
                                                    <strong for="vignatte"> Vignette </strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" id="visiteTechnique" name="visiteTechnique"
                                                    value="1" {{ $checkOut->visiteTechnique == 1 ? 'checked' : '' }}>
                                                    <strong for="visiteTechnique"> Visite technique </strong>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="roueSecours" name="roueSecours"
                                                    value="1" {{ $checkOut->roueSecours == 1 ? 'checked' : '' }}>
                                                    <strong for="roueSecours"> Roue de secours </strong>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="lecteurCd" name="lecteurCd"
                                                    value="1" {{ $checkOut->lecteurCd == 1 ? 'checked' : '' }}>
                                                    <strong for="lecteurCd"> Lecteur CD - Radio </strong>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="tapis" name="tapis"
                                                    value="1" {{ $checkOut->tapis == 1 ? 'checked' : '' }}>
                                                    <strong for="tapis"> Tapis </strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" id="cric" name="cric"
                                                    value="1" {{ $checkOut->cric == 1 ? 'checked' : '' }}>
                                                    <strong for="cric"> Cric </strong>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="enjoliveur" name="enjoliveur"
                                                    value="1" {{ $checkOut->enjoliveur == 1 ? 'checked' : '' }}>
                                                    <strong for="enjoliveur"> Enjoliveur </strong>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="antenne" name="antenne"
                                                    value="1" {{ $checkOut->antenne == 1 ? 'checked' : '' }}>
                                                    <strong for="antenne"> Antenne </strong>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="allumeCigar" name="allumeCigar"
                                                    value="1" {{ $checkOut->allumeCigar == 1 ? 'checked' : '' }}>
                                                    <strong for="allumeCigar"> Allume cigare </strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" id="trianglePanne" name="trianglePanne"
                                                    value="1" {{ $checkOut->trianglePanne == 1 ? 'checked' : '' }}>
                                                    <strong for="trianglePanne"> Triangle de panne </strong>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="autre" name="autre"
                                                    value="1" {{ $checkOut->autre == 1 ? 'checked' : '' }}>
                                                    <strong for="autre"> Autre </strong>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>




                                </div>
                                <button type="submit" class="float"> Modifier </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        }
    </script>


@endsection
