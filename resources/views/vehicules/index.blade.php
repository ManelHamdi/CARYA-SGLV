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

                        <table class="table table-bordered">
                            @foreach ($vehicules as $vehicule)
                                <tr>
                                    <th style="white-space: nowrap;">Images</th>
                                    <td colspan="5">
                                        @foreach ($vehicule->photos as $photo)
                                            <img src="{{ 'data:image/*;base64,' . base64_encode( $photo->image) }}"
                                                style="height:80px; width:120px" />
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th style="white-space: nowrap;">Matricule</th>
                                    <td>{{ $vehicule->matricule }}</td>
                                    <th  style="white-space: nowrap;">Prix Location</th>
                                    <td>{{ $vehicule->prixLoc }}</td>
                                    <th style="white-space: nowrap;">Disponibilite</th>
                                    <td>{{ $vehicule->disponibilite == 1 ? 'disponible' : 'pas disponible' }}</td>
                                </tr>
                                <tr>

                                    <th style="white-space: nowrap;">Action</th>

                                    <td colspan="5">
                                        <form action="{{ route('vehicules.destroy', $vehicule->matricule) }}"
                                            method="POST">

                                            <a class="btn btn-info"
                                                href="{{ route('vehicules.show', $vehicule->matricule) }}">Details</a>

                                            <a class="btn btn-primary"
                                                href="{{ route('vehicules.edit', $vehicule->matricule) }}">Modifier</a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger show_confirm">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach
                        </table>

                        {!! $vehicules->links() !!}
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
