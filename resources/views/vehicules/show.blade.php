@extends('vehicules.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Vehicule</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('vehicules.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <table class="table table-bordered">
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

                    <a class="btn btn-primary" href="{{ route('vehicules.edit', $vehicule->matricule) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>


    </table>

@endsection
