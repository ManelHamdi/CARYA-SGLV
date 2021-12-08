@extends('layouts.app', ['activePage' => 'Contrat', 'titlePage' => __('Contrats')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Nouveau contrat</h4>
                        </div>
                        <div class="card-body">
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
                            <form action="{{ route('contrats.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th> Matricule </th>
                                            <td colspan="3">
                                                <select id="matricule" name="vehicule_matricule" class="form-control">
                                                    <option>--- Select Matricule ---</option>
                                                    @foreach ($vehicules as $vehicule)
                                                        <option value="{{ $vehicule->matricule }}">
                                                            {{ $vehicule->matricule }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th> Client </th>
                                            <td colspan="3">
                                                <select id="matricule" name="client_id" class="form-control">
                                                    <option>--- Select Client ---</option>
                                                    @foreach ($clients as $client)
                                                        <option value="{{ $client->id }}">{{ $client->nom }}
                                                            {{ $client->prenom }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th> Date debut </th>
                                            <td>
                                                <input type="date" name="dateDebut" class="form-control" placeholder="">
                                            </td>
                                            <th> Date fin </th>
                                            <td>
                                                <input type="date" name="dateFin" class="form-control" placeholder="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th> Frais livraison </th>
                                            <td>
                                                <input type="number" name="fraisLivraison" class="form-control" step=any
                                                    placeholder="Frais livraison">
                                            </td>
                                            <th> Frais reprise </th>
                                            <td>
                                                <input type="number" name="fraisReprise" class="form-control" step=any
                                                    placeholder="Frais reprise">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th> Remise </th>
                                            <td>
                                                <input type="number" name="remise" class="form-control" step=any
                                                    placeholder="Remise">
                                            </td>
                                            <th> Montant </th>
                                            <td>
                                                <input type="number" name="montant" class="form-control" step=any
                                                    placeholder="Montant">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"></td>
                                            <td>
                                                <button type="submit" class="btn btn-success  btn-round">Submit</button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
