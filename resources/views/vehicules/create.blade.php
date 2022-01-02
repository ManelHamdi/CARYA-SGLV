@extends('layouts.app', ['activePage' => 'Véhicule', 'titlePage' => __('Véhicules')])

<style>
    input[type=radio] {
        display: none;
    }

    .label {
        border: 2px solid rgb(197, 189, 189);
        border-radius: 5%;
        font-weight: 100;
        color: white;
        font-size: 1rem;
        text-decoration: none;
        font-family: Arial;
        text-align: center;
        width: 30px;
        height: 30px;
        line-height: 50px;
        cursor: pointer;
        display: inline-block;
        -webkit-transition: background-color 150ms ease-in;
        -moz-transition: background-color 150ms ease-in;
        -ms-transition: background-color 150ms ease-in;
        -o-transition: background-color 150ms ease-in;
        transition: background-color 150ms ease-in;
    }

    .label:hover {
        background-color: rgba(250, 206, 14, 0.9);
        color: #fff;
    }

    input[type=radio]:checked+.label {
        border: 2px solid rgba(250, 206, 14, 0.9);
        text-decoration: none;
        border-radius: 5%;
        background: transparent url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAaCAYAAACgoey0AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAX9JREFUeNpi+P//PwMNsS4QbwBiLnQ5WlqqAsRP/0PARiBmoYfFkkB8+z8qWALEjLS0mB+IL/3HDibSymJQXB7/jx/UgNSCvU4lwAbEG4DYkwi1WUxUspQZiOcRaSkIWOAKMk0Sg3jaf+IBOIVjMyQWiH8DsR+RljaTYOkBWJ5GNwRk2R+ooh9A7ETA0jwSLL0ATfEYqRpkyVc0xR+A2AyHpdFA/I9IS0F5WhRbAWIEtQQbeAXE6lhC5jeRlj4GYgVsRaYK1HBCmmWgmuyxhAwu8BpaXjNgs/gYkYbcAGIXPCGDDkCOM8eVPkCEFhE+JhX8BGJnfAkTxgC57BOVLAXlihBC2RA9Vf+k0FJQKk8nJv+jCwQi5WNyQAWxpR02wRQS8icy6CKlmMUlUUGipfOQK3lKLAbhdhIKfWZS6258kiAfzCZg6V4gZiOn0UBIAcgn63BYehK50Ke2xQxQH+3FUoqJUtJMIlYhLxAfxVJu09xiWENuMxCrUaNhCBBgAOAVfjALa5TLAAAAAElFTkSuQmCC) no-repeat 88% center;
        background-size: 15px 15px;
    }

    input[type=radio]:checked:hover+.label {
        color: #fff;
        text-decoration: none;
        border-radius: 5%;
        background: transparent url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAS5JREFUeNq8110OgjAMAGBGvIY3VESjt9jPg95PT+LccBIZ7dYOWJPGB+g+Ymg3hLW2QeLkcu/y2pSFdvl0eQevehjI3uXbfkMh96TShFq/xhG6J4faAtxEtSBOQTm4QWpnOBWl4CZT69fuYpiCpnBDrB1xLhrjgoFO8F1oGcFslUv4bV32zFoxmOHJta0XMn65dC0UaiddA8UGiN4axeC1cUkdmWviEls/NwL1FqjPNtNvoimPdC3yRCUTiTXbt0R/oSnw2iiK10BBvBY6w2uiE3xJr8oFtcrvxy/fVcyeVdGx98yotcOxN/znHeMUIhdMOG8c4reagssF43VEoT5O4ZJwvNUUFJtcEE5BMXyGpnanf5yDxjiI+hSJj7YunEBvhbuTCh9tD+jiR4ABAJ0SrJgNr1UAAAAAAElFTkSuQmCC) no-repeat 88% center;
        background-size: 15px 15px;
    }

    .container {
        max-width: 500px;
    }

    dl,
    ol,
    ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .imgPreview img {
        padding: 8px;
        max-width: 100px;
    }

