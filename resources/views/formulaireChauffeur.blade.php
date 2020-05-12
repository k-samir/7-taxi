@extends('layouts.base')
@section('title')
    Formulaire de {{$type}} de chauffeur @if(isset($id))(Id: {{$id}})@endif
@endsection

@section('body-content')
    @parent
    <div class="container mb-5">
        <form method="post" action="{{$routeOnAction}}">
            @csrf
            <div class="row mb-4">
                <div class="col input-group">
                    <label class="input-group-text" for="firstName">Prénom & Nom</label>
                    <input id="firstName" class="form-control" value="{{old('firstName', $firstName ?? "")}}" type="text" name="firstName" placeholder="Prénom">
                    <label class="input-group-text" for="lastName" hidden></label>
                    <input id="lastName" class="form-control" value="{{old('lastName', $lastName ?? "")}}" type="text" name="lastName" placeholder="Nom">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="phoneNumber">Numéro de téléphone</label>
                    <input id="phoneNumber" class="form-control" value="{{old('phoneNumber', $phoneNumber ?? "")}}" type="tel" name="phoneNumber" placeholder="(123) 456-7890">
                </div>
                <div class="w-100 pb-4"></div>

                <div class="col input-group">
                    <label class="input-group-text" for="streetNumber">Rue</label>
                    <input id="streetNumber" class="form-control" value="{{old('streetNumber', $streetNumber ?? "")}}" type="number" name="streetNumber" placeholder="Numéro">
                    <label class="input-group-text" for="streetName" hidden></label>
                    <input id="streetName" class="form-control" value="{{old('streetName', $streetName ?? "")}}" type="text" name="streetName" placeholder="Rue">
                </div>
                <div class="col-5 input-group">
                    <label class="input-group-text" for="cityName">Ville</label>
                    <input id="cityName" class="form-control" value="{{old('cityName', $cityName ?? "")}}" type="text" name="cityName">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="postalCode">Code Postal</label>
                    <input id="postalCode" class="form-control" value="{{old('postalCode', $postalCode ?? "")}}" type="text" name="postalCode" placeholder="A1A 1A1">
                </div>
                <div class="w-100 pb-4"></div>

                <div class="col input-group">
                    <label class="input-group-text" for="licenceNumber">Numéro de permis</label>
                    <input id="licenceNumber" class="form-control" value="{{old('licenceNumber', $licenceNumber ?? "")}}" type="text" name="licenceNumber">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="licenceExpirationDate">Date d'expiration du permis</label>
                    <input id="licenceExpirationDate" class="form-control" value="{{old('licenceExpirationDate', $licenceExpirationDate ?? "")}}" type="date" name="licenceExpirationDate">
                </div>
                <div class="w-100 pb-4"></div>

                <div class="col input-group">
                    <label class="input-group-text" for="commission">Commission & Solde</label>
                    <input id="commission" class="form-control" value="{{old('commission', $commission ?? "")}}" type="number" name="commission" placeholder="Commission">
                    <label class="input-group-text" for="balance" hidden></label>
                    <input id="balance" class="form-control" value="{{old('balance', $balance ?? "")}}" type="number" name="balance" placeholder="Solde">
                </div>
            </div>

            <div class="row">
                <div class="col-4"></div>
                <div class="col"><button type="button" class="btn btn-lg btn-success w-25">{{$messageOnAction}}</button></div>
            </div>

        </form>
    </div>
@endsection

