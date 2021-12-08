@extends('layouts.app', ['activePage' => 'Contrat', 'titlePage' => __('Contrats')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div class="pull-left">
                                <h4 class="card-title ">Gerer Contrats</h4>
                                <p class="card-category"> Cree, modifier, supprimer, détailler </p>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-success" href="{{ route('contrats.create') }}"> Nouveau contrat</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <th> Matricule </th>
                                        <th> Client </th>
                                        <th> Nombre jour </th>
                                        <th> Montant </th>
                                        <th> Actions </th>
                                    </thead>
                                    <tbody>
                                        @foreach ($vehicules as $vehicule)
                                            @foreach ($vehicule->clients as $client)
                                                <tr>
                                                    <td>
                                                        <a href="{{ route('vehicules.show', $vehicule->matricule) }}">
                                                            {{ $vehicule->matricule }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        {{ $client->nom }} {{ $client->prenom }}
                                                    </td>
                                                    <td> {{ $client->contrat->nbrJour }} </td>
                                                    <td class="text-primary"> {{ $client->contrat->montant }} </td>
                                                    <td>
                                                        <form
                                                            action="{{ route('contrats.destroy', $client->contrat->id) }}"
                                                            method="POST">

                                                            <a class="btn btn-info btn-fab btn-fab-mini btn-round"
                                                                href="{{ route('contrats.showa', [$client->contrat->id, $vehicule->matricule, $client->id]) }}">
                                                                <i class="material-icons">description</i>
                                                            </a>

                                                            <a class="btn btn-success btn-fab btn-fab-mini btn-round"
                                                                href="{{ route('contrats.edita', [$client->contrat->id, $vehicule->matricule, $client->id]) }}">
                                                                <i class="material-icons">edit</i>
                                                            </a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger btn-fab btn-fab-mini btn-round show_confirm">
                                                                <i class="material-icons">delete</i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $cvehicules->render('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>


                <!--<div class="col-md-12">
                        <div class="card card-plain">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title mt-0"> Gerer Contrats </h4>
                                <p class="card-category"> Cree, modifier, supprimer, détailler </p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="">
                                            <th> ID </th>
                                            <th> Name </th>
                                            <th> Country </th>
                                            <th> City </th>
                                            <th> Salary </th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> 1 </td>
                                                <td> Dakota Rice </td>
                                                <td> Niger </td>
                                                <td> Oud-Turnhout </td>
                                                <td> $36,738 </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>-->

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
