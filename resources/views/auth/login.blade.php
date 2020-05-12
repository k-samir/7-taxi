@extends('layouts.base')
@section('title', "Connexion")

@section('body-content')

<form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="container-fluid">
            <div class="row mh-100vh">
                <div class="col-10 col-sm-8 col-md-6 col-lg-6 offset-1 offset-sm-2 offset-md-3 offset-lg-0 align-self-center d-lg-flex align-items-lg-center align-self-lg-stretch bg-white p-5 rounded rounded-lg-0 my-5 my-lg-0" id="login-block">
                    <class class="m-auto w-lg-75 w-xl-50">
                        <h2 class="text-info font-weight-light mb-5" style="font-family: 'Kaushan Script', cursive;color: rgb(254,209,54);font-size: 40px;">Se Connecter</h2>
                        <form>
                            <div class="form-group"><label class="text-secondary">Email</label><input id="email" class="form-control" type="email" name="email" value="{{old('email')}}" placeholder="email@template.com" autofocus></div>
                            <div class="w-100"></div>
                            <div class="col-6" hidden>
                                <span class="text-danger text-sm-right">@error('email'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group"><label class="text-secondary">Mot de passe</label> <input id="password" class="form-control" name="password" type="password"></div><div class="checkbox">
 <label>
     
    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{old('remember')?"checked":""}}>
    <span class="checkbox-material">
        <label class="check" for="remember" style="color: #17a2b8;font-size: 80%;
font-weight: 400;">Se souvenir de moi
        </label>
    </span>  
 </label>
</div><button class="btn btn-info mt-2" type="submit">Se Connecter</button></form>

@if (Route::has('password.request'))
                    <p class="mt-3 mb-0"></p> <a class="btn btn-link" href="{{route('password.request')}}">Mot de passe oublié?</a></class>
                @endif


                      
                    </div>
              
                <div class="col-lg-6 d-flex align-items-end" id="bg-block" style="background-image: url(&quot;img/taxi_cars_traffic_146180_1920x1080.jpg&quot;);background-size: cover;background-position: center center;">
                    <p class="ml-auto small text-dark mb-2"><br></p>
                </div>
            </div>
        </div>
        @endsection
 