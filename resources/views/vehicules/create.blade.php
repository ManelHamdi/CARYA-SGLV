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
                <h4>Add New Vehicule</h4><br>
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

    <form action="{{ route('vehicules.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="container mt-5">
            @csrf
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="user-image mb-3 text-center">
                <div class="imgPreview"> </div>
            </div>

            <div class="custom-file">
                <input type="file" name="imageFile[]" class="custom-file-input" id="images" multiple="multiple">
                <label class="custom-file-label" for="images">Choose image</label>
            </div>

        </div>
        <div class="row">
            <table class="table">
                <tr>
                    <td>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label>Matricule</label>
                                <input type="text" name="matricule" class="form-control" placeholder="Matricule">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label>Prix Location</label>
                                <input type="number" name="prixLoc" class="form-control" placeholder="Prix Location">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label>Marque</label>
                                <input type="text" name="marque" class="form-control" placeholder="Marque">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label>Type</label>
                                <input type="text" name="type" class="form-control" placeholder="Type">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label>Model</label>
                                <input type="text" name="model" class="form-control" placeholder="Model">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label>Date achat</label>
                                <input type="date" name="dateAchat" class="form-control" placeholder="Type">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label>Couleur</label>
                                <input type="text" name="couleur" class="form-control" placeholder="Couleur">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label>Nombre place</label>
                                <input type="number" name="nbrPlaces" class="form-control" placeholder="Nombre place">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label>Climatisation</label>
                                <input type="text" name="climatisation" class="form-control" placeholder="Climatisation">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label>Puissance</label>
                                <input type="text" name="puissance" class="form-control" placeholder="Puissance">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label>Carburation</label>
                                <input type="text" name="carburation" class="form-control" placeholder="Carburation">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label>Kilometrage</label>
                                <input type="text" name="kilometrage" class="form-control" placeholder="Kilometrage">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label>Boite vitesse</label>
                                <input type="text" name="boiteVitesse" class="form-control" placeholder="Boite Vitesse">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label>Taille moteur</label>
                                <input type="text" name="tailleMoteur" class="form-control" placeholder="Taille Moteur">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <!--<strong>Disponibilite</strong>-->
                                <label>Disponibilite</label>
                                <input type="text" name="disponibilite" class="form-control" placeholder="Disponibilite">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label>Description</label>
                                <input type="textarea" name="description" class="form-control" placeholder="Description">
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
