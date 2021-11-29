@extends('vehicules.layout')
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
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Vehicule</h2> <br>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('vehicules.index') }}"> Back</a>
            </div>
        </div>
    </div>

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

    <form action="{{ route('vehicules.update', $vehicule->matricule) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">

            <table class="table">
                <tr>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <td>
                                <div class="custom-file">
                                    <input type="file" name="imageFile[]" class="custom-file-input" id="images"
                                        multiple="multiple">

                                </div>

                            </td>
                            <td colspan="2">
                                <div class="user-image mb-3 text-center">

                                    <div class="imgPreview">
                                        @if (count($vehicule->photos) > 0)
                                            <p>Images:</p>

                                            @foreach ($vehicule->photos as $photo)
                                                <img src="{{ asset('/uploads/' . $photo->image) }}"
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
                    <td>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Matricule:</strong>
                                <input type="text" name="matricule" value="{{ $vehicule->matricule }}"
                                    class="form-control" placeholder="Matricule">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label>Prix Location:</label>
                                <input type="text" name="prixLoc" value="{{ $vehicule->prixLoc }}" class="form-control"
                                    placeholder="Prix Location">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Marque:</strong>
                                <input type="text" name="marque" value="{{ $vehicule->marque }}" class="form-control"
                                    placeholder="Marque">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Type</strong>
                                <input type="text" name="type" value="{{ $vehicule->type }}" class="form-control"
                                    placeholder="Type">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Model</strong>
                                <input type="text" name="model" value="{{ $vehicule->model }}" class="form-control"
                                    placeholder="Model">
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
                                <strong>Couleur</strong>
                                <input type="text" name="couleur" value="{{ $vehicule->couleur }}" class="form-control"
                                    placeholder="Couleur">
                            </div>
                        </div>
                    </td>
                    <td>
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
                                <strong>Climatisation</strong>
                                <input type="text" name="climatisation" value="{{ $vehicule->climatisation }}"
                                    class="form-control" placeholder="Climatisation">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Puissance</strong>
                                <input type="text" name="puissance" value="{{ $vehicule->puissance }}"
                                    class="form-control" placeholder="Puissance">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Carburation</strong>
                                <input type="text" name="Carburation" value="{{ $vehicule->carburation }}"
                                    class="form-control" placeholder="Carburation">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Kilometrage</strong>
                                <input type="text" name="kilometrage" value="{{ $vehicule->kilometrage }}"
                                    class="form-control" placeholder="Kilometrage">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Boite vitesse</strong>
                                <input type="text" name="boiteVitesse" value="{{ $vehicule->boiteVitesse }}"
                                    class="form-control" placeholder="Boite vitesse">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Taille Moteur</strong>
                                <input type="text" name="tailleMoteur" value="{{ $vehicule->tailleMoteur }}"
                                    class="form-control" placeholder="Taille Moteur">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Disponibilite</strong>
                                <input type="text" name="disponibilite" value="{{ $vehicule->disponibilite }}"
                                    class="form-control" placeholder="Disponibilite">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Description</strong>
                                <input type="text" name="description" value="{{ $vehicule->description }}"
                                    class="form-control" placeholder="Description">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </td>
                </tr>
            </table>

        </div>

    </form>

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

@endsection
