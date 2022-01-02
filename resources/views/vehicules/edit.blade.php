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
                    <h4 class="card-title">Modifier véhicule de matricule: {{ $vehicule->matricule }}</h4>
                </div>

                <div class="card-body">
                    <div id="typography">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('vehicules.update', $vehicule->matricule) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <table class="table">
                                <tr>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <td width="30%">
                                                <div class="custom-file">
                                                    <label for="images"></label>
                                                    <input class="btn btn-primary" type="file" name="imageFile[]"
                                                        id="images" multiple="multiple" accept="image/*"
                                                        placeholder="select">
                                                </div>

                                            </td>
                                            <td colspan="3">
                                                <div class="user-image mb-3 text-center">

                                                    <div class="imgPreview">
                                                        @if (count($vehicule->photos) > 0)
                                                            @foreach ($vehicule->photos as $photo)
                                                                <img src="{{ 'data:image/*;base64,' . base64_encode($photo->image) }}"
                                                                    style="height:60px; width:100px" />
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                        </div>
                                    </div>

                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label>Matricule</label><br />
                                                <input type="text" class="form-control"
                                                    placeholder="" value="{{ $vehicule->matricule }}" disabled>
                                                <input type="hidden" name="matricule" class="form-control"
                                                    placeholder="" value="{{ $vehicule->matricule }}">
                                            </div>
                                        </div>
                                    </td>
                                    <td colspan="2">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Prix Location:</strong>
                                                <input type="text" name="prixLoc" value="{{ $vehicule->prixLoc }}"
                                                    class="form-control" placeholder="Prix Location">
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Marque:</strong>
                                                <input type="text" name="marque" value="{{ $vehicule->marque }}"
                                                    class="form-control" placeholder="Marque">
                                            </div>
                                        </div>
                                    </td>
                                    <td colspan="2">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Type</strong>
                                                <input type="text" name="type" value="{{ $vehicule->type }}"
                                                    class="form-control" placeholder="Type">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Model</strong>
                                                <input type="text" name="model" value="{{ $vehicule->model }}"
                                                    class="form-control" placeholder="Model">
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Couleur</strong><br/>
                                                <input type="radio" id="black" name="couleur" value="#000000"
                                                {{ $vehicule->couleur == '#000000' ? 'checked' : '' }}>
                                                    <label style="background-color: #000000;" class="label"
                                                        for="black"></label>
                                                    <input type="radio" id="white" name="couleur" value="#FFFFFF"
                                                    {{ $vehicule->couleur == '#FFFFFF' ? 'checked' : '' }}>
                                                    <label style="background-color: #FFFFFF;" class="label"
                                                        for="white"></label>
                                                    <input type="radio" id="gris" name="couleur" value="#808080"
                                                    {{ $vehicule->couleur == '#808080' ? 'checked' : '' }}>
                                                    <label style="background-color: #808080;" class="label"
                                                        for="gris"></label>
                                                    <!--<input type="radio" id="silver" name="couleur">
                                                        <label style="background-color: #C0C0C0;" class="label"
                                                            for="silver"></label>-->
                                                    <input type="radio" id="red" name="couleur" value="#FF0000"
                                                    {{ $vehicule->couleur == '#FF0000' ? 'checked' : '' }}>
                                                    <label style="background-color: #FF0000;" class="label"
                                                        for="red"></label>
                                                    <input type="radio" id="bleu" name="couleur" value="#0000FF"
                                                    {{ $vehicule->couleur == '#0000FF' ? 'checked' : '' }}>
                                                    <label style="background-color: #0000FF;" class="label"
                                                        for="bleu"></label>
                                                    <input type="radio" id="marron" name="couleur" value="#964B00"
                                                    {{ $vehicule->couleur == '#964B00' ? 'checked' : '' }}>
                                                    <label style="background-color: #964B00;" class="label"
                                                        for="marron"></label>
                                                    <input type="radio" id="green" name="couleur" value="#079607"
                                                    {{ $vehicule->couleur == '#079607' ? 'checked' : '' }}>
                                                    <label style="background-color: #079607;" class="label"
                                                        for="green"></label>
                                                    <input type="radio" id="beige" name="couleur" value="#d6bb99"
                                                    {{ $vehicule->couleur == '#d6bb99' ? 'checked' : '' }}>
                                                    <label style="background-color: #d6bb99;" class="label"
                                                        for="beige"></label>
                                                    <input type="radio" id="orange" name="couleur" value="#FFA500"
                                                    {{ $vehicule->couleur == '#FFA500' ? 'checked' : '' }}>
                                                    <label style="background-color: #FFA500;" class="label"
                                                        for="orange"></label>
                                                    <input type="radio" id="gold" name="couleur" value="#FFD700"
                                                    {{ $vehicule->couleur == '#FFD700' ? 'checked' : '' }}>
                                                    <label style="background-color: #FFD700;" class="label"
                                                        for="gold"></label>
                                                    <input type="radio" id="violet" name="couleur" value="#FFD700"
                                                    {{ $vehicule->couleur == '#800080' ? 'checked' : '' }}>
                                                    <label style="background-color: #800080;" class="label"
                                                        for="violet"></label>
                                            </div>
                                        </div>
                                    </td>
                                    <td colspan="2">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Nombre place</strong>
                                                <input type="number" name="nbrPlaces" value="{{ $vehicule->nbrPlaces }}"
                                                    class="form-control" placeholder="Nombre place">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Date achat</strong>
                                                <input type="date" name="dateAchat" value="{{ $vehicule->dateAchat }}"
                                                    class="form-control" placeholder="Date achat">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Carburation</strong>
                                                <!--<input type="text" name="carburation"
                                                        value="{{ $vehicule->carburation }}" class="form-control"
                                                        placeholder="Carburation">-->
                                                <select name="carburation" id="carburation" class="form-control">
                                                    <option value="Essence"
                                                        {{ $vehicule->carburation == 'Essence' ? 'selected' : '' }}>
                                                        Essence</option>
                                                    <option value="GPL"
                                                        {{ $vehicule->carburation == 'GPL' ? 'selected' : '' }}>GPL
                                                    </option>
                                                    <option value="Diesel"
                                                        {{ $vehicule->carburation == 'Diesel' ? 'selected' : '' }}>
                                                        Diesel</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                    <td colspan="2">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Kilometrage</strong>
                                                <input type="number" name="kilometrage"
                                                    value="{{ $vehicule->kilometrage }}" class="form-control"
                                                    placeholder="Kilometrage">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Puissance</strong>
                                                <input type="text" name="puissance" value="{{ $vehicule->puissance }}"
                                                    class="form-control" placeholder="Puissance">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Climatisation</strong>
                                                <input type="checkbox" name="climatisation"
                                                    data-id="{{ $vehicule->matricule }}" value="1" class="js-switch"
                                                    id="climaup" {{ $vehicule->climatisation == 1 ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                    </td>
                                    <td colspan="2">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Boite vitesse</strong>
                                                <!--<input type="text" name="boiteVitesse"
                                                        value="{{ $vehicule->boiteVitesse }}" class="form-control"
                                                        placeholder="Boite vitesse">-->
                                                <select name="boiteVitesse" id="boiteVitesse" class="form-control">
                                                    <option value="manuel"
                                                        {{ $vehicule->boiteVitesse == 'manuel' ? 'selected' : '' }}>
                                                        manuel</option>
                                                    <option value="automatique"
                                                        {{ $vehicule->boiteVitesse == 'automatique' ? 'selected' : '' }}>
                                                        automatique</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Taille Moteur</strong>
                                                <input type="text" name="tailleMoteur"
                                                    value="{{ $vehicule->tailleMoteur }}" class="form-control"
                                                    placeholder="Taille Moteur">
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Description</strong>
                                                <textarea name="description" class="form-control" rows="3"
                                                    placeholder="">{{ $vehicule->description }}</textarea>
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
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                $('#dispoup').change(function() {
                                    let status = $(this).prop('checked') === true ? 1 : 0;
                                    let mat = $(this).data('id');

                                    $.ajax({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        type: "GET",
                                        dataType: "json",
                                        url: '{{ route('vehicules.update.disponibilite') }}',
                                        data: {
                                            'disponibilite': status,
                                            'vehicule_matricule': mat
                                        },
                                        success: function(data) {
                                            console.log(data.message);
                                        }
                                    });
                                });
                                $('#climaup').change(function() {
                                    let status = $(this).prop('checked') === true ? 1 : 0;
                                    let mat = $(this).data('id');

                                    $.ajax({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        type: "GET",
                                        dataType: "json",
                                        url: '{{ route('vehicules.update.climatisation') }}',
                                        data: {
                                            'climatisation': status,
                                            'vehicule_matricule': mat
                                        },
                                        success: function(data) {
                                            console.log(data.message);
                                        }
                                    });
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
