@extends('layouts.app', ['activePage' => 'Véhicule', 'titlePage' => __('Véhicules')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Details Véhicule de matricule: {{ $vehicule->matricule }}</h4>
                </div>

                <div class="card-body">
                    <div id="typography">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th width="15%">Images</th>
                                    <td colspan="5">
                                        @foreach ($vehicule->photos as $photo)
                                            <img src="{{ 'data:image/*;base64,' . base64_encode($photo->image) }}"
                                                style="height:60px; width:100px" />
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th cellspacing="0">Matricule</th>
                                    <td>{{ $vehicule->matricule }}</td>

                                    <th cellspacing="0">Prix Location</th>
                                    <td>{{ $vehicule->prixLoc }}</td>

                                    <th cellspacing="0">Disponibilite</th>
                                    <td>
                                        <input type="checkbox" name="disponibilite" data-id="{{ $vehicule->matricule }}"
                                            value="1" class="js-switch" id="dispoup"
                                            {{ $vehicule->disponibilite == 1 ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th cellspacing="0">Marque</th>
                                    <td>{{ $vehicule->marque }}</td>

                                    <th cellspacing="0">Type</th>
                                    <td>{{ $vehicule->type }}</td>

                                    <th cellspacing="0">Model</th>
                                    <td>{{ $vehicule->model }}</td>
                                </tr>
                                <tr>
                                    <th cellspacing="0">Couleur</th>
                                    <td>{{ $vehicule->couleur }}</td>

                                    <th cellspacing="0">Nombre places</th>
                                    <td>{{ $vehicule->nbrPlaces }}</td>

                                    <th cellspacing="0">Date Achat</th>
                                    <td>{{ $vehicule->dateAchat }}</td>
                                </tr>
                                <tr>
                                    <th cellspacing="0">Description</th>
                                    <td colspan="3">{{ $vehicule->description }}</td>

                                    <th cellspacing="0">Climatisation</th>
                                    <td>{{ $vehicule->climatisation == 1 ? 'climatisé' : 'non climatisé' }}</td>

                                </tr>
                                <tr>
                                    <th cellspacing="0">Carburation</th>
                                    <td>{{ $vehicule->carburation }}</td>

                                    <th cellspacing="0">Kilometrage</th>
                                    <td>{{ $vehicule->kilometrage }}</td>

                                    <th cellspacing="0">Puissance</th>
                                    <td>{{ $vehicule->puissance }}</td>
                                </tr>
                                <tr>
                                    <th cellspacing="0">Boite Vitesse</th>
                                    <td colspan="2">{{ $vehicule->boiteVitesse }}</td>
                                    <th cellspacing="0">Taille Moteur</th>
                                    <td colspan="2">{{ $vehicule->tailleMoteur }}</td>
                                </tr>
                                <tr>
                                    <th cellspacing="0" width="280px">Action</th>
                                    <td colspan="5">
                                        <form action="{{ route('vehicules.destroy', $vehicule->matricule) }}"
                                            method="POST">

                                            <a class="btn btn-secondary"
                                                href="{{ route('vehicules.edit', $vehicule->matricule) }}">
                                                <i class="material-icons">edit</i> Edit
                                            </a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger show_confirm">
                                                <i class="material-icons">delete</i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>


                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



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

    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
        <script type="text/javascript">
            $('.show_confirm').click(function(event) {
                var form = $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                new swal({
                        title: `Êtes-vous sûr de vouloir supprimer cette véhicule?`,
                        text: "Si vous le supprimez, il disparaîtra pour toujours.",
                        icon: "error",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                        }
                    });
            });
        </script>
    @endpush
@endsection
