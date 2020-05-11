@extends('layouts.base')
@section('title', "Formulaire de création de client")

@section('body-content')
    <div class="container mb-5">
        @parent
        <form method="POST" action="{{route("createClient")}}">
            @csrf

            <div class="row mb-4 justify-content-center">
                <div class="col-4 input-group">
                    <label class="input-group-text" for="solde">Solde</label>
                    <input id="solde" class="form-control" value="{{old('solde')}}" type="number" name="solde" placeholder="Solde" required>
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="firstName">Prénom & Nom</label>
                    <input id="firstName" class="form-control" value="{{old('firstName')}}" type="text" name="firstName" placeholder="Prénom" required>
                    <label class="input-group-text" for="lastName" hidden></label>
                    <input id="lastName" class="form-control" value="{{old('lastName')}}" type="text" name="lastName" placeholder="Nom" required>
                </div>
                <div class="w-100"></div>
                <div class="col-4"><span class="text-danger text-sm-right">@error('solde'){{$message}}@enderror</span></div>
                <div class="col"><span class="text-danger text-sm-right">@error('firstName'){{$message}}@enderror</span></div>
                <div class="col"><span class="text-danger text-sm-right">@error('lastName'){{$message}}@enderror</span></div>
            </div>
            <div class="row mb-4 justify-content-center">
                <div class="col input-group">
                    <label class="input-group-text" for="phoneNumber">Numéro de téléphone</label>
                    <input id="phoneNumber" class="form-control" type="tel" name="phoneNumber" placeholder="(123) 456-7890">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="email">Courriel</label>
                    <input id="email" class="form-control" type="tel" name="email" placeholder="email@template.com">
                </div>
                <div class="w-100"></div>
                <div class="col"><span class="text-danger text-sm-right">@error('phoneNumber'){{$message}}@enderror</span></div>
                <div class="col"><span class="text-danger text-sm-right">@error('email'){{$message}}@enderror</span></div>
            </div>
            <div class="row mb-4 justify-content-center">
                <div class="col input-group">
                    <label class="input-group-text" for="streetNumber">Rue</label>
                    <input id="streetNumber" class="form-control" type="number" name="streetNumber" placeholder="Numéro">
                    <label class="input-group-text" for="streetName" hidden></label>
                    <input id="streetName" class="form-control" type="text" name="streetName" placeholder="Rue">
                </div>
                <div class="col-5 input-group">
                    <label class="input-group-text" for="cityName">Ville</label>
                    <input id="cityName" class="form-control" type="text" name="cityName">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="postalCode">Code Postal</label>
                    <input id="postalCode" class="form-control" type="text" name="postalCode" placeholder="A1A 1A1">
                </div>
                <div class="w-100 pb-4"></div>
                <div class="w-100"></div>
                <div class="col"><span class="text-danger text-sm-right">@error('streetNumber'){{$message}}@enderror</span></div>
                <div class="col"><span class="text-danger text-sm-right">@error('streetName'){{$message}}@enderror</span></div>
                <div class="col-5"><span class="text-danger text-sm-right">@error('cityName'){{$message}}@enderror</span></div>
                <div class="col"><span class="text-danger text-sm-right">@error('postalCode'){{$message}}@enderror</span></div>
            </div>

        </form>
    </div>
@endsection
