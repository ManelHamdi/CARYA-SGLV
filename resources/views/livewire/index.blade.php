@extends('layouts.app', ['activePage' => 'Contrats', 'titlePage' => __('Contrats')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div class="pull-left">
                                <h4 class="card-title">Liste des contrats</h4>
                                <form action="{{ route('search') }}" method="GET">
                                    <input style="border-radius: 5px; width: 180%; border-color: transparent; background-color: #ffffffe3" type="text" id="search" name="search"
                                        placeholder="Rechercher par matricule" value="{{ $search }}">
                                    <button style="display:none" type="submit" class="btn btn-default mb-2">search</button>
                                </form>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-secondary" href="{{ route('contrats.create') }}"> Nouveau contrat</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>
                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                        <th> Matricule </th>
                                        <th> Client </th>
                                        <th> Nombre de jours </th>
                                        <th> Montant </th>
                                        <th> Actions </th>
                                    </thead>
                                    <tbody>
                                        @foreach ($contrats as $contrat)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('vehicules.show', $contrat->vehicule_matricule) }}">
                                                        {{ $contrat->vehicule_matricule }}
                                                    </a>

                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>
                                                            CIN: {{ $client($contrat->client_id)->cin }}
                                                        </li>
                                                        <li>
                                                            Nom complet: {{ $client($contrat->client_id)->nom }}
                                                            {{ $client($contrat->client_id)->prenom }}
                                                        </li>
                                                    </ul>

                                                </td>
                                                <td>
                                                    {{ $contrat->nbrJour }}
                                                </td>
                                                <td>
                                                    @if (!empty($montant($contrat->id)))
                                                        {{ $montant($contrat->id)->montantRecu }}
                                                    @endif

                                                </td>
                                                <td>
                                                    <form action="{{ route('contrats.destroy', $contrat) }}"
                                                        method="POST">
                                                        <a class="btn btn-info btn-fab btn-fab-mini btn-round"
                                                            href="{{ route('contrats.show', $contrat) }}">
                                                            <i class="material-icons">description</i>
                                                        </a>

                                                        <a class="btn btn-default btn-fab btn-fab-mini btn-round"
                                                            href="{{ route('contrats.print', $contrat) }}"
                                                            target="_blank">
                                                            <i class="material-icons">print</i>
                                                        </a>

                                                        <a class="btn btn-warning btn-fab btn-fab-mini btn-round"
                                                            href="{{ route('contrats.printpdf', $contrat) }}"
                                                            target="_blank">
                                                            <i class="material-icons">picture_as_pdf</i>
                                                        </a>

                                                        <a class="btn btn-success btn-fab btn-fab-mini btn-round"
                                                            href="{{ route('contrats.edit', $contrat) }}">
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
                                    </tbody>
                                </table>
                                {{ $contrats->render('pagination::bootstrap-4') }}
                                <!-- simple-bootstrap-4 -->
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
                new swal({
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
