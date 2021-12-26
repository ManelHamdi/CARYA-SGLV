<div class="sidebar" data-color="orange" data-background-color="white"
    data-image="{{ asset('material') }}/img/sidebar-2.jpg" style="background-color: #f2f2f2">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="{{ route('home') }}" class="simple-text logo-normal">
            <img style="height: 40px; width: 100px;" src="{{ asset('images') }}/loloapp.png">
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'Tableau de bord' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <!--<i class="material-icons">dashboard</i>-->
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Tableau de bord') }}</p>
                </a>
            </li>

            <li class="nav-item {{ $activePage == 'Véhicule' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('vehicule') }}">
                    <i class="material-icons">library_books</i>
                    <p>{{ __('Gestion des véhicules') }}</p>
                </a>
            </li>

            <li class="nav-item {{ $activePage == 'Contrats' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('contrat') }}">
                    <i class="material-icons">content_paste</i>
                    <p>{{ __('Gestion des contrats') }}</p>
                </a>
            </li>

            <li class="nav-item {{ $activePage == 'Clients' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('client') }}">
                    <i class="material-icons">bubble_chart</i>
                    <p>{{ __('Gestion des clients') }}</p>
                </a>
            </li>

            <li
                class="nav-item {{ $activePage == 'Mon profile' || $activePage == 'Demande' ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="false">
                    <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
                    <p>{{ __('Gestion de compte') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ $activePage == 'Mon profile' || $activePage == 'Demande' ? ' show' : '' }}"
                    id="laravelExample">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'Mon profile' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('profile.edit') }}">
                                <span class="sidebar-mini"> - </span>
                                <span class="sidebar-normal">{{ __('Mon profile') }} </span>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'Demande' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('user.index') }}">
                                <span class="sidebar-mini"> - </span>
                                <span class="sidebar-normal"> {{ __('Demande: congé / attestation') }} </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
