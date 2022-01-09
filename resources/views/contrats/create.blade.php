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
            width: 60px;
            height: 60px;
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
                            <h4 class="card-title ">Nouveau contrat</h4>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <!-- <strong>Oups!</strong> Il y a eu des problèmes avec votre entrée.<br><br>-->
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
                                                <select id="matricule" name="vehicule_matricule" onchange="update()"
                                                    class="form-control">
                                                    <option>--- Sélectionnez Matricule *---</option>
                                                    @foreach ($vehicules as $vehicule)
                                                        <option value="{{ $vehicule->matricule }}">
                                                            {{ $vehicule->matricule }}
                                                        </option>
                                                        <option hidden value="{{ $vehicule->carburation }}">
                                                            {{ $vehicule->carburation }}
                                                        </option>
                                                        <option hidden value="{{ $vehicule->kilometrage }}">
                                                            {{ $vehicule->kilometrage }}
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
                                                    Nom complet
                                                </th>
                                                <td>
                                                    <input type="text" name="nom" class="form-control"
                                                        value="{{ old('nom') }}" placeholder="Nom client *">
                                                </td>
                                                <td>
                                                    <input type="text" name="prenom" class="form-control"
                                                        value="{{ old('prenom') }}" placeholder=" الاسم الكامل *">
                                                </td>
                                                <th>
                                                    الاسم الكامل
                                                </th>


                                            </tr>
                                            <tr>
                                                <th>
                                                    Telephone
                                                </th>
                                                <td>
                                                    <input type="number" name="tel" class="form-control"
                                                        value="{{ old('tel') }}" placeholder="Telephone">
                                                </td>
                                                <th>
                                                    Email
                                                </th>
                                                <td>
                                                    <input type="email" name="email" class="form-control"
                                                        value="{{ old('email') }}" placeholder="Email">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Adresse du domicile
                                                </th>
                                                <td>
                                                    <input type="text" name="adresse" class="form-control"
                                                        value="{{ old('adresse') }}" placeholder="Adresse du domicile *">
                                                </td>
                                                <th>
                                                    Adresse locale
                                                </th>
                                                <td>
                                                    <input type="text" name="ville" class="form-control"
                                                        value="{{ old('ville') }}" placeholder="Adresse locale *">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Date de naissance
                                                </th>
                                                <td>
                                                    <input type="date" name="dateNaissance" class="form-control"
                                                        value="{{ old('dateNaissance') }}" placeholder="Date naissance">
                                                </td>
                                                <th>
                                                    Lieu de naissance
                                                </th>
                                                <td>
                                                    <input type="text" name="lieuNaissance" class="form-control"
                                                        value="{{ old('lieuNaissance') }}" placeholder="Lieu naissance">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Nationalite
                                                </th>
                                                <td>
                                                    <input type="text" name="nationalite" class="form-control"
                                                        value="{{ old('nationalite') }}" placeholder="Nationalite">
                                                </td>
                                                <th>
                                                    CIN
                                                </th>
                                                <td>
                                                    <input type="number" name="cin" class="form-control"
                                                        value="{{ old('cin') }}" placeholder="CIN *">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Date d'émission
                                                </th>
                                                <td>
                                                    <input type="date" name="dateEmit" class="form-control"
                                                        value="{{ old('dateEmit') }}" placeholder="Date d'émission">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Permis de conduire
                                                </th>
                                                <td>
                                                    <input type="text" name="permisConduire" class="form-control"
                                                        value="{{ old('permisConduire') }}"
                                                        placeholder="Permis de conduire *">
                                                </td>
                                                <th>
                                                    Date d'émission (permis conduire)
                                                </th>
                                                <td>
                                                    <input type="date" name="dateEmitPermis" class="form-control"
                                                        value="{{ old('dateEmitPermis') }}"
                                                        placeholder="Date d'émission">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Délivré par
                                                </th>
                                                <td>
                                                    <input type="text" name="delivrePermis" class="form-control"
                                                        value="{{ old('delivrePermis') }}" placeholder="Délivré par">
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
                                                        value="{{ old('nomc') }}" placeholder="Nom conducteur">
                                                </td>
                                                <th>
                                                    Prenom conducteur
                                                </th>
                                                <td>
                                                    <input type="text" name="prenomc" class="form-control"
                                                        value="{{ old('prenomc') }}" placeholder="Prenom conducteur">
                                                </td>

                                            </tr>
                                            <tr>
                                                <th>
                                                    Telephone conducteur
                                                </th>
                                                <td>
                                                    <input type="number" name="telc" class="form-control"
                                                        value="{{ old('telc') }}" placeholder="Telephone conducteur">
                                                </td>
                                                <th>
                                                    Lieu de naissance
                                                </th>
                                                <td>
                                                    <input type="text" name="lieuNaissancec" class="form-control"
                                                        value="{{ old('lieuNaissancec') }}" placeholder="Lieu naissance">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Adresse du domicile
                                                </th>
                                                <td>
                                                    <input type="text" name="adressec" class="form-control"
                                                        value="{{ old('adressec') }}" placeholder="Adresse du domicile">
                                                </td>
                                                <th>
                                                    Adresse locale
                                                </th>
                                                <td>
                                                    <input type="text" name="villec" class="form-control"
                                                        value="{{ old('villec') }}" placeholder="Adresse locale">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Date de naissance
                                                </th>
                                                <td>
                                                    <input type="date" name="dateNaissancec" class="form-control"
                                                        value="{{ old('dateNaissancec') }}" placeholder="Date naissance">
                                                </td>
                                                <th>
                                                    Nationalite
                                                </th>
                                                <td>
                                                    <input type="text" name="nationalitec" class="form-control"
                                                        value="{{ old('nationalitec') }}" placeholder="Nationalite">
                                                </td>
                                            </tr>
                                            <tr>

                                                <th>
                                                    CIN
                                                </th>
                                                <td>
                                                    <input type="number" name="cinc" class="form-control"
                                                        value="{{ old('cinc') }}" placeholder="CIN">
                                                </td>
                                                <th>
                                                    Date d'émission
                                                </th>
                                                <td>
                                                    <input type="date" name="dateEmitc" class="form-control"
                                                        value="{{ old('dateEmitc') }}" placeholder="Date d'émission">
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>
                                                    Permis de conduire
                                                </th>
                                                <td>
                                                    <input type="text" name="permisConduirec" class="form-control"
                                                        value="{{ old('permisConduirec') }}"
                                                        placeholder="Permis de conduire">
                                                </td>
                                                <th>
                                                    Date d'émission (permis conduire)
                                                </th>
                                                <td>
                                                    <input type="date" name="dateEmitPermisc" class="form-control"
                                                        value="{{ old('dateEmitPermisc') }}"
                                                        placeholder="Date d'émission">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Délivré par
                                                </th>
                                                <td>
                                                    <input type="text" name="delivrePermisc" class="form-control"
                                                        value="{{ old('delivrePermisc') }}" placeholder="Délivré par">
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
                                                        value="{{ old('livraison') }}" placeholder="Livraison *">
                                                </td>
                                                <th>
                                                    Reprise
                                                </th>
                                                <td colspan="2">
                                                    <input type="text" name="reprise" class="form-control"
                                                        value="{{ old('reprise') }}" placeholder="Reprise *">
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
                                                    <input type="datetime-local" name="dateDebut" id="dateDebut"
                                                        class="form-control" value="{{ old('dateDebut') }}"
                                                        placeholder="Date et heure *">
                                                </td>
                                                <th>
                                                    KM
                                                </th>
                                                <td>
                                                    <input type="number" name="kmD" id="kmD" class="form-control"
                                                        placeholder="KM">
                                                </td>
                                                <th>
                                                    Carburant
                                                </th>
                                                <td>
                                                    <input type="text" name="carburationD" id="carburationD"
                                                        class="form-control" value="{{ old('carburationD') }}"
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
                                                <td colspan="2">
                                                    <input type="datetime-local" name="dateFin" id="dateFin"
                                                        class="form-control" value="{{ old('dateFin') }}"
                                                        placeholder="Date et heure *">
                                                </td>

                                                <th>
                                                    Prolongation autorisé
                                                </th>
                                                <td colspan="2">
                                                    <input type="text" name="prolongation" class="form-control"
                                                        value="{{ old('prolongation') }}"
                                                        placeholder="Prolongation autorisé">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>



                                    <!-- TODO Facturation -->
                                    <p class="accordion"> Facturation </p>
                                    <div class="panel">
                                        <table class="table">
                                            <tr>
                                                <th class="text-primary" style="font-size: 18px">
                                                    Tarif / Jour TTC
                                                </th>
                                                <td colspan="2">
                                                    <!-- TODO TTC input -->
                                                    <input type="number" name="sousTotal" class="form-control"
                                                        id="montanttarif" step="any" value="{{ old('montanttarif') }}"
                                                        onkeypress="resttc()" onkeyup="resttc()"
                                                        placeholder="Tarif par jour *">
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>
                                                    2éme Conducteur
                                                </th>
                                                <td>
                                                    <input type="number" name="conducteuru" class="form-control"
                                                        id="conducteuru" onkeypress="resmontantcond()"
                                                        onkeyup="resmontantcond()" value="{{ old('conducteuru') }}"
                                                        step="any" placeholder="Prix Unitaire">
                                                </td>
                                                <td>
                                                    <input type="number" name="conducteurm" class="form-control"
                                                        id="conducteurm" value="{{ old('conducteurm') }}" step="any"
                                                        placeholder="Montant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Siege bébé
                                                </th>
                                                <td>
                                                    <input type="number" name="siegeBebeu" class="form-control" step="any"
                                                        id="siegeBebeu" onkeypress="resmontantsb()" onkeyup="resmontantsb()"
                                                        value="{{ old('siegeBebeu') }}" placeholder="Prix Unitaire">
                                                </td>
                                                <td>
                                                    <input type="number" name="siegeBebem" class="form-control" step="any"
                                                        id="siegeBebem" value="{{ old('siegeBebem') }}"
                                                        placeholder="Montant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Chauffeur
                                                </th>
                                                <td>
                                                    <input type="number" name="chauffeuru" class="form-control" step="any"
                                                        id="chauffeuru" onkeypress="resmontantchf()"
                                                        onkeyup="resmontantchf()" value="{{ old('chauffeuru') }}"
                                                        placeholder="Prix Unitaire">
                                                </td>
                                                <td>
                                                    <input type="number" name="chauffeurm" class="form-control" step="any"
                                                        id="chauffeurm" value="{{ old('chauffeurm') }}"
                                                        placeholder="Montant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Surcharge Aéroport
                                                </th>
                                                <td>
                                                    <input type="number" name="surchargeAeropu" class="form-control"
                                                        id="surchargeAeropu" onkeypress="resmontantsrch()"
                                                        onkeyup="resmontantsrch()" value="{{ old('surchargeAeropu') }}"
                                                        step="any" placeholder="Prix Unitaire">
                                                </td>
                                                <td>
                                                    <input type="number" name="surchargeAeropm" class="form-control"
                                                        id="surchargeAeropm" value="{{ old('surchargeAeropm') }}"
                                                        step="any" placeholder="Montant">
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>
                                                    Frais de livraison
                                                </th>
                                                <td colspan="2">
                                                    <input type="number" name="fraisLivraisonm" id="fraisLivraisonm"
                                                        class="form-control" onkeypress="sfraislivr()"
                                                        onkeyup="sfraislivr()" value="{{ old('fraisLivraisonm') }}"
                                                        step="any" placeholder="Montant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Frais de reprise
                                                </th>
                                                <td colspan="2">
                                                    <input type="number" name="fraisReprisem" id="fraisReprisem"
                                                        class="form-control" onkeypress="sfraisrep()"
                                                        onkeyup="sfraisrep()" value="{{ old('fraisReprisem') }}"
                                                        step="any" placeholder="Montant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-primary" style="font-size: 18px">
                                                    Total TTC
                                                </th>
                                                <td colspan="2">
                                                    <input type="number" name="montantDuD" class="form-control"
                                                        id="montantDuD" step="any" value="{{ old('montantDuD') }}"
                                                        onkeypress="resttc()" onkeyup="resttc()" placeholder="Montant *">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-primary" style="font-size: 18px">
                                                    Montant Net HT
                                                </th>
                                                <td colspan="2">
                                                    <input type="number" name="montantNet" class="form-control"
                                                        id="montantNet" onkeypress="resnet()" onkeyup="resnet()" step="any"
                                                        value="{{ old('montantNet') }}" placeholder="Montant *">
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="text-primary" style="font-size: 18px">
                                                    Montant recu avec remerciments
                                                </th>
                                                <td>
                                                    <input type="number" name="montantRecu" id="montantRecu"
                                                        class="form-control" onkeypress="resrecu()" onkeyup="resrecu()"
                                                        step="any" value="{{ old('montantRecu') }}"
                                                        placeholder="Montant *">
                                                </td>
                                                <th class="text-primary" style="font-size: 18px">
                                                    Montant du
                                                </th>
                                                <td>
                                                    <input type="number" name="montantDu" id="montantDu"
                                                        onkeypress="resmontantdu()" onkeyup="resmontantdu()" class="form-control"
                                                        step="any" value="{{ old('montantDu') }}"
                                                        placeholder="Montant *">
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
                                                    <input type="checkbox" id="cartGrise" name="cartGrise" value="1"
                                                        checked>
                                                    <strong for="cartGrise"> Carte grise </strong>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="attestAssurance" name="attestAssurance"
                                                        value="1" checked>
                                                    <strong for="attestAssurance"> Attestation d'assurance </strong>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="carteExploitation" name="carteExploitation"
                                                        value="1" checked>
                                                    <strong for="carteExploitation"> Carte d'exploitation </strong>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="vignatte" name="vignatte" value="1" checked>
                                                    <strong for="vignatte"> Vignette </strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" id="visiteTechnique" name="visiteTechnique"
                                                        value="1" checked>
                                                    <strong for="visiteTechnique"> Visite technique </strong>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="roueSecours" name="roueSecours" value="1"
                                                        checked>
                                                    <strong for="roueSecours"> Roue de secours </strong>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="lecteurCd" name="lecteurCd" value="1"
                                                        checked>
                                                    <strong for="lecteurCd"> Lecteur CD - Radio </strong>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="tapis" name="tapis" value="1" checked>
                                                    <strong for="tapis"> Tapis </strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" id="cric" name="cric" value="1" checked>
                                                    <strong for="cric"> Cric </strong>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="enjoliveur" name="enjoliveur" value="1"
                                                        checked>
                                                    <strong for="enjoliveur"> Enjoliveur </strong>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="antenne" name="antenne" value="1" checked>
                                                    <strong for="antenne"> Antenne </strong>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="allumeCigar" name="allumeCigar" value="1"
                                                        checked>
                                                    <strong for="allumeCigar"> Allume cigare </strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" id="trianglePanne" name="trianglePanne" value="1"
                                                        checked>
                                                    <strong for="trianglePanne"> Triangle de panne </strong>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="autre" name="autre" value="1" checked>
                                                    <strong for="autre"> Autre </strong>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>




                                </div>
                                <button type="submit" class="float"> Ajouter </button>
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

    <script>
        function update() {
            fop = document.getElementById("matricule").value;
            carb = document.getElementById("matricule").options[document.getElementById("matricule").selectedIndex + 1]
                .value;
            km = document.getElementById("matricule").options[document.getElementById("matricule").selectedIndex + 2].value;
            if (fop != '--- Sélectionnez Matricule *---') {
                document.getElementById("carburationD").value = carb;
                document.getElementById("kmD").value = km;
            } else {
                document.getElementById("carburationD").value = '';
                document.getElementById("kmD").value = '';
            }
        }

        /*function resmontantlb() {
            datedebut = new Date(document.getElementById("dateDebut").value);
            var dd = String(datedebut.getDate()).padStart(2, '0');
            var mm = String(datedebut.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = datedebut.getFullYear();
            datedebut = yyyy + '-' + mm + '-' + dd;

            datefin = new Date(document.getElementById("dateFin").value);
            var dd = String(datefin.getDate()).padStart(2, '0');
            var mm = String(datefin.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = datefin.getFullYear();
            datefin = yyyy + '-' + mm + '-' + dd;

            const diffInMs = new Date(datefin) - new Date(datedebut);
            const diffInDays = diffInMs / (1000 * 60 * 60 * 24);

            locationBaseu = document.getElementById("locationBaseu").value;
            document.getElementById("locationBasem").value = locationBaseu * diffInDays;
        }*/

        function resmontantcond() {
            datedebut = new Date(document.getElementById("dateDebut").value);
            var dd = String(datedebut.getDate()).padStart(2, '0');
            var mm = String(datedebut.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = datedebut.getFullYear();
            datedebut = yyyy + '-' + mm + '-' + dd;

            datefin = new Date(document.getElementById("dateFin").value);
            var dd = String(datefin.getDate()).padStart(2, '0');
            var mm = String(datefin.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = datefin.getFullYear();
            datefin = yyyy + '-' + mm + '-' + dd;

            const diffInMs = new Date(datefin) - new Date(datedebut);
            const diffInDays = diffInMs / (1000 * 60 * 60 * 24);

            conducteuru = document.getElementById("conducteuru").value;
            document.getElementById("conducteurm").value = conducteuru * diffInDays;
            resttc();
        }

        function resmontantsb() {
            datedebut = new Date(document.getElementById("dateDebut").value);
            var dd = String(datedebut.getDate()).padStart(2, '0');
            var mm = String(datedebut.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = datedebut.getFullYear();
            datedebut = yyyy + '-' + mm + '-' + dd;

            datefin = new Date(document.getElementById("dateFin").value);
            var dd = String(datefin.getDate()).padStart(2, '0');
            var mm = String(datefin.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = datefin.getFullYear();
            datefin = yyyy + '-' + mm + '-' + dd;

            const diffInMs = new Date(datefin) - new Date(datedebut);
            const diffInDays = diffInMs / (1000 * 60 * 60 * 24);

            siegeBebeu = document.getElementById("siegeBebeu").value;
            document.getElementById("siegeBebem").value = siegeBebeu * diffInDays;
            resttc();
        }

        function resmontantchf() {
            datedebut = new Date(document.getElementById("dateDebut").value);
            var dd = String(datedebut.getDate()).padStart(2, '0');
            var mm = String(datedebut.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = datedebut.getFullYear();
            datedebut = yyyy + '-' + mm + '-' + dd;

            datefin = new Date(document.getElementById("dateFin").value);
            var dd = String(datefin.getDate()).padStart(2, '0');
            var mm = String(datefin.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = datefin.getFullYear();
            datefin = yyyy + '-' + mm + '-' + dd;

            const diffInMs = new Date(datefin) - new Date(datedebut);
            const diffInDays = diffInMs / (1000 * 60 * 60 * 24);

            chauffeuru = document.getElementById("chauffeuru").value;
            document.getElementById("chauffeurm").value = chauffeuru * diffInDays;
            resttc();
        }

        function resmontantsrch() {
            datedebut = new Date(document.getElementById("dateDebut").value);
            var dd = String(datedebut.getDate()).padStart(2, '0');
            var mm = String(datedebut.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = datedebut.getFullYear();
            datedebut = yyyy + '-' + mm + '-' + dd;

            datefin = new Date(document.getElementById("dateFin").value);
            var dd = String(datefin.getDate()).padStart(2, '0');
            var mm = String(datefin.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = datefin.getFullYear();
            datefin = yyyy + '-' + mm + '-' + dd;

            const diffInMs = new Date(datefin) - new Date(datedebut);
            const diffInDays = diffInMs / (1000 * 60 * 60 * 24);

            surchargeAeropu = document.getElementById("surchargeAeropu").value;
            document.getElementById("surchargeAeropm").value = surchargeAeropu * diffInDays;
            resttc();
        }

        function sfraislivr() {

            resttc();
        }

        function sfraisrep() {

            resttc();
        }


        function tarifjour() {
            resttc();
        }


        function resttc() {
            datedebut = new Date(document.getElementById("dateDebut").value);
            var dd = String(datedebut.getDate()).padStart(2, '0');
            var mm = String(datedebut.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = datedebut.getFullYear();
            datedebut = yyyy + '-' + mm + '-' + dd;

            datefin = new Date(document.getElementById("dateFin").value);
            var dd = String(datefin.getDate()).padStart(2, '0');
            var mm = String(datefin.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = datefin.getFullYear();
            datefin = yyyy + '-' + mm + '-' + dd;

            const diffInMs = new Date(datefin) - new Date(datedebut);
            const diffInDays = diffInMs / (1000 * 60 * 60 * 24);



            if (document.getElementById("conducteurm").value == '') {
                conducteur = 0;
            } else {
                conducteur = parseFloat(document.getElementById("conducteurm").value);
            }
            if (document.getElementById("siegeBebem").value == '') {
                siegeBebe = 0;
            } else {
                siegeBebe = parseFloat(document.getElementById("siegeBebem").value);
            }
            if (document.getElementById("chauffeurm").value == '') {
                chauffeur = 0;
            } else {
                chauffeur = parseFloat(document.getElementById("chauffeurm").value);
            }
            if (document.getElementById("surchargeAeropm").value == '') {
                surchargeAerop = 0;
            } else {
                surchargeAerop = parseFloat(document.getElementById("surchargeAeropm").value);
            }

            if (document.getElementById("fraisLivraisonm").value == '') {
                fraisLivrais = 0;
            } else {
                fraisLivrais = parseFloat(document.getElementById("fraisLivraisonm").value);
            }
            if (document.getElementById("fraisReprisem").value == '') {
                fraisRep = 0;
            } else {
                fraisRep = parseFloat(document.getElementById("fraisReprisem").value);
            }

            if (document.getElementById("montanttarif").value == '') {
                montanttarif = 0;
            } else {
                montanttarif = parseFloat(document.getElementById("montanttarif").value);
            }


            document.getElementById("montantDuD").value = (montanttarif * diffInDays) +
                conducteur + siegeBebe + chauffeur + surchargeAerop + fraisLivrais + fraisRep;

            resnet();
        }

        function resnet() {

            if (document.getElementById("montantDuD").value == '') {
                vtotalttc = 0;
            } else {
                vtotalttc = parseFloat(document.getElementById("montantDuD").value);
            }
            document.getElementById("montantNet").value = (vtotalttc - 0.6) / 1.19;
            resrecu();
        }

        function resrecu() {
            // TODO resrecu
            if (document.getElementById("montantNet").value == '') {
                vmontantNet = 0;
            } else {
                vmontantNet = parseFloat(document.getElementById("montantNet").value);
            }
            document.getElementById("montantRecu").value = vmontantNet;

            if (document.getElementById("montantRecu").value == '') {
                document.getElementById("montantDu").value = vmontantNet;
            } else {
                document.getElementById("montantDu").value = parseFloat(document.getElementById("montantRecu").value);
            }

            resmontantdu();

        }

        function resmontantdu() {
            mmontantRecu = 0;
            if (document.getElementById("montantDuD").value == '') {
                mtotalttc = 0;
            } else {
                mtotalttc = parseFloat(document.getElementById("montantDuD").value);
                if (document.getElementById("montantRecu").value == '') {
                    mmontantRecu = 0;
                } else {
                    mmontantRecu = parseFloat(document.getElementById("montantRecu").value);
                }
            }

            montantdu = mtotalttc - mmontantRecu;
            document.getElementById("montantDu").value = parseFloat(montantdu);
        }
    </script>


@endsection
