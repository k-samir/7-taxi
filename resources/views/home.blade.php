@extends('layouts.base')
@section('title', "Accueil")

@section('styles')
    <style>
        .masthead {
            background-image: url("{{asset("img/taxi-background.jpg")}}");
            background-position: center;
        }
    </style>
@endsection

@section('body-content')


    <body id="page-top">

    <header class="masthead">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in"><span>Bienvenue chez 7-Taxi</span></div>
                <div class="intro-heading text-uppercase"><span>Voyagez avec nous</span></div>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" role="button" href="#services">Commencer</a>
            </div>
        </div>
    </header>
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase section-heading">Services</h2>
                    <h3 class="text-muted section-subheading">Simple et rapide</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-6"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-plane fa-stack-1x fa-inverse"></i></span>
                    <h4 class="section-heading">Transport</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                </div>
                <div class="col-md-6"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-smile-o fa-stack-1x fa-inverse"></i></span>
                    <h4 class="section-heading">Assistance</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                </div>
            </div>
        </div>
    </section>
    <section id="portfolio" class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase section-heading">L'entreprise</h2>
<<<<<<< HEAD
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
=======
                    <h3 class="section-subheading text-muted"></h3>
>>>>>>> 80352b97926de2ffac5516f4d5a46c0ccabcab54
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-4 portfolio-item">
                    <a class="portfolio-link">
                        <div class="portfolio-hover"></div>
                        <img class="img-fluid" src="{{asset("img/Depositphotos_110892424_l-2015-1600x1067.jpg")}}"></a>
                    <div class="portfolio-caption">
                        <h4>Qualité</h4>
                        <p class="text-muted"></p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 portfolio-item">
                    <a class="portfolio-link">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"></div>
                        </div>
                        <img class="img-fluid" src="{{asset("img/img-texte-pv-no6.png")}}"></a>
                    <div class="portfolio-caption">
                        <h4>Sûreté</h4>
                        <p class="text-muted"></p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 portfolio-item">
                    <a class="portfolio-link">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"></div>
                        </div>
                        <img class="img-fluid" src="{{asset("img/45003.jpg")}}"></a>
                    <div class="portfolio-caption">
                        <h4>Professionalisme</h4>
                        <p class="text-muted"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase">À propos de nous</h2>
                    <h3 class="text-muted section-subheading">Notre Histoire</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-group timeline">
                        <li class="list-group-item">
                            <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{asset("img/about/1.jpg")}}"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>&nbsp;Mars 2020</h4>
                                    <h4 class="subheading">Commencement</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Le projet a débuté à cette date.<br>Nous avons reçu la demande de notre enseignant de faire une site web centralisé sur les taxis.</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item timeline-inverted">
                            <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{asset("img/rsz_code-editoren-t.jpg")}}"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Mai 2020</h4>
                                    <h4 class="subheading">Dévelopement</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">(À continuer)</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{asset("img/rsz_lancement-site-web_1212-24.jpg")}}"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Juin 2020</h4>
                                    <h4 class="subheading">Phase de lancement</h4>
                                </div>
                                <div class="timeline-body"><p class="text-muted">Étant la date de lancement, le projet a grandement évolué et s'est développé pour devenir une belle application web</p></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    </body>

@endsection
