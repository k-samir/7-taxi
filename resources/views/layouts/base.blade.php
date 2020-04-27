<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    @yield('headContent')


    @yield('before-scripts')

    <style>
        body {
            background-color: #cbca89;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="css/font-color.css">
    @yield('styles')
</head>

<body id="base-body">
<div class="container-fluid mb-auto">
    <nav id="navigation-bar" class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="navbar-brand"><h2 class="m-0 font-weight-bolder">Projet - Taxi</h2></div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item font-weight-bold"><a class="nav-link" href="{{url('/')}}">Accueil</a></li>
                <li class="nav-item dropdown font-weight-bold">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Formulaires de chauffeur</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{url('/chauffeur')}}">Formulaire shift</a>
                        <a class="dropdown-item" href="{{url('/ajoutChauffeur')}}">Ajout chauffeur</a>
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
        </div>
    </nav>
</div>
@section('body-content')
    <h1 class="align-content-center">@yield('title')</h1>
@show

<scripts>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"   crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="{{ asset('js/base.js') }}" defer></script>
    @yield('afterScripts')
</scripts>
</body>
</html>
