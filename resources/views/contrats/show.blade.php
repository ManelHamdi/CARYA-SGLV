@extends('layouts.app', ['activePage' => 'Contrats', 'titlePage' => __('Contrats')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div class="pull-left">
                                <h4 class="card-title "> Details Contrat de location. </h4>
                            </div>
                            <div class="pull-right">
                                <form action="{{ route('contrats.destroy', $contrat) }}" method="POST">
                                    <a class="btn btn-info btn-fab btn-fab-mini btn-round"
                                        href="{{ route('contrats.print', $contrat) }}" target="_blank">
                                        <i class="material-icons">print</i>
                                    </a>

                                    <a class="btn btn-warning btn-fab btn-fab-mini btn-round"
                                        href="{{ route('contrats.printpdf', $contrat) }}" target="_blank">
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
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                @include('contrats.paper')
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
