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
                        <a class="btn btn-secondary" href="{{ route('vehicules.create') }}"> Nouveau vehicule</a>
                    </div>
                </div>
                <div class="card-body">
                    <div id="typography">
                        <div class="card-title">

                        </div>

                        <table class="table">
                            <thead class=" text-primary">
                                <th>Images</th>
                                <th>Matricule</th>
                                <th>Prix Location</th>
                                <th>Disponibilite</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($vehicules as $vehicule)
                                    <tr>
                                        <td>
                                            @if (!$vehicule->photos->isEmpty())
                                                <img src="{{ 'data:image/*;base64,' . base64_encode($vehicule->photos[0]->image) }}"
                                                    style="height:60px; width:100px" />
                                            @else
                                                <img src="{{ asset('images') }}/log1.jpeg"
                                                    style="height:60px; width:100px" />
                                            @endif
                                        </td>
                                        <td>{{ $vehicule->matricule }}</td>
                                        <td>{{ $vehicule->prixLoc }}</td>
                                        <td><input type="checkbox" name="disponibilite"
                                                data-id="{{ $vehicule->matricule }}" value="1" class="js-switch"
                                                id="dispoup" {{ $vehicule->disponibilite == 1 ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <form action="{{ route('vehicules.destroy', $vehicule->matricule) }}"
                                                method="POST">

                                                <a class="btn btn-info btn-fab btn-fab-mini btn-round"
                                                    href="{{ route('vehicules.show', $vehicule->matricule) }}">
                                                    <i class="material-icons">description</i>
                                                </a>

                                                <a class="btn btn-success btn-fab btn-fab-mini btn-round"
                                                    href="{{ route('vehicules.edit', $vehicule->matricule) }}">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-fab btn-fab-mini btn-round show_confirm">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $vehicules->render('pagination::bootstrap-4') }}

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- toggle btn -->
    <script>
        let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function(html) {
            let switchery = new Switchery(html, {
                size: 'small',
                color: '#0F8AC7'
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('.js-switch').change(function() {
                let status = $(this).prop('checked') === true ? 1 : 0;
                let mat = $(this).data('id');

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('vehicules.update.disponibilite') }}',
                    data: {
                        'disponibilite': status,
                        'vehicule_matricule': mat
                    },
                    success: function(data) {
                        console.log(data.message);
                    }
                });
            });
        });
    </script>


    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
        <script type="text/javascript">
            $('.show_confirm').click(function(event) {
                var form = $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                new swal({
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
