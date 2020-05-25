@extends('layouts.base')
@section('title')
    Formulaire de {{$type}} de clients @if(isset($id))(Id: {{$id}})@endif
@endsection

@section('body-content')
    @parent
    <div class="container mb-5">
    <form action="{{$routeOnAction}}" method="post">
            @csrf

            <div class="row mb-4 justify-content-center">
                <div class="col input-group">
                    <label class="input-group-text" for="firstName">Prénom & Nom</label>
                    <input id="firstName" class="form-control" value="{{old('firstName', $firstName ?? "")}}" type="text" name="firstName" placeholder="Prénom" required>
                    <label class="input-group-text" for="lastName" hidden></label>
                    <input id="lastName" class="form-control" value="{{old('lastName', $lastName ?? "")}}" type="text" name="lastName" placeholder="Nom" required>
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="phoneNumber">Numéro de téléphone</label>
                    <input id="phoneNumber" class="form-control" value="{{old('phoneNumber', $phoneNumber ?? "")}}" type="tel" name="phoneNumber" placeholder="(123) 456-7890">
                </div>
                <div class="w-100"></div>
                <div class="col"><span class="text-danger text-sm-right">@error('firstName'){{$message}}@enderror</span></div>
                <div class="col"><span class="text-danger text-sm-right">@error('lastName'){{$message}}@enderror</span></div>
                <div class="col-6"><span class="text-danger text-sm-right">@error('phoneNumber'){{$message}}@enderror</span></div>
            </div>
            <div class="row mb-4 justify-content-center">
                <div class="col input-group">
                    <label class="input-group-text" for="streetNumber">Rue</label>
                    <input id="streetNumber" class="form-control" value="{{old('streetNumber', $streetNumber ?? "")}}" type="number" name="streetNumber" placeholder="Numéro">
                    <label class="input-group-text" for="streetName" hidden></label>
                    <input id="streetName" class="form-control" value="{{old('streetName', $streetName ?? "")}}" type="text" name="streetName" placeholder="Rue">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="email">Courriel</label>
                    <input id="email" class="form-control" value="{{old('email', $email ?? "")}}" type="tel" name="email" placeholder="email@template.com">
                </div>
                <div class="w-100"></div>
                <div class="col"><span class="text-danger text-sm-right">@error('streetNumber'){{$message}}@enderror</span></div>
                <div class="col"><span class="text-danger text-sm-right">@error('streetName'){{$message}}@enderror</span></div>
                <div class="col-6"><span class="text-danger text-sm-right">@error('email'){{$message}}@enderror</span></div>
            </div>
            <div class="row mb-4 justify-content-center">
                <div class="col-5 input-group">
                    <label class="input-group-text" for="cityName">Ville</label>
                    <input id="cityName" class="form-control" value="{{old('cityName', $cityName ?? "")}}" type="text" name="cityName">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="postalCode">Code Postal</label>
                    <input id="postalCode" class="form-control" value="{{old('postalCode', $postalCode ?? "")}}" type="text" name="postalCode" placeholder="A1A 1A1">
                </div>
                <div class="w-100"></div>
                <div class="col-5"><span class="text-danger text-sm-right">@error('cityName'){{$message}}@enderror</span></div>
                <div class="col"><span class="text-danger text-sm-right">@error('postalCode'){{$message}}@enderror</span></div>
            </div>

        <div class="row mb-4 justify-content-center">
            <div class="col input-group">
                <label class="input-group-text" for="clientNumber">Numéro</label>
                <input id="clientNumber" class="form-control" value="{{old('clientNumber', $clientNumber ?? "")}}" type="number" name="clientNumber" placeholder="Numéro">
            </div>
            <div class="col input-group">
                <label class="input-group-text" for="solde">Solde</label>
                <input id="solde" class="form-control" value="{{old('solde', $solde ?? "")}}" type="number" name="solde" placeholder="Solde" required>
            </div>
            <div class="w-100"></div>
            <div class="col"><span class="text-danger text-sm-right">@error('number'){{$message}}@enderror</span></div>
        </div>

            <div class="row">
                <div class="col"><span class="text-danger text-sm-right">@error('solde'){{$message}}@enderror</span></div>
                <div class="col"><button type="submit" class="btn btn-lg btn-success w-25">{{$messageOnAction}}</button></div>
            </div>
        </form>
    </div>
@endsection
