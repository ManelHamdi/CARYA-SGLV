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

</style>

<table id="table">


    <tr>

        <td>
            <p id="bp"> Adresse: {{ $entreprise->adresse }} &nbsp; </p>
            <p id="bp"> {{ $entreprise->ville }} &nbsp; </p>

        </td>
        <td colspan="2" style="text-align:center;">
            <img src="{{ 'data:image/*;base64,' . base64_encode($entreprise->logo) }}"
                style="width:190px; max-height: 100px" />
        </td>
        <td>
            <p id="bp"> R.I.B. </p>
            <p id="bp"> {{ $entreprise->rib }} &nbsp; </p>
        </td>

    </tr>
    <tr>

        <td>
            <p id="bp"> M.F. {{ $entreprise->matfisc }} &nbsp; </p>
            <p id="bp"> Email : {{ $entreprise->email }} &nbsp; </p>
        </td>
        <td colspan="2" style="text-align:center;">
            <h3> {{ $contrat->id }} &nbsp; </h3>
        </td>
        <td>
            <p id="bp"> Telephone 1: {{ $entreprise->telephone }} &nbsp; </p>
            <p id="bp"> Telephone 2: {{ $entreprise->telephone2 }} &nbsp; </p>
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
                            Vehicule
                            <span style="float:right;">
                                السيارة
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>

                    <td colspan="2" style="border-right: 0px;">
                        <p style="text-align:left;margin-bottom: 0px">
                            Model
                            <span id="fright">
                                طراز السيارة
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
                                الرقم المنجمي
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
                            Départ
                            <span id="fright">
                                الخروج
                            </span>
                        </p>
                        <p id="mp">
                            Date et heure / التاريخ و الساعة <br />
                            {{ $contrat->dateDebut }} &nbsp;
                        </p>
                        <p style="text-align:left;margin-bottom: 0px">
                            Livraison
                            <span id="fright">
                                التسليم
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
                                العودة
                            </span>
                        </p>
                        <p id="mp">
                            Date et heure / التاريخ و الساعة <br />
                            {{ $contrat->dateFin }} &nbsp;
                        </p>
                        <p style="text-align:left;margin-bottom: 0px">
                            Reprise
                            <span id="fright">
                                استرجاع
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
                                العودة
                            </span>
                        </p>
                        <p id="mp">
                            Date et heure / التاريخ و الساعة <br />
                            {{ $contrat->dateFin }} &nbsp;
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
                        <strong for="cartGrise"> Carte grise / البطاقة الرمادية </strong><br />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" id="attestAssurance" name="attestAssurance" onclick="return false;"
                            {{ $checkOut($contrat->id)->attestAssurance == 1 ? 'checked' : '' }}>
                        <strong for="attestAssurance"> Attestation d'assurance / شهادة التأمين </strong>
                    </td>
                    <td rowspan="8" valign="top">
                        <img src={{ 'data:image/*;base64,' . base64_encode(file_get_contents(public_path() . '/images/gazgauge.jpg')) }}
                            style="height:50px; width: 150px;" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" id="carteExploitation" name="carteExploitation" onclick="return false;"
                            {{ $checkOut($contrat->id)->carteExploitation == 1 ? 'checked' : '' }}>
                        <strong for="carteExploitation"> Carte d'exploitation / بطاقة الإستغلال </strong><br />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" id="vignatte" name="vignatte" onclick="return false;"
                            {{ $checkOut($contrat->id)->vignatte == 1 ? 'checked' : '' }}>
                        <strong for="vignatte"> Vignette / معلوم الجولان </strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" id="visiteTechnique" name="visiteTechnique" onclick="return false;"
                            {{ $checkOut($contrat->id)->visiteTechnique == 1 ? 'checked' : '' }}>
                        <strong for="visiteTechnique"> Visite technique / شهادة الفحص الفني </strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" id="roueSecours" name="roueSecours" onclick="return false;"
                            {{ $checkOut($contrat->id)->roueSecours == 1 ? 'checked' : '' }}>
                        <strong for="roueSecours"> Roue de secours / العجلة الاحتياطية </strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" id="cric" name="cric" onclick="return false;"
                            {{ $checkOut($contrat->id)->cric == 1 ? 'checked' : '' }}>
                        <strong for="cric"> Cric / رافعة </strong>
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
                            الشروط المنصوص عليها في الصفحة الأولى والثانية واتعهد بتحمل قيمة
                            القسط المحمول على كاهلي و هو 5%
                            من قيمة السيارة والتزم بذلك.
                        </p>
                    </td>
                    <td valign="top" width="70%">
                        <p style="text-align:left;margin-bottom: 0px">
                            <strong> TRES IMPORTANT </strong>
                            <span id="fright">
                                <strong> هام جدا </strong>
                            </span>
                        </p>
                        L'assurance ne couvre pas les accesoires,
                        bris de glace ainsi que le vol et les dégâts
                        occasionnés aux pneumatiques qui son exclusivement
                        à la charge du locataire.
                        <p style="text-align: right; margin-top: 0px;margin-bottom: 0px">

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
                        </table><br /><br />.
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
