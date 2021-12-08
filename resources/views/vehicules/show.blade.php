@extends('layouts.app', ['activePage' => 'Véhicule', 'titlePage' => __('Véhicules')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Details Véhicule de matricule: {{$vehicule->matricule}}</h4>
            </div>

            <div class="card-body">
                <div id="typography">
                    <div class="table-responsive">
    <table class="table">
        <tr>
            <th>Images</th>
            <td colspan="3">
                @foreach ($vehicule->photos as $photo)
                    <img src="{{ 'data:image/*;base64,' . base64_encode( $photo->image) }}" style="height:60px; width:100px" />
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
            <td>{{ $vehicule->climatisation == 1 ? 'climatisé' : 'non climatisé' }}</td>
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
            <td>{{ $vehicule->disponibilite == 1 ? 'disponible' : 'pas disponible' }}</td>
            <th width="280px">Action</th>

            <td>
                <form action="{{ route('vehicules.destroy', $vehicule->matricule) }}" method="POST">

                    <a class="btn btn-primary" href="{{ route('vehicules.edit', $vehicule->matricule) }}">
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
    @push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">

         $('.show_confirm').click(function(event) {
              var form =  $(this).closest("form");
              var name = $(this).data("name");
              event.preventDefault();
              swal({
                  title: `Are you sure you want to delete this record?`,
                  text: "If you delete this, it will be gone forever.",
                  icon: "warning",
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
