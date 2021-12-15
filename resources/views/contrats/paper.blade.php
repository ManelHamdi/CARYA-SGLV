<style>
    #table {
        max-width: 2480px;
        width: 100%;
        border-collapse: collapse;
    }

    #tableis {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid rgb(146, 142, 142);
    }

    #tableit {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid rgb(146, 142, 142);
    }

    #table td {
        width: 25%;
        overflow: hidden;
        word-wrap: break-word;
        font-size: 14px;
    }

    #tableis td {
        width: auto;
        border: 1px solid rgb(146, 142, 142);
        font-size: 14px;
    }

    #tableit td {
        width: auto;
        border: 1px solid rgb(146, 142, 142);
        font-size: 14px;
        padding: 2px;
    }

    #mp {
        text-align: center;
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

</style>
<table id="table">
    <tr>
        <td rowspan="2">
            <img src="{{ 'data:image/*;base64,' . base64_encode($entreprise->logo) }}"
                style="height:80px; width:130px" />
        </td>

        <td colspan="3">
            <h3> Contrat de location &nbsp;&nbsp;&nbsp; عقد كراء </h3>
        </td>
    </tr>
    <tr>
        <td rowspan="2" style="text-align:center;">
            <h2> {{ $contrat->id }} 0487120003 &nbsp; </h2>
        </td>
        <td style="border: 1px solid rgb(146, 142, 142);">
            Type / النوع
            <p id="mp"><strong>
                    {{ $vehicule($contrat->vehicule_matricule)->type }} &nbsp;
                </strong></p>
        </td>
        <td style="border: 1px solid rgb(146, 142, 142);">
            Immatriculation/الرقم المنجمي
            <p id="mp"><strong>
                    {{ $contrat->vehicule_matricule }} &nbsp;
                </strong></p>
        </td>
    </tr>
    <tr>
        <td>
            <strong> {{ $entreprise->adresse }} &nbsp; </strong> <br />
            <strong> {{ $entreprise->ville }} &nbsp; </strong> <br />
            <strong> Tél : {{ $entreprise->telephone }} &nbsp; </strong> <br />
        </td>
        <td style="border: 1px solid rgb(146, 142, 142);">
            Livraison / التسليم
            <p id="mp"><strong>
                    {{ $contrat->livraison }} &nbsp;
                </strong></p>
        </td>
        <td style="border: 1px solid rgb(146, 142, 142);">
            Reprise / استرجاع
            <p id="mp"><strong>
                    {{ $contrat->reprise }} &nbsp;
                </strong></p>
        </td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td colspan="2">
            <table id="tableit">
                <tr>
                    <td colspan="3">
                        <p style="text-align:left;margin-bottom: 0px">
                            Facturé à
                            <span style="float:right;">
                                مفكترة إلى
                            </span>
                        </p>
                        <p id="mp">
                            <strong>
                                {{ $client($contrat->client_id)->nom . ' ' . $client($contrat->client_id)->prenom }} &nbsp;
                            </strong>
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
                            <strong>
                                {{ $client($contrat->client_id)->nom . ' ' . $client($contrat->client_id)->prenom }}&nbsp;
                            </strong>
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
                            <strong>
                                {{ $client($contrat->client_id)->adresse }} &nbsp;
                            </strong>
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
                            <strong>
                                {{ $client($contrat->client_id)->ville }} &nbsp;
                            </strong>
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
                            <strong>
                                {{ $client($contrat->client_id)->dateNaissance . ' ' . $client($contrat->client_id)->lieuNaissance }} &nbsp;
                            </strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="border-right: 0px rgb(146, 142, 142); text-align: center">
                        Nationnalite/الجنسية
                        <p id="mp">
                            <strong>
                                {{ $client($contrat->client_id)->nationalite }} &nbsp;
                            </strong>
                        </p>
                    </td>
                    <td style="border-left: 0px;border-right: 0px; text-align: center">
                        CIN/رقم ب.ت.و
                        <p id="mp">
                            <strong>
                                {{ $client($contrat->client_id)->cin }} &nbsp;
                            </strong>
                        </p>
                    </td>
                    <td style="border-left: 0px rgb(146, 142, 142); text-align: center">
                        Date d'émission/تاريخ الإصدار
                        <p id="mp">
                            <strong>
                                {{ $client($contrat->client_id)->dateEmit }} &nbsp;
                            </strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="border: 0px rgb(146, 142, 142); text-align: center">
                        Permis de conduire <br />
                        رخصة السياقة
                        <p id="mp">
                            <strong>
                                {{ $client($contrat->client_id)->permisConduire }} &nbsp;
                            </strong>
                        </p>
                    </td>
                    <td style="border: 0px rgb(146, 142, 142); text-align: center">
                        Délivré par <br />
                        أصدرت عن
                        <p id="mp">
                            <strong>
                                {{ $client($contrat->client_id)->delivrePermis }} &nbsp;
                            </strong>
                        </p>
                    </td>
                    <td style="border: 0px rgb(146, 142, 142); text-align: center">
                        Date d'émission <br /> تاريخ الإصدار
                        <p id="mp">
                            <strong>
                                {{ $client($contrat->client_id)->dateEmitPermis }} &nbsp;
                            </strong>
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
                            <strong>
                                {{ $conducteur($contrat->client_id)->nom . ' ' . $conducteur($contrat->client_id)->prenom }} &nbsp;
                            </strong>
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
                            <strong>
                                {{ $conducteur($contrat->client_id)->adresse }} &nbsp;
                            </strong>
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
                            <strong>
                                {{ $conducteur($contrat->client_id)->ville }} &nbsp;
                            </strong>
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
                            <strong>
                                {{ $conducteur($contrat->client_id)->dateNaissance . ' ' . $conducteur($contrat->client_id)->lieuNaissance }} &nbsp;
                            </strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="border-right: 0px rgb(146, 142, 142); text-align: center">
                        Nationnalite/الجنسية
                        <p id="mp">
                            <strong>
                                {{ $conducteur($contrat->client_id)->nationalite }} &nbsp;
                            </strong>
                        </p>
                    </td>
                    <td style="border-left: 0px;border-right: 0px; text-align: center">
                        CIN/رقم ب.ت.و
                        <p id="mp">
                            <strong>
                                {{ $conducteur($contrat->client_id)->cin }} &nbsp;
                            </strong>
                        </p>
                    </td>
                    <td style="border-left: 0px rgb(146, 142, 142); text-align: center">
                        Date d'émission/تاريخ الإصدار
                        <p id="mp">
                            <strong>
                                {{ $conducteur($contrat->client_id)->dateEmit }} &nbsp;
                            </strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="border: 0px rgb(146, 142, 142); text-align: center">
                        Permis de conduire <br />
                        رخصة السياقة
                        <p id="mp">
                            <strong>
                                {{ $conducteur($contrat->client_id)->permisConduire }} &nbsp;
                            </strong>
                        </p>
                    </td>
                    <td style="border: 0px rgb(146, 142, 142); text-align: center">
                        Délivré par <br />
                        أصدرت عن
                        <p id="mp">
                            <strong>
                                {{ $conducteur($contrat->client_id)->delivrePermis }} &nbsp;
                            </strong>
                        </p>
                    </td>
                    <td style="border: 0px rgb(146, 142, 142); text-align: center">
                        Date d'émission <br /> تاريخ الإصدار
                        <p id="mp">
                            <strong>
                                {{ $conducteur($contrat->client_id)->dateEmitPermis }} &nbsp;
                            </strong>
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
                            <strong>
                                {{ $contrat->dateDebut }} &nbsp;
                            </strong>
                        </p>
                    </td>
                    <td style="text-align: center">
                        KM / العداد
                        <p id="mp">
                            <strong>
                                {{ $contrat->kmD }} &nbsp;
                            </strong>
                        </p>
                    </td>
                    <td style="text-align: center">
                        Carburant / مستوى الوقود
                        <p id="mp">
                            <strong>
                                {{ $contrat->carburationD }} &nbsp;
                            </strong>
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
                            <strong>
                                {{ $contrat->dateFin }} &nbsp;
                            </strong>
                        </p>
                    </td>
                    <td style="text-align: center">
                        KM / العداد
                        <p id="mp">
                            <strong>
                                {{ $contrat->kmR }} &nbsp;
                            </strong>
                        </p>
                    </td>
                    <td style="text-align: center">
                        Carburant / مستوى الوقود
                        <p id="mp">
                            <strong>
                                {{ $contrat->carburationR }} &nbsp;
                            </strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center">
                        Nombre de jours / عدد الأيام
                        <p id="mp">
                            <strong>
                                {{ $contrat->nbrJour }} &nbsp;
                            </strong>
                        </p>
                    </td>
                    <td colspan="2" style="text-align: center">
                        Prolongation autorisé / تمديد مرخص
                        <p id="mp">
                            <strong>
                                {{ $contrat->prolongation }} &nbsp;
                            </strong>
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
                            {{ $montant($contrat->id)->montantRecu  }} &nbsp;
                        </strong>
                    </td>
                    <td style="border-left: 0px; text-align: right; font-size: 13px">
                      <strong>  المبلغ المقبوض مع الشكر </strong>
                    </td>
                </tr>
                <tr>
                    <td style="border: 0px;; font-size: 13px">
                        <strong> Montant Dû </strong>
                    </td>
                    <td style="border: 0px; text-align: center; font-size: 13px">
                        <strong>
                            {{ $montant($contrat->id)->montantDu  }} &nbsp;
                        </strong>
                    </td>
                    <td style="border: 0px; text-align: right; font-size: 13px">
                      <strong>  المبلغ المتخلد في الذمة  </strong>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
    <tr>
        <td style="border: 1px solid rgb(146, 142, 142); ">
            <img src="/images/car-check-out.png"
                style="height:130px; width:100%" />
        </td>
        <td colspan="2" style="border: 1px solid rgb(146, 142, 142);">
            . check 1
        </td>
        <td colspan="2" style="border: 1px solid rgb(146, 142, 142);">
            . check 2
        </td>
    </tr>
</table>