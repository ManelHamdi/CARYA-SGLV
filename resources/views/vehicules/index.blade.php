@extends('layouts.app', ['activePage' => 'Véhicule', 'titlePage' => __('Véhicules')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header card-header-primary">
                    <div class="pull-left">
                        <h4 class="card-title">Gerer véhicules</h4>
                        <p class="card-category">Cree, modifier, supprimer, détailler</p>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('vehicules.create') }}"> Nouveau vehicule</a>
                    </div>
                </div>
                <div class="card-body">
                    <div id="typography">
                        <div class="card-title">

                        </div>

                        <table class="table">
                            <thead class=" text-primary">
                                <th>Images</th>
                                <th>Matricule</th>
                                <th>Prix Location</th>
                                <th>Disponibilite</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                            @foreach ($vehicules as $vehicule)
                                <tr>
                                    <td>
                                        <img src="{{ 'data:image/*;base64,' . base64_encode($vehicule->photos[0]->image) }}"
                                            style="height:60px; width:100px" />
                                    </td>
                                    <td>{{ $vehicule->matricule }}</td>
                                    <td>{{ $vehicule->prixLoc }}</td>
                                    <td>{{ $vehicule->disponibilite == 1 ? 'disponible' : 'pas disponible' }}</td>
                                    <td>
                                        <form action="{{ route('vehicules.destroy', $vehicule->matricule) }}"
                                            method="POST">

                                            <a class="btn btn-info btn-fab btn-fab-mini btn-round"
                                                href="{{ route('vehicules.show', $vehicule->matricule) }}">
                                                <i class="material-icons">description</i>
                                            </a>

                                            <a class="btn btn-success btn-fab btn-fab-mini btn-round"
                                                href="{{ route('vehicules.edit', $vehicule->matricule) }}">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-fab btn-fab-mini btn-round">
                                                <i class="material-icons">delete</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $vehicules->render("pagination::bootstrap-4") }}

                    </div>
                </div>
            </div>
        </div>
    </div>

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
