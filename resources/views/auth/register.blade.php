@extends('layouts.base')
@section('title',"Inscription")

@section('body-content')
    <div class="container mb-5">
        @parent
        <div class="row mb3 justify-content-center">
            @csrf

            <div class="col-6 input-group">
                <label class="input-group-text" for="name">Nom</label>
                <input id="name" class="form-control" type="text" value="{{old('name')}}" autofocus>
            </div>
            <div class="w-100"></div>
            <div class="col-6" hidden>
                <span class="invalid-feedback">@error('name'){{$message}}@enderror</span>
            </div>
            <div class="w-100 pb-4"></div>

            <div class="col-6 input-group">
                <label class="input-group-text" for="email">Adresse Courriel</label>
                <input id="email" class="form-control" type="email" value="{{old('email')}}"
                       placeholder="email@template.com">
            </div>
            <div class="w-100"></div>
            <div class="col-6" hidden>
                <span class="invalid-feedback">@error('email'){{$message}}@enderror</span>
            </div>
            <div class="w-100 pb-4"></div>

            <div class="col-6 input-group">
                <label class="input-group-text" for="password">Mot de passe</label>
                <input id="password" class="form-control" type="password">
            </div>
            <div class="w-100"></div>
            <div class="col-6" hidden>
                <span class="invalid-feedback">@error('password'){{$message}}@enderror</span>
            </div>
            <div class="w-100 pb-4"></div>

            <div class="col-6 input-group">
                <label class="input-group-text" for="password-confirm">Confirmer le mot de passe</label>
                <input id="password-confirm" class="form-control" type="password">
            </div>
            <div class="w-100"></div>
            <div class="col-6" hidden>
                <span class="invalid-feedback">@error('password'){{$message}}@enderror</span>
            </div>
            <div class="w-100 pb-4"></div>

            <div class="col-2">
                <button type="submit" class="btn btn-primary">S'inscrire</button>
            </div>
            <div class="w-100 pb-2"></div>
        </div>
    </div>
@endsection
