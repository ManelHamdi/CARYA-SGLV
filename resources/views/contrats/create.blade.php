@extends('layouts.app', ['activePage' => 'Contrat', 'titlePage' => __('Contrats')])

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
            width: 60px;
            height: 60px;
            bottom: 50px;
            right: 40px;
            background-color: rgb(0, 204, 85);
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            box-shadow: 2px 2px 3px #999;
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
                            <h4 class="card-title ">Nouveau contrat</h4>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('contrats.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf



                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th> Matricule </th>
                                            <td>
                                                <select id="matricule" name="vehicule_matricule" class="form-control">
                                                    <option>--- Select Matricule ---</option>
                                                    @foreach ($vehicules as $vehicule)
                                                        <option value="{{ $vehicule->matricule }}">
                                                            {{ $vehicule->matricule }}
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
                                                        placeholder="Nom client">
                                                </td>
                                                <th>
                                                    Prenom client
                                                </th>
                                                <td>
                                                    <input type="text" name="prenom" class="form-control"
                                                        placeholder="Prenom client">
                                                </td>

                                            </tr>
                                            <tr>
                                                <th>
                                                    Telephone
                                                </th>
                                                <td>
                                                    <input type="number" name="tel" class="form-control"
                                                        placeholder="Telephone">
                                                </td>
                                                <th>
                                                    Email
                                                </th>
                                                <td>
                                                    <input type="email" name="email" class="form-control"
                                                        placeholder="Email">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Adresse du domicile
                                                </th>
                                                <td>
                                                    <input type="text" name="adresse" class="form-control"
                                                        placeholder="Adresse du domicile">
                                                </td>
                                                <th>
                                                    Adresse locale
                                                </th>
                                                <td>
                                                    <input type="text" name="ville" class="form-control"
                                                        placeholder="Adresse locale">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Date de naissance
                                                </th>
                                                <td>
                                                    <input type="date" name="dateNaissance" class="form-control"
                                                        placeholder="Date naissance">
                                                </td>
                                                <th>
                                                    Lieu de naissance
                                                </th>
                                                <td>
                                                    <input type="text" name="lieuNaissance" class="form-control"
                                                        placeholder="Lieu naissance">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Nationalite
                                                </th>
                                                <td>
                                                    <input type="text" name="nationalite" class="form-control"
                                                        placeholder="Nationalite">
                                                </td>
                                                <th>
                                                    CIN
                                                </th>
                                                <td>
                                                    <input type="number" name="cin" class="form-control"
                                                        placeholder="CIN">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Date d'émission
                                                </th>
                                                <td>
                                                    <input type="date" name="dateEmit" class="form-control"
                                                        placeholder="Date d'émission">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Permis de conduire
                                                </th>
                                                <td>
                                                    <input type="text" name="permisConduire" class="form-control"
                                                        placeholder="Permis de conduire">
                                                </td>
                                                <th>
                                                    Date d'émission (permis conduire)
                                                </th>
                                                <td>
                                                    <input type="date" name="dateEmitPermis" class="form-control"
                                                        placeholder="Date d'émission">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Délivré par
                                                </th>
                                                <td>
                                                    <input type="text" name="delivrePermid" class="form-control"
                                                        placeholder="Délivré par">
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
                                                        placeholder="Nom conducteur">
                                                </td>
                                                <th>
                                                    Prenom conducteur
                                                </th>
                                                <td>
                                                    <input type="text" name="prenomc" class="form-control"
                                                        placeholder="Prenom conducteur">
                                                </td>

                                            </tr>
                                            <tr>
                                                <th>
                                                    Telephone conducteur
                                                </th>
                                                <td>
                                                    <input type="number" name="telc" class="form-control"
                                                        placeholder="Telephone conducteur">
                                                </td>
                                                <th>
                                                    Lieu de naissance
                                                </th>
                                                <td>
                                                    <input type="text" name="lieuNaissancec" class="form-control"
                                                        placeholder="Lieu naissance">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Adresse du domicile
                                                </th>
                                                <td>
                                                    <input type="text" name="adressec" class="form-control"
                                                        placeholder="Adresse du domicile">
                                                </td>
                                                <th>
                                                    Adresse locale
                                                </th>
                                                <td>
                                                    <input type="text" name="villec" class="form-control"
                                                        placeholder="Adresse locale">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Date de naissance
                                                </th>
                                                <td>
                                                    <input type="date" name="dateNaissancec" class="form-control"
                                                        placeholder="Date naissance">
                                                </td>
                                                <th>
                                                    Nationalite
                                                </th>
                                                <td>
                                                    <input type="text" name="nationalitec" class="form-control"
                                                        placeholder="Nationalite">
                                                </td>
                                            </tr>
                                            <tr>

                                                <th>
                                                    CIN
                                                </th>
                                                <td>
                                                    <input type="number" name="cinc" class="form-control"
                                                        placeholder="CIN">
                                                </td>
                                                <th>
                                                    Date d'émission
                                                </th>
                                                <td>
                                                    <input type="date" name="dateEmitc" class="form-control"
                                                        placeholder="Date d'émission">
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>
                                                    Permis de conduire
                                                </th>
                                                <td>
                                                    <input type="text" name="permisConduirec" class="form-control"
                                                        placeholder="Permis de conduire">
                                                </td>
                                                <th>
                                                    Date d'émission (permis conduire)
                                                </th>
                                                <td>
                                                    <input type="date" name="dateEmitPermisc" class="form-control"
                                                        placeholder="Date d'émission">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Délivré par
                                                </th>
                                                <td>
                                                    <input type="text" name="delivrePermidc" class="form-control"
                                                        placeholder="Délivré par">
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
                                                        placeholder="Livraison">
                                                </td>
                                                <th>
                                                    Reprise
                                                </th>
                                                <td colspan="2">
                                                    <input type="text" name="reprise" class="form-control"
                                                        placeholder="Reprise">
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
                                                        placeholder="Date et heure">
                                                </td>
                                                <th>
                                                    KM
                                                </th>
                                                <td>
                                                    <input type="text" name="kmD" class="form-control" placeholder="KM">
                                                </td>
                                                <th>
                                                    Carburant
                                                </th>
                                                <td>
                                                    <input type="text" name="carburationD" class="form-control"
                                                        placeholder="Carburant">
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
                                                        placeholder="Date et heure">
                                                </td>
                                                <th>
                                                    KM
                                                </th>
                                                <td>
                                                    <input type="text" name="kmR" class="form-control" placeholder="KM">
                                                </td>
                                                <th>
                                                    Carburant
                                                </th>
                                                <td>
                                                    <input type="text" name="carburationR" class="form-control"
                                                        placeholder="Carburant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Prolongation autorisé
                                                </th>
                                                <td>
                                                    <input type="text" name="prolongation" class="form-control"
                                                        placeholder="Prolongation autorisé">
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
                                                        step="any" placeholder="Prix Unitaire">
                                                </td>
                                                <td>
                                                    <input type="number" name="locationBasem" class="form-control"
                                                        step="any" placeholder="Montant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    2éme Conducteur
                                                </th>
                                                <td>
                                                    <input type="number" name="conducteuru" class="form-control"
                                                        step="any" placeholder="Prix Unitaire">
                                                </td>
                                                <td>
                                                    <input type="number" name="conducteurm" class="form-control"
                                                        step="any" placeholder="Montant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Siege bébé
                                                </th>
                                                <td>
                                                    <input type="number" name="siegeBebeu" class="form-control" step="any"
                                                        placeholder="Prix Unitaire">
                                                </td>
                                                <td>
                                                    <input type="number" name="siegeBebem" class="form-control" step="any"
                                                        placeholder="Montant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Chauffeur
                                                </th>
                                                <td>
                                                    <input type="number" name="chauffeuru" class="form-control" step="any"
                                                        placeholder="Prix Unitaire">
                                                </td>
                                                <td>
                                                    <input type="number" name="chauffeurm" class="form-control" step="any"
                                                        placeholder="Montant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Surcharge Aéroport
                                                </th>
                                                <td>
                                                    <input type="number" name="surchargeAeropu" class="form-control"
                                                        step="any" placeholder="Prix Unitaire">
                                                </td>
                                                <td>
                                                    <input type="number" name="surchargeAeropm" class="form-control"
                                                        step="any" placeholder="Montant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-primary" style="font-size: 18px">
                                                    Sous Total HT
                                                </th>
                                                <td colspan="2">
                                                    <input type="number" name="sousTotal" class="form-control" step="any"
                                                        placeholder="Montant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Remise
                                                </th>
                                                <td>
                                                    <input type="number" name="remiseu" class="form-control" step="any"
                                                        placeholder="Prix Unitaire">
                                                </td>
                                                <td>
                                                    <input type="number" name="remisem" class="form-control" step="any"
                                                        placeholder="Montant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Frais de livraison
                                                </th>
                                                <td>
                                                    <input type="number" name="fraisLivraisonu" class="form-control"
                                                        step="any" placeholder="Prix Unitaire">
                                                </td>
                                                <td>
                                                    <input type="number" name="fraisLivraisonm" class="form-control"
                                                        step="any" placeholder="Montant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Frais de reprise
                                                </th>
                                                <td>
                                                    <input type="number" name="fraisRepriseu" class="form-control"
                                                        step="any" placeholder="Prix Unitaire">
                                                </td>
                                                <td>
                                                    <input type="number" name="fraisReprisem" class="form-control"
                                                        step="any" placeholder="Montant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-primary" style="font-size: 18px">
                                                    Montant Net HT
                                                </th>
                                                <td colspan="2">
                                                    <input type="number" name="montantNet" class="form-control" step="any"
                                                        placeholder="Prix Unitaire">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    TVA
                                                </th>
                                                <td>
                                                    <input type="number" name="tvau" class="form-control" step="any"
                                                        placeholder="Prix Unitaire">
                                                </td>
                                                <td>
                                                    <input type="number" name="tvam" class="form-control" step="any"
                                                        placeholder="Montant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Suppression Franchise
                                                </th>
                                                <td>
                                                    <input type="number" name="suppFranchiseu" class="form-control"
                                                        step="any" placeholder="Prix Unitaire">
                                                </td>
                                                <td>
                                                    <input type="number" name="suppFranchisem" class="form-control"
                                                        step="any" placeholder="Montant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Assurance Passage
                                                </th>
                                                <td>
                                                    <input type="number" name="assurancePassageru" class="form-control"
                                                        step="any" placeholder="Prix Unitaire">
                                                </td>
                                                <td>
                                                    <input type="number" name="assurancePassagerm" class="form-control"
                                                        step="any" placeholder="Montant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Timbre
                                                </th>
                                                <td>
                                                    <input type="number" name="timbreu" class="form-control" step="any"
                                                        placeholder="Prix Unitaire">
                                                </td>
                                                <td>
                                                    <input type="number" name="timbrem" class="form-control" step="any"
                                                        placeholder="Montant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-primary" style="font-size: 18px">
                                                    Montant du
                                                </th>
                                                <td colspan="2">
                                                    <input type="number" name="montantDuD" class="form-control" step="any"
                                                        placeholder="Montant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-primary" style="font-size: 18px">
                                                    Montant recu avec remerciments
                                                </th>
                                                <td>
                                                    <input type="number" name="montantRecu" class="form-control" step="any"
                                                        placeholder="Montant">
                                                </td>
                                                <th class="text-primary" style="font-size: 18px">
                                                    Montant du
                                                </th>
                                                <td>
                                                    <input type="number" name="montantDu" class="form-control" step="any"
                                                        placeholder="Montant">
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
                                                    <input type="checkbox" id="cartGrise" name="cartGrise" value="1">
                                                    <strong for="cartGrise"> Carte grise </strong>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="attestAssurance" name="attestAssurance" value="1">
                                                    <strong for="attestAssurance"> Attestation d'assurance </strong>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="carteExploitation" name="carteExploitation" value="1">
                                                    <strong for="carteExploitation"> Carte d'exploitation </strong>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="vignatte" name="vignatte" value="1">
                                                    <strong for="vignatte"> Vignette </strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" id="visiteTechnique" name="visiteTechnique" value="1">
                                                    <strong for="visiteTechnique"> Visite technique </strong>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="roueSecours" name="roueSecours" value="1">
                                                    <strong for="roueSecours"> Roue de secours </strong>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="lecteurCd" name="lecteurCd" value="1">
                                                    <strong for="lecteurCd"> Lecteur CD - Radio </strong>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="tapis" name="tapis" value="1">
                                                    <strong for="tapis"> Tapis </strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" id="cric" name="cric" value="1">
                                                    <strong for="cric"> Cric </strong>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="enjoliveur" name="enjoliveur" value="1">
                                                    <strong for="enjoliveur"> Enjoliveur </strong>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="antenne" name="antenne" value="1">
                                                    <strong for="antenne"> Antenne </strong>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="allumeCigar" name="allumeCigar" value="1">
                                                    <strong for="allumeCigar"> Allume cigare </strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" id="trianglePanne" name="trianglePanne" value="1">
                                                    <strong for="trianglePanne"> Triangle de panne </strong>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="autre" name="autre" value="1">
                                                    <strong for="autre"> Autre </strong>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>






                                </div>
                                <button type="submit" class="float">Submit</button>
                            </form>
                        </div><!-- nnnnn -->
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
