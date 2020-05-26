@extends('layouts.base')
@section('title')
    Formulaire de {{$type}} de chauffeur @if(isset($id))(Id: {{$id}})@endif
@endsection

@section('body-content')
    @parent
    <div class="container mb-5">
        <form action="{{$routeOnAction}}" method="post">
            @csrf
            <div class="row mb-4">
                <div class="col input-group">
                    <label class="input-group-text" for="firstName">Prénom & Nom</label>
                    <input id="firstName" class="form-control" value="{{old('firstName', $value->prenom ?? "")}}" type="text" name="firstName" placeholder="Prénom">
                    <label class="input-group-text" for="lastName" hidden></label>
                    <input id="lastName" class="form-control" value="{{old('lastName', $value->nom ?? "")}}" type="text" name="lastName" placeholder="Nom">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="phoneNumber">Numéro de téléphone</label>
                    <input id="phoneNumber" class="form-control" value="{{old('phoneNumber', $value->telephone ?? "")}}" type="tel" name="phoneNumber" placeholder="(123) 456-7890">
                </div>
                <div class="w-100 pb-4"></div>

                <div class="col input-group">
                    <label class="input-group-text" for="streetNumber">Rue</label>
                    <input id="streetNumber" class="form-control" value="{{old('streetNumber', $value->no_rue ?? "")}}" type="number" name="streetNumber" placeholder="Numéro">
                    <label class="input-group-text" for="streetName" hidden></label>
                    <input id="streetName" class="form-control" value="{{old('streetName', $value->rue ?? "")}}" type="text" name="streetName" placeholder="Rue">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="email">Courriel</label>
                    <input id="email" class="form-control" value="{{old('email', $value->email ?? "")}}" type="email" name="email" placeholder="email@template.com">
                </div>
                <div class="w-100 pb-4"></div>

                <div class="col-5 input-group">
                    <label class="input-group-text" for="cityName">Ville</label>
                    <input id="cityName" class="form-control" value="{{old('cityName', $value->ville ?? "")}}" type="text" name="cityName">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="postalCode">Code Postal</label>
                    <input id="postalCode" class="form-control" value="{{old('postalCode', $value->code_postal ?? "")}}" type="text" name="postalCode" placeholder="A1A 1A1">
                </div>
                <div class="w-100 pb-4"></div>

                <div class="col input-group">
                    <label class="input-group-text" for="licenceNumber">Numéro de permis</label>
                    <input id="licenceNumber" class="form-control" value="{{old('licenceNumber', $value->no_permis ?? '')}}" type="text" name="licenceNumber">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="licenceExpirationDate">Date d'expiration du permis</label>
                    <input id="licenceExpirationDate" class="form-control" value="{{old('licenceExpirationDate', $value->date_expiration_permis ?? "")}}" type="date" name="licenceExpirationDate">
                </div>
                <div class="w-100 pb-4"></div>

                <div class="col input-group">
                    <label class="input-group-text" for="commission">Commission & Solde</label>
                    <input id="commission" class="form-control" value="{{old('commission', $value->commission ?? "")}}" type="number" step="0.01" name="commission" placeholder="Commission">
                    <label class="input-group-text" for="balance" hidden></label>
                    <input id="balance" class="form-control" value="{{old('balance', $value->solde ?? "")}}" type="number" name="balance" placeholder="Solde">
                </div>

                <div class="w-100 pb-4"></div>

                <div class="col input-group">
                    <label class="input-group-text" for="driverNo">Numéro</label>
                    <input id="driverNo" class="form-control" value="{{old('driverNo', $value->no_chauffeur ?? "")}}" type="number" name="driverNo" placeholder="Numéro">
                </div>
            </div>

            <div class="row">
                <div class="col-4"></div>
                <div class="col"><button type="submit" class="btn btn-lg btn-success w-25">{{$messageOnAction}}</button></div>
            </div>

        </form>
    </div>
@endsection

