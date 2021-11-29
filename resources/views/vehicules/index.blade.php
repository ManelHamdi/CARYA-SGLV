@extends('vehicules.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gerer Vehicule</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('vehicules.create') }}"> Create New Vehicule</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        @foreach ($vehicules as $vehicule)
            <tr>
                <th>Images</th>
                <td colspan="3">
                    @foreach ($vehicule->photos as $photo)
                        <img src="{{ asset('/uploads/' . $photo->image) }}" style="height:60px; width:100px" />
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>Matricule</th>
                <td>{{ $vehicule->matricule }}</td>
                <th>Prix Location</th>
                <td>{{ $vehicule->prixLoc }}</td>
            </tr>
            <tr>
                <th>Marque</th>
                <td>{{ $vehicule->marque }}</td>
                <th>Type</th>
                <td>{{ $vehicule->type }}</td>
            </tr>
            <tr>
                <th>Model</th>
                <td>{{ $vehicule->model }}</td>
                <th>Date Achat</th>
                <td>{{ $vehicule->dateAchat }}</td>
            </tr>
            <tr>
                <th>Couleur</th>
                <td>{{ $vehicule->couleur }}</td>
                <th>Nombre places</th>
                <td>{{ $vehicule->nbrPlaces }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td colspan="3">{{ $vehicule->description }}</td>
            </tr>
            <tr>
                <th>Climatisation</th>
                <td>{{ $vehicule->climatisation }}</td>
                <th>Carburation</th>
                <td>{{ $vehicule->carburation }}</td>
            </tr>
            <tr>
                <th>Kilometrage</th>
                <td>{{ $vehicule->kilometrage }}</td>
                <th>Puissance</th>
                <td>{{ $vehicule->puissance }}</td>
            </tr>
            <tr>
                <th>Boite Vitesse</th>
                <td>{{ $vehicule->boiteVitesse }}</td>
                <th>Taille Moteur</th>
                <td>{{ $vehicule->tailleMoteur }}</td>
            </tr>
            <tr>
                <th>Disponibilite</th>
                <td>{{ $vehicule->disponibilite }}</td>
                <th width="280px">Action</th>

                <td>
                    <form action="{{ route('vehicules.destroy', $vehicule->matricule) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('vehicules.show', $vehicule->matricule) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('vehicules.edit', $vehicule->matricule) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <tr>
                <td colspan="4"></td>
            </tr>
        @endforeach
    </table>

    {!! $vehicules->links() !!}

@endsection
