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

                            <div class="row">
                                <table class="table">
                                    <tr>
                                        <td colspan="1">
                                            <div class="custom-file">
                                                <label  for="images"></label>
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
                                    <tr><td></td></tr>
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
                                                        placeholder="" value="25">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Marque</label>
                                                    <input type="text" name="marque" class="form-control"
                                                        placeholder="" value="mds">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Type</label>
                                                    <input type="text" name="type" class="form-control"
                                                        placeholder="" value="sds">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Model</label>
                                                    <input type="text" name="model" class="form-control"
                                                        placeholder="" value="sd">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Date achat</label>
                                                    <input type="date" name="dateAchat" class="form-control"
                                                        placeholder="">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Couleur</label>
                                                    <input type="text" name="couleur" class="form-control"
                                                        placeholder="" value="df">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Nombre place</label>
                                                    <input type="number" name="nbrPlaces" class="form-control"
                                                        placeholder="" value="4">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Climatisation</label>
                                                    <input type="checkbox" name="climatisation" value="1" class="js-switch" checked>
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
                                                        placeholder="" value="fppp">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Carburation</label>
                                                    <input type="text" name="carburation" class="form-control"
                                                        placeholder="" value="sdfh">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Kilometrage</label>
                                                    <input type="text" name="kilometrage" class="form-control"
                                                        placeholder="" value="df">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Boite vitesse</label>
                                                    <input type="text" name="boiteVitesse" class="form-control"
                                                        placeholder="" value="rfff">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Taille moteur</label>
                                                    <input type="text" name="tailleMoteur" class="form-control"
                                                        placeholder="" value="rth">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <!--<strong>Disponibilite</strong>-->
                                                    <label>Disponibilite</label>
                                                    <input type="checkbox" name="disponibilite" value="1" class="js-switch" checked>
                                                    <!--<input type="text" name="disponibilite" class="form-control"
                                                        placeholder="" value="0">-->
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <input type="textarea" name="description" class="form-control"
                                                        placeholder="" value="drg">
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

                        <!-- toggle btn -->
                        <script>let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

                            elems.forEach(function(html) {
                                let switchery = new Switchery(html,  { size: 'small' });
                            });</script>

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
