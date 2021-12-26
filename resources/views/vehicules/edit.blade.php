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
                                                <strong>Matricule:</strong>
                                                <input type="text" name="matricule" value="{{ $vehicule->matricule }}"
                                                    class="form-control" placeholder="Matricule">
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
                                                <strong>Couleur</strong>
                                                <input type="text" name="couleur" value="{{ $vehicule->couleur }}"
                                                    class="form-control" placeholder="Couleur">
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
                                                <input type="text" name="carburation"
                                                    value="{{ $vehicule->carburation }}" class="form-control"
                                                    placeholder="Carburation">
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
                                                <input type="text" name="boiteVitesse"
                                                    value="{{ $vehicule->boiteVitesse }}" class="form-control"
                                                    placeholder="Boite vitesse">
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
@endsection
