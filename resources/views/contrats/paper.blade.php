<style>
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
        font-size: 14px;
    }

    #tableis {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid rgb(146, 142, 142);
    }

    #tableis td {
        width: auto;
        border: 1px solid rgb(146, 142, 142);
        font-size: 14px;
    }

    #tableit {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid rgb(146, 142, 142);
    }

    #tableit td {
        width: auto;
        border: 1px solid rgb(146, 142, 142);
        font-size: 14px;
        padding: 2px;
    }

    #tableic {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid rgb(146, 142, 142);
        padding: 0px;
    }

    #tableic td {
        font-size: 14px;
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
    #nbp {
        margin-top: 0px;
        margin-bottom: 0px;
        margin-left: 0px;
        margin-right: 0px;
        padding-top: 0px;
    }

    #cp {
        text-align: center;
        margin-top: 0px;
        margin-bottom: 0px;
        margin-left: 0px;
        margin-right: 0px;
        padding-top: 0px;
    }

</style>

<table id="table">


    <tr>

        <td>
            <p id="nbp"> Adresse: {{ $entreprise->ville }} &nbsp; </p>
            <p id="nbp"> {{ $entreprise->adresse }} &nbsp; </p>
            <p id="nbp"> Tel: (216) {{ $entreprise->telephone }} &nbsp; </p>
            <p id="nbp"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (216) {{ $entreprise->telephone2 }} &nbsp;
            </p>
        </td>
        <td colspan="2" valign="top" style="text-align:center;">
            <img src="{{ 'data:image/*;base64,' . base64_encode($entreprise->logo) }}"
                style="width:180px; max-height: 90px" />
        </td>
        <td>
            <p id="nbp"> RIB STB : {{ $entreprise->rib }} &nbsp; </p>
            <p id="nbp"> </p>
            <p id="nbp"> M.F. {{ $entreprise->matfisc }} &nbsp; </p>
            <p id="nbp"> Email : {{ $entreprise->email }} &nbsp; </p>
        </td>

    </tr>
    <tr>

        <td>
            <p id="cp" style="font-size: 16px;"> Contrat N?? </p>
        </td>
        <td colspan="2" style="font-size: 16px; text-align:center;">
            <cp> 2022 / {{ $contrat->id }} &nbsp; </cp>
        </td>
        <td>
            <p id="cp" style="font-size: 16px"> ?????? ?????? </p>
        </td>

    </tr>
    <tr>
        <td colspan="2">
            <table id="tableit">
                <tr>
                    <td colspan="3">
                        <p style="text-align:left;margin-bottom: 0px">
                            Factur?? ??
                            <span id="fright">
                                ???????????? ??????
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
                                ????????????
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
                            Date et lieu de naissance
                            <span style="float:right;">
                                ?????????? ?????????? ??????????????
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
                        Nationnalite/??????????????
                        <p id="mp">
                            {{ $client($contrat->client_id)->nationalite }} &nbsp;
                        </p>
                    </td>
                    <td style="border-left: 0px;border-right: 0px; text-align: center">
                        CIN/?????? ??.??.??
                        <p id="mp">
                            {{ $client($contrat->client_id)->cin }} &nbsp;
                        </p>
                    </td>
                    <td style="border-left: 0px rgb(146, 142, 142); text-align: center">
                        Date d'??mission/?????????? ??????????????
                        <p id="mp">
                            {{ $client($contrat->client_id)->dateEmit }} &nbsp;
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="border: 0px rgb(146, 142, 142); text-align: center">
                        Permis de conduire <br />
                        ???????? ??????????????
                        <p id="mp">
                            {{ $client($contrat->client_id)->permisConduire }} &nbsp;
                        </p>
                    </td>
                    <td style="border: 0px rgb(146, 142, 142); text-align: center">
                        D??livr?? par <br />
                        ?????????? ????
                        <p id="mp">
                            {{ $client($contrat->client_id)->delivrePermis }} &nbsp;
                        </p>
                    </td>
                    <td style="border: 0px rgb(146, 142, 142); text-align: center">
                        Date d'??mission <br /> ?????????? ??????????????
                        <p id="mp">
                            {{ $client($contrat->client_id)->dateEmitPermis }} &nbsp;
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <p style="text-align:left;margin-bottom: 0px">
                            Adresse du domicile
                            <span style="float:right;">
                                ?????????? ??????????
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
                                ?????????????? ????????????
                            </span>
                        </p>
                        <p id="mp">
                            {{ $client($contrat->client_id)->ville }} &nbsp;
                        </p>
                    </td>
                </tr>
                <!--<tr>
                    <td colspan="3">
                        <p style="text-align:left;margin-bottom: 0px">
                            Date et lieu de naissance
                            <span style="float:right;">
                                ?????????? ?????????? ??????????????
                            </span>
                        </p>
                        <p id="mp">
                            {{ $conducteur($contrat->client_id)->dateNaissance . ' ' . $conducteur($contrat->client_id)->lieuNaissance }}
                            &nbsp;
                        </p>
                    </td>
                </tr>-->
            </table>

            <table id="tableit" style="margin-top: 3px">
                <tr>
                    <td colspan="3">
                        <p style="text-align:left;margin-bottom: 0px">
                            2??me Conducteur
                            <span style="float:right;">
                                ???????????? ????????????
                            </span>
                        </p>
                        <p id="mp">
                            {{ $conducteur($contrat->client_id)->nom . ' ' . $conducteur($contrat->client_id)->prenom }}
                            &nbsp;
                        </p>
                    </td>
                </tr>

                <tr>
                    <td style="border-right: 0px rgb(146, 142, 142); text-align: center">
                        Nationnalite/??????????????
                        <p id="mp">
                            {{ $conducteur($contrat->client_id)->nationalite }} &nbsp;
                        </p>
                    </td>
                    <td style="border-left: 0px;border-right: 0px; text-align: center">
                        CIN/?????? ??.??.??
                        <p id="mp">
                            {{ $conducteur($contrat->client_id)->cin }} &nbsp;
                        </p>
                    </td>
                    <td style="border-left: 0px rgb(146, 142, 142); text-align: center">
                        Date d'??mission/?????????? ??????????????
                        <p id="mp">
                            {{ $conducteur($contrat->client_id)->dateEmit }} &nbsp;
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="border: 0px rgb(146, 142, 142); text-align: center">
                        Permis de conduire <br />
                        ???????? ??????????????
                        <p id="mp">
                            {{ $conducteur($contrat->client_id)->permisConduire }} &nbsp;
                        </p>
                    </td>
                    <td style="border: 0px rgb(146, 142, 142); text-align: center">
                        D??livr?? par <br />
                        ?????????? ????
                        <p id="mp">
                            {{ $conducteur($contrat->client_id)->delivrePermis }} &nbsp;
                        </p>
                    </td>
                    <td style="border: 0px rgb(146, 142, 142); text-align: center">
                        Date d'??mission <br /> ?????????? ??????????????
                        <p id="mp">
                            {{ $conducteur($contrat->client_id)->dateEmitPermis }} &nbsp;
                        </p>
                    </td>
                </tr>
            </table>

        </td>
        <td colspan="2" valign="top">
            <table id="tableis">
                <tr>
                    <td colspan="3">
                        <p style="text-align:left;">
                            Vehicule
                            <span style="float:right;">
                                ??????????????
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>

                    <td colspan="2" style="border-right: 0px;">
                        <p style="text-align:left;margin-bottom: 0px">
                            Model
                            <span id="fright">
                                ???????? ??????????????
                            </span>
                        </p>
                        <p id="mp">
                            {{ $vehicule($contrat->vehicule_matricule)->model }} &nbsp;
                        </p>
                    </td>

                </tr>
                <tr>
                    <td colspan="2" style="border-right: 0px;">
                        <p style="text-align:left;margin-bottom: 0px">
                            Immatriculation
                            <span id="fright">
                                ?????????? ??????????????
                            </span>
                        </p>
                        <p id="mp">
                            {{ $vehicule($contrat->vehicule_matricule)->matricule }} &nbsp;
                        </p>

                    </td>

                </tr>
                <tr>
                    <td colspan="2" style="border-right: 0px;">
                        <p style="text-align:left;margin-bottom: 0px">
                            D??part
                            <span id="fright">
                                ????????????
                            </span>
                        </p>
                        <p id="mp">
                            Date et heure / ?????????????? ?? ???????????? <br />
                            {{ $contrat->dateDebut }} &nbsp;
                        </p>
                        <p style="text-align:left;margin-bottom: 0px;margin-top: 0px;">
                            Livraison
                            <span id="fright">
                                ??????????????
                            </span>
                        </p>

                        <p id="mp">
                            {{ $contrat->livraison }} &nbsp;
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="border-right: 0px;">
                        <p style="text-align:left;margin-bottom: 0px">
                            Retour
                            <span id="fright">
                                ????????????
                            </span>
                        </p>
                        <p id="mp">
                            Date et heure / ?????????????? ?? ???????????? <br />
                            {{ $contrat->dateFin }} &nbsp;
                        </p>
                        <p style="text-align:left;margin-bottom: 0px">
                            Reprise
                            <span id="fright">
                                ??????????????
                            </span>
                        </p>

                        <p id="mp">
                            {{ $contrat->reprise }} &nbsp;
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="border-right: 0px;">
                        <p style="text-align:left;margin-bottom: 0px">
                            Retour
                            <span id="fright">
                                ????????????
                            </span>
                        </p>
                        <p id="mp">
                            Date et heure / ?????????????? ?? ???????????? <br />
                            {{ $contrat->dateFin }} &nbsp;
                        </p>
                    </td>
                </tr>
            </table>
            <table id="tableis" style="margin-top: 3px">
                <tr>
                    <td style="text-align: center">
                        D??signation / ????????????
                    </td>
                    <td style="text-align: center">
                        P.U. / ?????? ????????????
                    </td>
                    <td style="text-align: center">
                        Montant / ????????????
                    </td>
                </tr>
                <tr>
                    <td>
                        Montant D?? / ???????????? ??????????????
                    </td>
                    <td colspan="2" style="text-align: center">
                        <p>
                            <strong>
                                {{ $montant($contrat->id)->montantDuD }} &nbsp;
                            </strong>
                        </p>
                    </td>
                </tr>


                <tr>
                    <td>
                        Si??ge b??b?? / ???????? ????????
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
                        <strong> ???????????? ?????????????? ???? ?????????? </strong>
                    </td>
                </tr>
                <tr>
                    <td style="border: 0px;; font-size: 13px">
                        <strong> Montant D?? </strong>
                    </td>
                    <td style="border: 0px; text-align: center; font-size: 13px">
                        <strong>
                            {{ $montant($contrat->id)->montantDu }} &nbsp;
                        </strong>
                    </td>
                    <td style="border: 0px; text-align: right; font-size: 13px">
                        <strong> ???????????? ?????????????? ???? ?????????? </strong>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
    <tr>
        <td colspan="4">
            <table id="tableic">
                <tr>
                    <td rowspan="8" valign="top" colspan="1" style="text-align: center" width="30%">
                        <strong> CHECK OUT </strong> <br />
                        <img src={{ 'data:image/*;base64,' . base64_encode(file_get_contents(public_path() . '/images/car-check-out.png')) }}
                            style="height: 90px; width: 190px;" />
                    </td>
                    <td width="37%">
                        <input type="checkbox" id="cartGrise" name="cartGrise" onclick="return false;"
                            {{ $checkOut($contrat->id)->cartGrise == 1 ? 'checked="checked"' : '' }}>
                        <strong for="cartGrise"> Carte grise / ?????????????? ???????????????? </strong><br />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" id="attestAssurance" name="attestAssurance" onclick="return false;"
                            {{ $checkOut($contrat->id)->attestAssurance == 1 ? 'checked' : '' }}>
                        <strong for="attestAssurance"> Attestation d'assurance / ?????????? ?????????????? </strong>
                    </td>
                    <td rowspan="8" valign="top">
                        <img src={{ 'data:image/*;base64,' . base64_encode(file_get_contents(public_path() . '/images/gazgauge.jpg')) }}
                            style="height:50px; width: 150px; margin-top: 20px; margin-left:20px;" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" id="carteExploitation" name="carteExploitation" onclick="return false;"
                            {{ $checkOut($contrat->id)->carteExploitation == 1 ? 'checked' : '' }}>
                        <strong for="carteExploitation"> Carte d'exploitation / ?????????? ?????????????????? </strong><br />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" id="vignatte" name="vignatte" onclick="return false;"
                            {{ $checkOut($contrat->id)->vignatte == 1 ? 'checked' : '' }}>
                        <strong for="vignatte"> Vignette / ?????????? ?????????????? </strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" id="visiteTechnique" name="visiteTechnique" onclick="return false;"
                            {{ $checkOut($contrat->id)->visiteTechnique == 1 ? 'checked' : '' }}>
                        <strong for="visiteTechnique"> Visite technique / ?????????? ?????????? ?????????? </strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" id="roueSecours" name="roueSecours" onclick="return false;"
                            {{ $checkOut($contrat->id)->roueSecours == 1 ? 'checked' : '' }}>
                        <strong for="roueSecours"> Roue de secours / ???????????? ???????????????????? </strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" id="cric" name="cric" onclick="return false;"
                            {{ $checkOut($contrat->id)->cric == 1 ? 'checked' : '' }}>
                        <strong for="cric"> Cric / ?????????? </strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        .
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="4">
            <table id="tableie">
                <tr>
                    <td valign="top" width="30%">
                        J'accuse r??ception du v??hicule ci-dessus.
                        J'accepte toutes les conditions stipul??es sur les
                        premi??re et deuxi??me pages, et je m'engage
                        ?? supporter la valeur de la prime qui est ?? ma
                        charge, soit 5% de la valeur de la voiture,
                         et je m'engage ?? le faire..
                        <p style="text-align: right; margin-top: 0px;">
                            ?????????? ???????????? ?????????????? ???????????????? ??????????. ?????????? ??????
                            ???????????? ?????????????? ?????????? ???? ???????????? ???????????? ???????????????? ???????????? ?????????? ????????
                            ?????????? ?????????????? ?????? ?????????? ?? ???? 5%
                            ???? ???????? ?????????????? ???????????? ????????.
                        </p>
                    </td>
                    <td valign="top" width="70%">
                        <p style="text-align:left;margin-bottom: 0px">
                            <strong> TRES IMPORTANT </strong>
                            <span id="fright">
                                <strong> ?????? ?????? </strong>
                            </span>
                        </p>
                        L'assurance ne couvre pas les accesoires,
                        bris de glace ainsi que le vol et les d??g??ts
                        occasionn??s aux pneumatiques qui son exclusivement
                        ?? la charge du locataire.
                        <p style="text-align: right; margin-top: 0px;margin-bottom: 0px">

                            ?????????????? ???? ???????? ?????????????????????? (????????????????) ????????????????
                            (??????????????) ?????????????? ???? ???????????? ???????? ?????????????? ????????
                            ???????? ?????? ?????? ???????????????? ??????????.
                        </p>

                        <table id="tableii">
                            <tr>
                                <td>
                                    Pr??par?? par / ???????? ???? <br />
                                    {{ $cemploye->nom . ' ' . $cemploye->tel }}
                                    &nbsp;
                                </td>
                                <td>
                                    Signature du conducteur / ?????????? ???????????? <br />
                                    {{ $client($contrat->client_id)->nom . ' ' . $client($contrat->client_id)->prenom }}
                                    &nbsp;
                                </td>
                            </tr>
                        </table><br /><br />.
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
