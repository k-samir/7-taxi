@extends('layouts.base')
@section('title', "Connexion")

@section('body-content')
    <div class="container mb-5">
        @parent
        <form method="POST" action="{{ route('login') }}">
            <div class="row mb3 justify-content-center">
                @csrf

                <div class="col-6 input-group">
                    <label class="input-group-text" for="email">Adresse Courriel</label>
                    <input id="email" class="form-control" type="email" name="email" value="{{old('email')}}" placeholder="email@template.com" autofocus>
                </div>
                <div class="w-100"></div>
                <div class="col-6" hidden>
                    <span class="text-danger text-sm-right">@error('email'){{$message}}@enderror</span>
                </div>
                <div class="w-100 pb-4"></div>

                <div class="col-6 input-group">
                    <label class="input-group-text" for="password">Mot de passe</label>
                    <input id="password" class="form-control" name="password" type="password">
                </div>
                <div class="w-100 pb-4"></div>

                <div class="col-5 input-group">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{old('remember')?"checked":""}}>
                    <label class="form-check-label" for="remember">Se souvenir de moi</label>
                </div>
                <div class="w-100 pb-4"></div>

                <div class="col-2">
                    <button type="submit" class="btn btn-primary">Se connecter</button>
                </div>
                <div class="w-100 pb-2"></div>

                @if (Route::has('password.request'))
                    <div class="col-3"><a class="btn btn-link" href="{{route('password.request')}}">Mot de passe oublié?</a></div>
                @endif
            </div>
        </form>
    </div>
@endsection
