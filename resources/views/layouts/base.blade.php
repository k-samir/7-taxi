<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title','Projet - Taxi')</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-color.css')}}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="{{ asset('fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/-Login-form-Page-BS4-.css')}}">
    <link rel="stylesheet" href="{{ asset('css/Responsive-Form-1.css')}}">
    <link rel="stylesheet" href="{{ asset('css/Responsive-Form.css')}}">
    @yield('headContent')

    @yield('before-scripts')


    @yield('styles')

</head>

<body id="base-body">
<nav id="navigation-bar" class="container-fluid navbar navbar-expand-lg mb-3 navbar-light bg-light">
    <a class="navbar-brand" href="{{route('home')}}">7-Taxi</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" data-toogle="collapse" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @guest
                <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('home')}}#services">Services</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('home')}}#portfolio">L'entreprise</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="{{route('home')}}#about">À propos</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
            @else
                <li class="nav-item dropdown font-weight-bold">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Formulaires de chauffeur</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('addConductorShift')}}">Ajout de shift</a>
                        <a class="dropdown-item" href="{{route('createConductor')}}">Création de chauffeur</a>
                        <div class="dropdown-divider"></div>
                        <form method="post" action="{{route('modifyConductorRequest')}}">
                            @csrf
                            <div class="col input-group">
                                <label class="input-group-text" for="id">ID</label>
                                <input id="id" class="form-control" type="number" maxlength="7" name="id" placeholder="Numéro" required>
                            </div>
                            <button type="submit" class="dropdown-item" value="conductor">Modification de chauffeur</button>
                        </form>
                    </div>
                </li>
                <li class="nav-item dropdown font-weight-bold">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Formulaires de créations</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('createConductor')}}">Création de chauffeur</a>
                        <a class="dropdown-item" href="{{route('createClient')}}">Création de client</a>
                        <a class="dropdown-item" href="{{route('createTaxi')}}">Création de taxi</a>
                        <a class="dropdown-item" href="{{route('createFixTarif')}}">Création de tarif fix</a>

                    </div>
                </li>
                <li class="nav-item dropdown font-weight-bold">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Formulaires de modifications</a>
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
            @guest
                <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="{{route('login')}}">Connexion</a></li>
                @if (Route::has('register'))
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="{{route('register')}}">Inscription</a></li>
                @endif
            @else
                <li class="nav-item"><a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Déconnexion</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
            @endguest
        </ul>
    </div>
</nav>
@section('body-content')
    <div class="row pb-3">
        <h1 class="mx-auto"><u>@yield('title')</u></h1>
    </div>
@show
<section id="contact" style="background-image:url('img/map-image.png');margin-top:2rem">
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
                            <div class="form-group"><input class="form-control" type="email" id="email1" placeholder="Votre Email *" required=""><small class="form-text text-danger help-block lead"></small></div>
                            <div class="form-group"><input class="form-control" type="tel" placeholder="Votre Numéro *" required=""><small class="form-text text-danger help-block lead"></small></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><textarea class="form-control" id="message" placeholder="Votre Message *" required=""></textarea><small class="form-text text-danger help-block lead"></small></div>
                        </div>
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
            <div class="col-md-4"><span class="copyright">Copyright&nbsp;© 7-Taxi 2020</span><span class="copyright"><br> J.Bédard - Y.Stephanus - S.Kamar</span></div>
            <div class="col-md-4">
                <ul class="list-inline social-buttons">
                    <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-inline quicklinks">
                    <li class="list-inline-item"><a href="#" style="color:black;">Privacy Policy</a></li>
                    <li class="list-inline-item"><a href="#" style="color:black;">Terms of Use</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<scripts>
    <script src="{{asset('js/agency.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="{{asset('js/base.js')}}" defer></script>

    @yield('after-scripts')
</scripts>
</body>

</html>
