<script type="text/javascript">
    window.print()
</script>

<style>
    body {
        font-family: 'Times New Roman', Times, serif;
    }

    #fright {
        float: right;
        width: 20%;
        text-align: right;
    }

    #table {
        max-width: 2480px;
        width: 100%;
        border-collapse: collapse;
    }

    #table td {
        width: 25%;
        overflow: hidden;
        word-wrap: break-word;
        font-size: 13px;
    }

    #tableis {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid rgb(146, 142, 142);
    }

    #tableis td {
        width: auto;
        border: 1px solid rgb(146, 142, 142);
        font-size: 13px;
    }

    #tableit {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid rgb(146, 142, 142);
    }

    #tableit td {
        width: auto;
        border: 1px solid rgb(146, 142, 142);
        font-size: 13px;
        padding: 2px;
    }

    #tableic {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid rgb(146, 142, 142);
        padding: 0px;
    }

    #tableic td {
        font-size: 13px;
        padding: 0px;
    }

    #tableie {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid rgb(146, 142, 142);
        margin-top: 2px;
    }

    #tableie td {
        border: 1px solid rgb(146, 142, 142);
        font-size: 12px;
        font-weight: bold;
    }

    #tableii {
        width: 100%;
        margin-top: 0px;
        padding: 0px;

    }

    #tableii td {
        width: 50%;
        font-size: 12px;
        font-weight: bold;
        border: 0px;
        margin-top: 0px;
    }

    #mp {
        text-align: center;
        font-weight: bold;
        margin-top: 0px;
        margin-bottom: 0px;
        margin-left: 0px;
        margin-right: 0px;
        padding-top: 0px;
    }

    #rp {
        text-align: right;
        margin-top: 0px;
        margin-bottom: 0px;
        margin-left: 0px;
        margin-right: 0px;
        padding-top: 0px;
    }

    #bp {
        font-weight: bold;
        margin-top: 0px;
        margin-bottom: 0px;
        margin-left: 0px;
        margin-right: 0px;
        padding-top: 0px;
    }

</style>

