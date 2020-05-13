<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title','Projet - Taxi')</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    @yield('headContent')

    @yield('before-scripts')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-color.css')}}">
    @yield('styles')
</head>

<body id="base-body">
<div id="navigation-bar" class="container-fluid mb-3 navbar-light bg-light">
    <nav class="navbar navbar-expand-md">
        <a class="navbar-brand" href="{{route('home')}}"><h2 class="m-0 font-weight-bolder">Projet - Taxi</h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="navbarSupportedContent" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown font-weight-bold">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Formulaires de chauffeur</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('addConductorShift')}}">Ajout de shift</a>
                        <a class="dropdown-item" href="{{route('createConductor')}}">Création de chauffeur</a>
                    </div>
                </li>
                <li class="nav-item dropdown font-weight-bold">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Formulaires de créations</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('createConductor')}}">Création de chauffeur</a>
                        <a class="dropdown-item" href="{{route('createClient')}}">Création de client</a>
                        <a class="dropdown-item" href="{{route('createTaxi')}}"> Création de taxi</a>
                        <a class="dropdown-item" href="{{route('createFixTarif')}}"> Création de tarif fix</a>
                    </div>
                </li>
                <li class="nav-item dropdown font-weight-bold">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Formulaires de modifications</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <form method="post">
                            @csrf
                            <div class="col input-group">
                                <label class="input-group-text" for="id">ID</label>
                                <input id="id" class="form-control" type="number" maxlength="7" name="id" placeholder="Numéro" required>
                            </div>
                            <button type="submit" class="dropdown-item" value="conductor" formaction="{{route('modifyConductorRequest')}}">Modification de chauffeur</button>
                            <button type="submit" class="dropdown-item" value="client" formaction="{{route('modifyClientRequest')}}">Modification de client</button>
                            <button type="submit" class="dropdown-item" value="taxi" formaction="{{route('modifyTaxiRequest')}}">Modification de taxi</button>
                            <button type="submit" class="dropdown-item" value="fixTarif" formaction="{{route('modifyFixTarifRequest')}}">Modification de tarif fix</button>
                        </form>
                    </div>
                </li>
                <li class="nav-item dropdown font-weight-bold">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Options</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <button type="button" id="btn-obscur-light" class="navigation-text dropdown-item" data-toggle="button" aria-pressed="false" autocomplete="off" onclick="changeDarkOrLightMode()">Mode obscur</button>
                        <button type="button" class="navigation-text dropdown-item" data-toggle="button" aria-pressed="false" autocomplete="off" onclick="changeAutomaticColor()">Couleurs automatique</button>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item font-weight-bold ml-auto"><a class="nav-link" href="{{route('login')}}">Connexion</a></li>
                    @if (Route::has('register'))
                        <li class="nav-item font-weight-bold ml-auto"><a class="nav-link" href="{{route('register')}}">Inscription</a></li>
                    @endif
                @else
                    <li class="nav-item font-weight-bold ml-auto"><a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Déconnexion</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                @endguest
            </ul>
        </div>
    </nav>
</div>
@section('body-content')
    <div class="row pb-3">
        <h1 class="mx-auto"><u>@yield('title')</u></h1>
    </div>
@show

<scripts>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="{{asset('js/base.js')}}" defer></script>
    @yield('after-scripts')
</scripts>
</body>
</html>
