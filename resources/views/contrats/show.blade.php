@extends('layouts.app', ['activePage' => 'Contrat', 'titlePage' => __('Contrats')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Details Contrat de vehivule :
                                {{ //$vehicule($contrat->vehicule_matricule)->matricule
                                $contrat->vehicule_matricule
                                }}
                                et client :
                                {{ $client($contrat->client_id)->nom }} {{ $client($contrat->client_id)->prenom }}</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">

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