<table id="table">
    <tr>
        <td rowspan="2">
            <img src="{{ 'data:image/*;base64,' . base64_encode($entreprise->logo) }}"
                style="width:150px; max-height: 100px" />
        </td>

        <td colspan="3">
            <h3> Contrat de location
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                عقد كراء </h3>
        </td>
    </tr>
    <tr>
        <td rowspan="2" style="text-align:center;">
            <h2> {{ $contrat->id }} &nbsp; </h2>
        </td>
        <td style="border: 1px solid rgb(146, 142, 142);">
            Type / النوع
            <p id="mp">
                {{ $vehicule($contrat->vehicule_matricule)->type }} &nbsp;
            </p>
        </td>
        <td style="border: 1px solid rgb(146, 142, 142);">
            Immatriculation/الرقم المنجمي
            <p id="mp">
                {{ $contrat->vehicule_matricule }} &nbsp;
            </p>
        </td>
    </tr>
    <tr>
        <td>
            <p id="bp"> {{ $entreprise->adresse }} &nbsp; </p>
            <p id="bp"> {{ $entreprise->ville }} &nbsp; </p>
            <p id="bp"> Tél : {{ $entreprise->telephone }} &nbsp; </p>
        </td>
        <td style="border: 1px solid rgb(146, 142, 142);">
            Livraison / التسليم
            <p id="mp">
                {{ $contrat->livraison }} &nbsp;
            </p>
        </td>
        <td style="border: 1px solid rgb(146, 142, 142);">
            Reprise / استرجاع
            <p id="mp">
                {{ $contrat->reprise }} &nbsp;
            </p>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <table id="tableit">
                <tr>
                    <td colspan="3">
                        <p style="text-align:left;margin-bottom: 0px">
                            Facturé à
                            <span id="fright">
                                مفكترة إلى
                            </span>
                        </p>
                        <p id="mp">
                            {{ $client($contrat->client_id)->nom . ' ' . $client($contrat->client_id)->prenom }}
                            &nbsp;
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <p style="text-align:left;margin-bottom: 0px">
                            Conducteur
                            <span style="float:right;">
                                السائق
                            </span>
                        </p>
                        <p id="mp">
                            {{ $client($contrat->client_id)->nom . ' ' . $client($contrat->client_id)->prenom }}&nbsp;
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <p style="text-align:left;margin-bottom: 0px">
                            Adresse du domicile
                            <span style="float:right;">
                                عنوان السكن
                            </span>
                        </p>
                        <p id="mp">
                            {{ $client($contrat->client_id)->adresse }} &nbsp;
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <p style="text-align:left;margin-bottom: 0px">
                            Adresse locale
                            <span style="float:right;">
                                العنوان المحلي
                            </span>
                        </p>
                        <p id="mp">
                            {{ $client($contrat->client_id)->ville }} &nbsp;
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <p style="text-align:left;margin-bottom: 0px">
                            Date et lieu de naissance
                            <span style="float:right;">
                                تاريخ ومكان الولادة
                            </span>
                        </p>
                        <p id="mp">
                            {{ $client($contrat->client_id)->dateNaissance . ' ' . $client($contrat->client_id)->lieuNaissance }}
                            &nbsp;
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="border-right: 0px rgb(146, 142, 142); text-align: center">
                        Nationnalite/الجنسية
                        <p id="mp">
                            {{ $client($contrat->client_id)->nationalite }} &nbsp;
                        </p>
                    </td>
                    <td style="border-left: 0px;border-right: 0px; text-align: center">
                        CIN/رقم ب.ت.و
                        <p id="mp">
                            {{ $client($contrat->client_id)->cin }} &nbsp;
                        </p>
                    </td>
                    <td style="border-left: 0px rgb(146, 142, 142); text-align: center">
                        Date d'émission/تاريخ الإصدار
                        <p id="mp">
                            {{ $client($contrat->client_id)->dateEmit }} &nbsp;
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="border: 0px rgb(146, 142, 142); text-align: center">
                        Permis de conduire <br />
                        رخصة السياقة
                        <p id="mp">
                            {{ $client($contrat->client_id)->permisConduire }} &nbsp;
                        </p>
                    </td>
                    <td style="border: 0px rgb(146, 142, 142); text-align: center">
                        Délivré par <br />
                        أصدرت عن
                        <p id="mp">
                            {{ $client($contrat->client_id)->delivrePermis }} &nbsp;
                        </p>
                    </td>
                    <td style="border: 0px rgb(146, 142, 142); text-align: center">
                        Date d'émission <br /> تاريخ الإصدار
                        <p id="mp">
                            {{ $client($contrat->client_id)->dateEmitPermis }} &nbsp;
                        </p>
                    </td>
                </tr>
            </table>

            <table id="tableit" style="margin-top: 3px">
                <tr>
                    <td colspan="3">
                        <p style="text-align:left;margin-bottom: 0px">
                            2éme Conducteur
                            <span style="float:right;">
                                السائق الثاني
                            </span>
                        </p>
                        <p id="mp">
                            {{ $conducteur($contrat->client_id)->nom . ' ' . $conducteur($contrat->client_id)->prenom }}
                            &nbsp;
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <p style="text-align:left;margin-bottom: 0px">
                            Adresse du domicile
                            <span style="float:right;">
                                عنوان السكن
                            </span>
                        </p>
                        <p id="mp">
                            {{ $conducteur($contrat->client_id)->adresse }} &nbsp;
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <p style="text-align:left;margin-bottom: 0px">
                            Adresse locale
                            <span style="float:right;">
                                العنوان المحلي
                            </span>
                        </p>
                        <p id="mp">
                            {{ $conducteur($contrat->client_id)->ville }} &nbsp;
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <p style="text-align:left;margin-bottom: 0px">
                            Date et lieu de naissance
                            <span style="float:right;">
                                تاريخ ومكان الولادة
                            </span>
                        </p>
                        <p id="mp">
                            {{ $conducteur($contrat->client_id)->dateNaissance . ' ' . $conducteur($contrat->client_id)->lieuNaissance }}
                            &nbsp;
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="border-right: 0px rgb(146, 142, 142); text-align: center">
                        Nationnalite/الجنسية
                        <p id="mp">
                            {{ $conducteur($contrat->client_id)->nationalite }} &nbsp;
                        </p>
                    </td>
                    <td style="border-left: 0px;border-right: 0px; text-align: center">
                        CIN/رقم ب.ت.و
                        <p id="mp">
                            {{ $conducteur($contrat->client_id)->cin }} &nbsp;
                        </p>
                    </td>
                    <td style="border-left: 0px rgb(146, 142, 142); text-align: center">
                        Date d'émission/تاريخ الإصدار
                        <p id="mp">
                            {{ $conducteur($contrat->client_id)->dateEmit }} &nbsp;
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="border: 0px rgb(146, 142, 142); text-align: center">
                        Permis de conduire <br />
                        رخصة السياقة
                        <p id="mp">
                            {{ $conducteur($contrat->client_id)->permisConduire }} &nbsp;
                        </p>
                    </td>
                    <td style="border: 0px rgb(146, 142, 142); text-align: center">
                        Délivré par <br />
                        أصدرت عن
                        <p id="mp">
                            {{ $conducteur($contrat->client_id)->delivrePermis }} &nbsp;
                        </p>
                    </td>
                    <td style="border: 0px rgb(146, 142, 142); text-align: center">
                        Date d'émission <br /> تاريخ الإصدار
                        <p id="mp">
                            {{ $conducteur($contrat->client_id)->dateEmitPermis }} &nbsp;
                        </p>
                    </td>
                </tr>
            </table>

        </td>
        <td colspan="2">
            <table id="tableis">
                <tr>
                    <td colspan="3">
                        <p style="text-align:left;">
                            Départ
                            <span style="float:right;">
                                الخروج
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center">
                        Date et heure / التاريخ و الساعة
                        <p id="mp">
                            {{ $contrat->dateDebut }} &nbsp;
                        </p>
                    </td>
                    <td style="text-align: center">
                        KM / العداد
                        <p id="mp">
                            {{ $contrat->kmD }} &nbsp;
                        </p>
                    </td>
                    <td style="text-align: center">
                        Carburant / مستوى الوقود
                        <p id="mp">
                            {{ $contrat->carburationD }} &nbsp;
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <p style="text-align:left;">
                            Retour
                            <span style="float:right;">
                                العودة
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center">
                        Date et heure / التاريخ و الساعة
                        <p id="mp">
                            {{ $contrat->dateFin }} &nbsp;
                        </p>
                    </td>
                    <td style="text-align: center">
                        KM / العداد
                        <p id="mp">
                            {{ $contrat->kmR }} &nbsp;
                        </p>
                    </td>
                    <td style="text-align: center">
                        Carburant / مستوى الوقود
                        <p id="mp">
                            {{ $contrat->carburationR }} &nbsp;
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center">
                        Nombre de jours / عدد الأيام
                        <p id="mp">
                            {{ $contrat->nbrJour }} &nbsp;
                        </p>
                    </td>
                    <td colspan="2" style="text-align: center">
                        Prolongation autorisé / تمديد مرخص
                        <p id="mp">
                            {{ $contrat->prolongation }} &nbsp;
                        </p>
                    </td>
                </tr>
            </table>
            <table id="tableis" style="margin-top: 3px">
                <tr>
                    <td style="text-align: center">
                        Désignation / البيان
                    </td>
                    <td style="text-align: center">
                        P.U. / ثمن الوحدة
                    </td>
                    <td style="text-align: center">
                        Montant / المبلغ
                    </td>
                </tr>
                <tr>
                    <td>
                        Location de base / مدة الكراء
                    </td>
                    <td>
                        <p id="rp">
                            <strong>
                                {{ $designu($contrat->id)->locationBase }} &nbsp;
                            </strong>
                        </p>
                    </td>
                    <td>
                        <p id="rp">
                            <strong>
                                {{ $designm($contrat->id)->locationBase }} &nbsp;
                            </strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        2éme conducteur / سائق ثاني
                    </td>
                    <td>
                        <p id="rp">
                            <strong>
                                {{ $designu($contrat->id)->conducteur }} &nbsp;
                            </strong>
                        </p>
                    </td>
                    <td>
                        <p id="rp">
                            <strong>
                                {{ $designm($contrat->id)->conducteur }} &nbsp;
                            </strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        Siège bébé / كرسي رضيع
                    </td>
                    <td>
                        <p id="rp">
                            <strong>
                                {{ $designu($contrat->id)->siegeBebe }} &nbsp;
                            </strong>
                        </p>
                    </td>
                    <td>
                        <p id="rp">
                            <strong>
                                {{ $designm($contrat->id)->siegeBebe }} &nbsp;
                            </strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        Chauffeur / سائق
                    </td>
                    <td>
                        <p id="rp">
                            <strong>
                                {{ $designu($contrat->id)->chauffeur }} &nbsp;
                            </strong>
                        </p>
                    </td>
                    <td>
                        <p id="rp">
                            <strong>
                                {{ $designm($contrat->id)->chauffeur }} &nbsp;
                            </strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        Surcharge Aérop. / معلوم المطار
                    </td>
                    <td>
                        <p id="rp">
                            <strong>
                                {{ $designu($contrat->id)->surchargeAerop }} &nbsp;
                            </strong>
                        </p>
                    </td>
                    <td>
                        <p id="rp">
                            <strong>
                                {{ $designm($contrat->id)->surchargeAerop }} &nbsp;
                            </strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        Sous Total HT / تحت الحساب
                    </td>
                    <td colspan="2" style="text-align: center">
                        <p>
                            <strong>
                                {{ $montant($contrat->id)->sousTotal }} &nbsp;
                            </strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        Remise / تخفيض
                    </td>
                    <td>
                        <p id="rp">
                            <strong>
                                {{ $designu($contrat->id)->remise }} &nbsp;
                            </strong>
                        </p>
                    </td>
                    <td>
                        <p id="rp">
                            <strong>
                                {{ $designm($contrat->id)->remise }} &nbsp;
                            </strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        Frais de livraison / تكلفة التسليم
                    </td>
                    <td>
                        <p id="rp">
                            <strong>
                                {{ $designu($contrat->id)->fraisLivraison }} &nbsp;
                            </strong>
                        </p>
                    </td>
                    <td>
                        <p id="rp">
                            <strong>
                                {{ $designm($contrat->id)->fraisLivraison }} &nbsp;
                            </strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        Frais de reprise / تكلفة الاسترجاع
                    </td>
                    <td>
                        <p id="rp">
                            <strong>
                                {{ $designu($contrat->id)->fraisReprise }} &nbsp;
                            </strong>
                        </p>
                    </td>
                    <td>
                        <p id="rp">
                            <strong>
                                {{ $designm($contrat->id)->fraisReprise }} &nbsp;
                            </strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        Montant Net HT / المبلغ الصافي
                    </td>
                    <td colspan="2" style="text-align: center">
                        <p>
                            <strong>
                                {{ $montant($contrat->id)->montantNet }} &nbsp;
                            </strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        TVA / أ. ق. م
                    </td>
                    <td>
                        <p id="rp">
                            <strong>
                                {{ $designu($contrat->id)->tva }} &nbsp;
                            </strong>
                        </p>
                    </td>
                    <td>
                        <p id="rp">
                            <strong>
                                {{ $designm($contrat->id)->tva }} &nbsp;
                            </strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        Supprission Franchise/jr / التأمين على الأضرار
                    </td>
                    <td>
                        <p id="rp">
                            <strong>
                                {{ $designu($contrat->id)->suppFranchise }} &nbsp;
                            </strong>
                        </p>
                    </td>
                    <td>
                        <p id="rp">
                            <strong>
                                {{ $designm($contrat->id)->suppFranchise }} &nbsp;
                            </strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        Assurance Passager/jr / التأمين على الأشخاص
                    </td>
                    <td>
                        <p id="rp">
                            <strong>
                                {{ $designu($contrat->id)->assurancePassager }} &nbsp;
                            </strong>
                        </p>
                    </td>
                    <td>
                        <p id="rp">
                            <strong>
                                {{ $designm($contrat->id)->assurancePassager }} &nbsp;
                            </strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        Timbre / الطابع الجبائي
                    </td>
                    <td>
                        <p id="rp">
                            <strong>
                                {{ $designu($contrat->id)->timbre }} &nbsp;
                            </strong>
                        </p>
                    </td>
                    <td>
                        <p id="rp">
                            <strong>
                                {{ $designm($contrat->id)->timbre }} &nbsp;
                            </strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        Montant Dû / المبلغ المطلوب
                    </td>
                    <td colspan="2" style="text-align: center">
                        <p>
                            <strong>
                                {{ $montant($contrat->id)->montantDuD }} &nbsp;
                            </strong>
                        </p>
                    </td>
                </tr>
            </table>

            <table id="tableis" style="margin-top: 3px">
                <tr>
                    <td style="border-right: 0px; font-size: 13px">
                        <strong> Montant recu avec remerciements </strong>
                    </td>
                    <td style="border-left: 0px;border-right: 0px; text-align: center; font-size: 13px">
                        <strong>
                            {{ $montant($contrat->id)->montantRecu }} &nbsp;
                        </strong>
                    </td>
                    <td style="border-left: 0px; text-align: right; font-size: 13px">
                        <strong> المبلغ المقبوض مع الشكر </strong>
                    </td>
                </tr>
                <tr>
                    <td style="border: 0px;; font-size: 13px">
                        <strong> Montant Dû </strong>
                    </td>
                    <td style="border: 0px; text-align: center; font-size: 13px">
                        <strong>
                            {{ $montant($contrat->id)->montantDu }} &nbsp;
                        </strong>
                    </td>
                    <td style="border: 0px; text-align: right; font-size: 13px">
                        <strong> المبلغ المتخلد في الذمة </strong>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
    <tr>

        <table id="tableic">
            <tr>
                <td rowspan="7" colspan="1" style="text-align: center" width="30%">
                    <strong> CHECK OUT </strong>
                    <img src={{ 'data:image/*;base64,' . base64_encode(file_get_contents(public_path() . '/images/car-check-out.png')) }}
                        style="height:130px; width:190px" />
                </td>
                <td width="37%">
                    <input type="checkbox" id="cartGrise" name="cartGrise" onclick="return false;"
                        {{ $checkOut($contrat->id)->cartGrise == 1 ? 'checked="checked"' : '' }}>
                    <strong for="cartGrise"> Carte grise / البطاقة الرمادية </strong><br />
                </td>
                <td width="33%">
                    <input type="checkbox" id="tapis" name="tapis" onclick="return false;"
                        {{ $checkOut($contrat->id)->tapis == 1 ? 'checked' : '' }}>
                    <strong for="tapis"> Tapis / تابي </strong>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" id="attestAssurance" name="attestAssurance" onclick="return false;"
                        {{ $checkOut($contrat->id)->attestAssurance == 1 ? 'checked' : '' }}>
                    <strong for="attestAssurance"> Attestation d'assurance / شهادة التأمين </strong>
                </td>
                <td>
                    <input type="checkbox" id="cric" name="cric" onclick="return false;"
                        {{ $checkOut($contrat->id)->cric == 1 ? 'checked' : '' }}>
                    <strong for="cric"> Cric / رافعة </strong>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" id="carteExploitation" name="carteExploitation" onclick="return false;"
                        {{ $checkOut($contrat->id)->carteExploitation == 1 ? 'checked' : '' }}>
                    <strong for="carteExploitation"> Carte d'exploitation / بطاقة الإستغلال </strong><br />
                </td>
                <td>
                    <input type="checkbox" id="enjoliveur" name="enjoliveur" onclick="return false;"
                        {{ $checkOut($contrat->id)->enjoliveur == 1 ? 'checked' : '' }}>
                    <strong for="enjoliveur"> Enjoliveur / غطاء العجلات </strong>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" id="vignatte" name="vignatte" onclick="return false;"
                        {{ $checkOut($contrat->id)->vignatte == 1 ? 'checked' : '' }}>
                    <strong for="vignatte"> Vignette / معلوم الجولان </strong>
                </td>
                <td>
                    <input type="checkbox" id="antenne" name="antenne" onclick="return false;"
                        {{ $checkOut($contrat->id)->antenne == 1 ? 'checked' : '' }}>
                    <strong for="antenne"> Antenne / هوائي </strong>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" id="visiteTechnique" name="visiteTechnique" onclick="return false;"
                        {{ $checkOut($contrat->id)->visiteTechnique == 1 ? 'checked' : '' }}>
                    <strong for="visiteTechnique"> Visite technique / شهادة الفحص الفني </strong>
                </td>
                <td>
                    <input type="checkbox" id="allumeCigar" name="allumeCigar" onclick="return false;"
                        {{ $checkOut($contrat->id)->allumeCigar == 1 ? 'checked' : '' }}>
                    <strong for="allumeCigar"> Allume cigare / ولاعة السجائر </strong>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" id="roueSecours" name="roueSecours" onclick="return false;"
                        {{ $checkOut($contrat->id)->roueSecours == 1 ? 'checked' : '' }}>
                    <strong for="roueSecours"> Roue de secours / العجلة الاحتياطية </strong>
                </td>
                <td>
                    <input type="checkbox" id="trianglePanne" name="trianglePanne" onclick="return false;"
                        {{ $checkOut($contrat->id)->trianglePanne == 1 ? 'checked' : '' }}>
                    <strong for="trianglePanne"> Triangle de panne / مثلث العطب </strong>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" id="lecteurCd" name="lecteurCd" onclick="return false;"
                        {{ $checkOut($contrat->id)->lecteurCd == 1 ? 'checked' : '' }}>
                    <strong for="lecteurCd"> Lecteur CD - Radio / مشغل أقراص - راديو </strong>
                </td>
                <td>
                    <input type="checkbox" id="autre" name="autre" onclick="return false;"
                        {{ $checkOut($contrat->id)->autre == 1 ? 'checked' : '' }}>
                    <strong for="autre"> Autre / آخر </strong>
                </td>
            </tr>
        </table>

    </tr>
    <tr>

        <table id="tableie">
            <tr>
                <td valign="top" width="40%">
                    J'accuse réception du véhicule susmentionné
                    et accepte qu'il me soit loué aux conditions
                    fixées en page 1 et 2. Je reconnais que le
                    véhicule m'est remis tel que mentionné ci-dessus
                    et que le franchise pour dommages à ma charge
                    est de 1000DT à moins que je n'accepte de payer
                    le supplément pour supprimer la franchise en
                    apposant mes initiales ci-dessus.
                    <p style="text-align: right; margin-top: 0px;">
                        أعترف بتسليم السيارة المذكورة أعلاه. واقبل بكل
                        الشروط المذكورة في الصفحة الأولى والثانية واعترف
                        بتسليمي السيارة في الحالة المذكورة أعلاه وان قيمة
                        القسط المحمول على كاهل المؤمن له 5%
                        من قيمة السيارة والتزم بذلك.
                    </p>
                </td>
                <td valign="top" width="60%">
                    <strong> TRES IMPORTANT </strong> <br />
                    L'assurance ne couvre pas les accesoires,
                    bris de glace ainsi que le vol et les dégâts
                    occasionnés aux pneumatiques qui son exclusivement
                    à la charge du locataire.
                    <p style="text-align: right; margin-top: 0px;margin-bottom: 0px">
                        <strong> هام جدا </strong> <br />
                        التأمين لا يغطي الإكسسوارات (الملحقات) والأضرار
                        (الملحقة) الناتجة عن السرقة وعطب العجلات التي
                        تبقى على ذمة المستأجر حصريا.
                    </p>

                    <table id="tableii">
                        <tr>
                            <td>
                                Préparé par / محرر من <br />
                                {{ $cemploye->nom . ' ' . $cemploye->tel }}
                                &nbsp;
                            </td>
                            <td>
                                Signature du conducteur / إمضاء السائق <br />
                                {{ $client($contrat->client_id)->nom . ' ' . $client($contrat->client_id)->prenom }}
                                &nbsp;
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

    </tr>
</table>
