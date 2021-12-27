@extends('layouts.app', ['activePage' => 'Clients', 'titlePage' => __('Clients')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Liste des Clients') }}</h4>
                <!--<p class="card-category">{{ __('Liste clients') }}</p>-->
              </div>
              <div class="card-body ">
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
                            <th> Nom </th>
                            <th> Prenom </th>
                            <th> CIN </th>
                            <th> Telephone </th>
                            <th> Actions </th>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <td>
                                        {{ $client->nom }}
                                    </td>
                                    <td>
                                        {{ $client->prenom }}
                                    </td>
                                    <td>
                                        {{ $client->cin }}
                                    </td>
                                    <td>
                                        {{ $client->tel }}
                                    </td>
                                    <td>
                                        <form action="{{ route('clients.destroy', $client) }}"
                                            method="POST">
                                            <a class="btn btn-info btn-fab btn-fab-mini btn-round"
                                                href="{{ route('clients.show', $client) }}">
                                                <i class="material-icons">description</i>
                                            </a>

                                            <a class="btn btn-success btn-fab btn-fab-mini btn-round"
                                                href="{{ route('clients.edit', $client) }}">
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
                    {{ $clients->render('pagination::bootstrap-4') }}
                    <!-- simple-bootstrap-4 -->
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
