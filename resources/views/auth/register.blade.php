@extends('layouts.base')
@section('title',"Inscription")

@section('body-content')
    <div class="container mb-5">
        @parent
        <form method="POST" action="{{ route('register') }}">
            <div class="row mb-3 justify-content-center">
                @csrf

                <div class="col-6 input-group">
                    <label class="input-group-text" for="name">Nom</label>
                    <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{old('name')}}" autofocus required>
                </div>
                <div class="w-100"></div>
                <div class="col-6" hidden>
                    <span class="text-danger text-sm-right">@error('name'){{$message}}@enderror</span>
                </div>
                <div class="w-100 pb-4"></div>

                <div class="col-6 input-group">
                    <label class="input-group-text" for="email">Adresse Courriel</label>
                    <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{old('email')}}" placeholder="email@template.com" required>
                </div>
                <div class="w-100"></div>
                <div class="col-6" hidden>
                    <span class="text-danger text-sm-right">@error('email'){{$message}}@enderror</span>
                </div>
                <div class="w-100 pb-4"></div>

                <div class="col-6 input-group">
                    <label class="input-group-text" for="password">Mot de passe</label>
                    <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required>
                </div>
                <div class="w-100"></div>
                <div class="col-6" hidden>
                    <span class="text-danger text-sm-right">@error('password'){{$message}}@enderror</span>
                </div>
                <div class="w-100 pb-4"></div>

                <div class="col-6 input-group">
                    <label class="input-group-text" for="password-confirm">Confirmer le mot de passe</label>
                    <input id="password-confirm" class="form-control" type="password" name="password_confirmation" required>
                </div>
                <div class="w-100"></div>
                <div class="col-6" hidden>
                    <span class="text-danger text-sm-right">@error('password-confirm'){{$message}}@enderror</span>
                </div>
                <div class="w-100 pb-4"></div>

                <div class="col-2">
                    <button type="submit" class="btn btn-primary">S'inscrire</button>
                </div>
                <div class="w-100 pb-2"></div>
            </div>
        </form>
    </div>
@endsection
