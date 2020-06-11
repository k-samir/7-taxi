<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>@yield('title','Projet - Taxi')</title>

    @yield('headContent')

    @yield('before-scripts')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-color.css')}}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/cr-1.5.2/kt-2.5.2/r-2.2.5/rr-1.2.7/sp-1.1.1/datatables.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="{{ asset('fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/-Login-form-Page-BS4-.css')}}">
    <link rel="stylesheet" href="{{ asset('css/Responsive-Form.css')}}">
    <style>
        #section-contactUs {
            background-image: url("{{asset("img/map-image.png")}}");
        }
    </style>
    @yield('styles')

</head>
<body id="base-body">
<nav id="navigation-bar" class="navbar navbar-dark navbar-expand-lg bg-dark">
    <a class="navbar-brand text-warning" href="{{route('home')}}">7-Taxi</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" data-toogle="collapse" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @guest
                <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('homeNoVerification')}}#services">SERVICES</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('homeNoVerification')}}#portfolio">L'ENTREPRISE</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="{{route('homeNoVerification')}}#aboutUs">À PROPOS</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="{{route('homeNoVerification')}}#section-contactUs">CONTACT</a></li>
            @else
                @switch(session('role'))
                @case('admin')
                    <li class="nav-item dropdown font-weight-bold">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Formulaires de chauffeur</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('addConductorShift')}}">Ajout de shift</a>
                            <a class="dropdown-item" href="{{route('createConductor')}}">Création de chauffeur</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown font-weight-bold">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Formulaires de créations</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('createConductor')}}">Création de chauffeur</a>
                            <a class="dropdown-item" href="{{route('createClient')}}">Création de client</a>
                            <a class="dropdown-item" href="{{route('getTaxi')}}">Création de taxi</a>
                            <a class="dropdown-item" href="{{route('createFixTarif')}}">Création de tarif fixe</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown font-weight-bold">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Liste des entités</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('listUsers')}}">Liste des utilisateurs</a>
                            <a class="dropdown-item" href="{{route('listFormulaires')}}">Liste des formulaires</a>
                            <a class="dropdown-item" href="{{route('listChauffeur')}}">Liste des chauffeurs</a>
                            <!--a class="dropdown-item" href="{{route('home')}}">Liste des clients</a-->
                            <a class="dropdown-item" href="{{route('listTaxi')}}">Liste des taxis</a>
                            <!--a class="dropdown-item" href="{{route('home')}}">Liste des tarifs fixes</a-->
                        </div>
                    </li>
                    @break
                @case('conductor')
                    <li class="nav-item"><a class="nav-link" href="{{route('addConductorShift')}}">Ajout de shift</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('modifyConductor',['id'=>\Illuminate\Support\Facades\Auth::id()])}}">Modification du chauffeur</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('listFormulaires')}}">Liste des formulaires</a></li>
                    @break
                @case('client')
                    <li class="nav-item"><a class="nav-link" href="{{route('modifyClient',['id'=>\Illuminate\Support\Facades\Auth::id()])}}">Modification du client</a></li>
                    @break
                @endswitch
            @endguest
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown font-weight-bold">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Options</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <button type="button" id="btn-obscur-light" class="navigation-text dropdown-item" data-toggle="button" aria-pressed="false" autocomplete="off" onclick="changeDarkOrLightMode()">Mode obscur</button>
                    <button type="button" class="navigation-text dropdown-item" data-toggle="button" aria-pressed="false" autocomplete="off" onclick="changeAutomaticColor()">Couleurs automatique</button>
                </div>
            </li>
            @if(\Illuminate\Support\Facades\Auth::guest() || !isset(\Illuminate\Support\Facades\Auth::user()->email_verified_at))
                <li class="nav-item font-weight-bold ml-auto"><a class="nav-link" href="{{route('login')}}">Connexion</a></li>
                @if (Route::has('register'))
                    <li class="nav-item font-weight-bold ml-auto"><a class="nav-link" href="{{route('password.reset',['token'=>'15151'])}}">Inscription</a></li>
                @endif
            @else
                <li class="nav-item font-weight-bold ml-auto"> <a class="nav-link" href="{{route('changePassword',['token'=>Auth::user()->remember_token])}}">Changement du mot de passe</a> </li> 
                <li class="nav-item font-weight-bold ml-auto"><a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Déconnexion</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="post" hidden>@csrf</form>
                @endif
        </ul>
    </div>
</nav>
@section('body-content')
    <div class="row pb-3">
        <h1 class="mx-auto"><u>@yield('title')</u></h1>
    </div>
@show
<section id="section-contactUs" class="mt-1 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="text-uppercase section-heading">Nous contacter</h2>
                <h3 class="section-subheading text-muted"></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form id="contactForm" name="contactForm" novalidate="novalidate">
                    <div class="form-row">
                        <div class="col col-md-6">
                            <div class="form-group"><input class="form-control" type="text" id="name1" placeholder="Votre Nom *" required=""><small class="form-text text-danger flex-grow-1 help-block lead"></small></div>
                            <div class="form-group"><input class="form-control" type="email" id="email1" placeholder="Votre Email - email@templace.com" required=""><small class="form-text text-danger help-block lead"></small></div>
                            <div class="form-group"><input class="form-control" type="tel" placeholder="Votre Téléphone - (123) 4567-890" required=""><small class="form-text text-danger help-block lead"></small></div>
                        </div>
                        <div class="col-md-6"><div class="form-group"><textarea class="form-control" id="message" placeholder="Votre Message *" required=""></textarea><small class="form-text text-danger help-block lead"></small></div></div>
                        <div class="col"><div class="clearfix"></div></div>
                        <div class="col-lg-12 text-center">
                            <div id="success"></div>
                            <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4"><span class="copyright">Copyright&nbsp;© 7-Taxi 2020</span><span class="copyright"><br> Jonathan Bédard - Yoann Stephanus - Samir Kamar</span></div>
            <div class="col-md-4">
                <ul class="list-inline social-buttons">
                    <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-inline quicklinks">
                    <li class="list-inline-item"><a class="text-dark" href="#">Privacy Policy</a></li>
                    <li class="list-inline-item"><a class="text-dark" href="#">Terms of Use</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<scripts>
    <script src="{{asset('js/agency.js')}}"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/cr-1.5.2/kt-2.5.2/r-2.2.5/rr-1.2.7/sp-1.1.1/datatables.min.js"></script>
    <script src="{{asset('js/base.js')}}" defer></script>

    @yield('after-scripts')
</scripts>
</body>

</html>
