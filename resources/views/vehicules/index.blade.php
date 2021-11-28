@extends('vehicules.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD with Image Upload Example from scratch - ItSolutionStuff.com</h2>
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
        <tr>
            <th>Model</th>
            <th>Matricule</th>
            <th>Marque</th>
            <th>Type</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($vehicules as $vehicule)
        <tr>
            <td>{{ $vehicule->model }}</td>
            <td>{{ $vehicule->matricule }}</td>
            <td>{{ $vehicule->marque }}</td>
            <td>{{ $vehicule->type }}</td>
            <td>
                <form action="{{ route('vehicules.destroy',$vehicule->matricule) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('vehicules.show',$vehicule->matricule) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('vehicules.edit',$vehicule->matricule) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $vehicules->links() !!}

@endsection