</style>
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Nouveau véhicule</h4>
                </div>
                <div class="card-body">
                    <div id="typography">
                        <!--<strong>Oups!</strong> Il y a eu des problèmes avec votre entrée.<br><br>-->
                        @if ($errors->any())
                            <div class="alert alert-warning">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('vehicules.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td colspan="1">
                                            <div class="custom-file">
                                                <label for="images"></label>
                                                <input class="btn btn-primary" type="file" name="imageFile[]" id="images"
                                                    multiple="multiple" accept="image/*" placeholder="select">
                                            </div>
                                        </td>
                                        <td colspan="3">
                                            <div class="user-image mb-3 text-center">
                                                <div class="imgPreview"> </div>
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Matricule</label><br />
                                                    <input type="number" width="30%" id="mat1" name="mat1"
                                                        class="form-control3" onkeypress="concatmat(); if(this.value.length==4) return false;"
                                                        onkeyup="concatmat()" placeholder="">
                                                    <input type="text" width="30%" name="mat2" class="form-control3"
                                                        value="تونس" disabled>
                                                    <input type="number" width="30%" name="matricule3"
                                                        class="form-control3" placeholder="" id="mat2"
                                                        onkeypress="concatmat(); if(this.value.length==4) return false;" onkeyup="concatmat()">
                                                    <input type="hidden" id="matricule" name=matricule>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Prix Location</label>
                                                    <input type="number" name="prixLoc" class="form-control"
                                                        value="{{ old('prixLoc') }}" placeholder="">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Marque</label>
                                                    <input type="text" name="marque" class="form-control" placeholder=""
                                                        value="{{ old('marque') }}">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Type</label>
                                                    <input type="text" name="type" class="form-control" placeholder=""
                                                        value="{{ old('type') }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Model</label>
                                                    <input type="text" name="model" class="form-control" placeholder=""
                                                        value="{{ old('model') }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Date achat</label>
                                                    <input type="date" name="dateAchat" class="form-control"
                                                        value="{{ old('dateAchat') }}" placeholder="">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Couleur</label><br />

                                                    <input type="radio" id="black" name="couleur" value="#000000">
                                                    <label style="background-color: #000000;" class="label"
                                                        for="black"></label>
                                                    <input type="radio" id="white" name="couleur" value="#FFFFFF">
                                                    <label style="background-color: #FFFFFF;" class="label"
                                                        for="white"></label>
                                                    <input type="radio" id="gris" name="couleur" value="#808080">
                                                    <label style="background-color: #808080;" class="label"
                                                        for="gris"></label>
                                                    <!--<input type="radio" id="silver" name="couleur">
                                                        <label style="background-color: #C0C0C0;" class="label"
                                                            for="silver"></label>-->
                                                    <input type="radio" id="red" name="couleur" value="#FF0000">
                                                    <label style="background-color: #FF0000;" class="label"
                                                        for="red"></label>
                                                    <input type="radio" id="bleu" name="couleur" value="#0000FF">
                                                    <label style="background-color: #0000FF;" class="label"
                                                        for="bleu"></label>
                                                    <input type="radio" id="marron" name="couleur" value="#964B00">
                                                    <label style="background-color: #964B00;" class="label"
                                                        for="marron"></label>
                                                    <input type="radio" id="green" name="couleur" value="#079607">
                                                    <label style="background-color: #079607;" class="label"
                                                        for="green"></label>
                                                    <input type="radio" id="beige" name="couleur" value="#d6bb99">
                                                    <label style="background-color: #d6bb99;" class="label"
                                                        for="beige"></label>
                                                    <input type="radio" id="orange" name="couleur" value="#FFA500">
                                                    <label style="background-color: #FFA500;" class="label"
                                                        for="orange"></label>
                                                    <input type="radio" id="gold" name="couleur" value="#FFD700">
                                                    <label style="background-color: #FFD700;" class="label"
                                                        for="gold"></label>
                                                    <input type="radio" id="violet" name="couleur" value="#FFD700">
                                                    <label style="background-color: #800080;" class="label"
                                                        for="violet"></label>

                                                    <!--<input type="color" name="couleur" class="form-control" list="couleur"
                                                            placeholder="" >
                                                        <datalist id="couleur">
                                                            <option value="#">
                                                            <option value="#">
                                                            <option value="#">
                                                            <option value="#">
                                                            <option value="#">
                                                            <option value="#">
                                                            <option value="#">
                                                            <option value="#">
                                                            <option value="#">
                                                            <option value="#">
                                                            <option value="#">
                                                            <option value="#">
                                                            <option value="#800080">
                                                        </datalist>-->
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Nombre place</label>
                                                    <input type="number" name="nbrPlaces" class="form-control"
                                                        value="{{ old('nbrPlaces') }}" placeholder="">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Climatisation</label>
                                                    <input type="checkbox" name="climatisation" value="1"
                                                        class="js-switch" checked>
                                                    <!--<input type="text" name="climatisation" class="form-control"
                                                                                                                                    placeholder="" value="1">-->
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Puissance</label>
                                                    <input type="text" name="puissance" class="form-control"
                                                        value="{{ old('puissance') }}" placeholder="">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Carburation</label>
                                                    <!--<input type="text" name="carburation" class="form-control"
                                                                                                                        value="{{ old('carburation') }}" placeholder="">-->
                                                    <select name="carburation" id="carburation" class="form-control">
                                                        <option value="Essence">Essence</option>
                                                        <option value="GPL">GPL</option>
                                                        <option value="Diesel">Diesel</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Kilometrage</label>
                                                    <input type="number" name="kilometrage" class="form-control"
                                                        value="{{ old('kilometrage') }}" placeholder="">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Boite vitesse</label>
                                                    <!--<input type="text" name="boiteVitesse" class="form-control"
                                                                                                                    value="{{ old('boiteVitesse') }}" placeholder="">-->
                                                    <select name="boiteVitesse" id="boiteVitesse" class="form-control">
                                                        <option value="manuel">manuel</option>
                                                        <option value="automatique">automatique</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Taille moteur</label>
                                                    <input type="text" name="tailleMoteur" class="form-control"
                                                        value="{{ old('tailleMoteur') }}" placeholder="">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Disponibilite</label>
                                                    <input type="checkbox" name="disponibilite" value="1"
                                                        class="js-switch" checked>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea name="description" class="form-control" rows="3"
                                                        placeholder="">{{ old('description') }}</textarea>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                <button type="submit" class="btn btn-secondary">Submit</button>
                                            </div>
                                        </td>
                                    </tr>
                                </table>




                            </div>

                        </form>

                        <!-- toggle btn -->
                        <script>
                            let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

                            elems.forEach(function(html) {
                                let switchery = new Switchery(html, {
                                    size: 'small',
                                    color: '#2E769B'
                                });
                            });
                        </script>

                        <!-- jQuery -->
                        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                        <script>
                            $(function() {
                                // Multiple images preview with JavaScript
                                var multiImgPreview = function(input, imgPreviewPlaceholder) {

                                    if (input.files) {
                                        var filesAmount = input.files.length;

                                        for (i = 0; i < filesAmount; i++) {
                                            var reader = new FileReader();

                                            reader.onload = function(event) {
                                                $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(
                                                    imgPreviewPlaceholder);
                                            }

                                            reader.readAsDataURL(input.files[i]);
                                        }
                                    }

                                };

                                $('#images').on('change', function() {
                                    multiImgPreview(this, 'div.imgPreview');
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function concatmat() {
            mat1 = document.getElementById("mat1").value;
            tun = '\u202B' + 'تونس' + '\u202C';
            mat2 = document.getElementById("mat2").value;
            m1 = '\u202A' + mat1 + '\u202C';
            m2 = '\u202A' + mat2 + '\u202C';
            document.getElementById("matricule").value = m2 + tun + m1;

        }
    </script>
@endsection
