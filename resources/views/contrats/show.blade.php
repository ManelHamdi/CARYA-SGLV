@extends('layouts.app', ['activePage' => 'Contrat', 'titlePage' => __('Contrats')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Details Contrat de vehivule :
                                {{ $vehicule->matricule }}
                                et client :
                                {{ $client->nom }} {{ $client->prenom }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th> Matricule </th>
                                        <td colspan="3">
                                            <a href="{{ route('vehicules.show', $vehicule->matricule) }}">
                                                {{ $vehicule->matricule }}
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> Client </th>
                                        <td colspan="3">
                                            {{ $client->nom }} {{ $client->prenom }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> Date debut </th>
                                        <td> {{ $contrat->dateDebut }} </td>
                                        <th> Date fin </th>
                                        <td> {{ $contrat->dateFin }} </td>
                                    </tr>
                                    <tr>
                                        <th> Nombre jour </th>
                                        <td colspan="3"> {{ $contrat->nbrJour }} </td>
                                    </tr>
                                    <tr>
                                        <th> Remise </th>
                                        <td class="text-primary"> {{ $contrat->remise }} </td>
                                        <th> Montant </th>
                                        <td class="text-primary"> {{ $contrat->montant }} </td>
                                    </tr>
                                    <tr>
                                        <th> Frais livraison </th>
                                        <td class="text-primary"> {{ $contrat->fraisLivraison }} </td>
                                        <th> Frais reprise </th>
                                        <td class="text-primary"> {{ $contrat->fraisReprise }} </td>
                                    </tr>
                                    <tr>
                                        <th> Actions </th>
                                        <td colspan="3">
                                            <form action="{{ route('contrats.destroy', $contrat->id) }}" method="POST">
                                                <a class="btn btn-success"
                                                    href="{{ route('contrats.edita', [$contrat->id, $vehicule->matricule, $client->id]) }}">
                                                    <i class="material-icons">edit</i>Modifier
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger show_confirm">
                                                    <i class="material-icons">delete</i>Supprimer
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
    </div>

    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
        <script type="text/javascript">
            $('.show_confirm').click(function(event) {
                var form = $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                swal({
                        title: `Êtes-vous sûr de vouloir supprimer cette contrat?`,
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
