@extends('layouts.app', ['activePage' => 'Véhicule', 'titlePage' => __('Véhicules')])

<style>
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
                                                    <label>Matricule</label>
                                                    <input type="text" name="matricule" class="form-control"
                                                        placeholder="">
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
                                                    <label>Couleur</label>
                                                    <input type="color" name="couleur" class="form-control" list="couleur"
                                                        placeholder="" value="{{ old('couleur') }}">
                                                    <datalist id="couleur">
                                                        <option value="#FFFFFF">
                                                        <option value="#000000">
                                                        <option value="#808080">
                                                        <option value="#C0C0C0">
                                                        <option value="#FF0000">
                                                        <option value="#0000FF">
                                                        <option value="#964B00">
                                                        <option value="#07BB07">
                                                        <option value="#F5F5DC">
                                                        <option value="#FFA500">
                                                        <option value="#FFD700">
                                                        <option value="#FFFF00">
                                                        <option value="#800080">
                                                    </datalist>
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
                                                        <option value="essence">essence</option>
                                                        <option value="GPL">GPL</option>
                                                        <option value="diesel">diesel</option>
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
@endsection
