@extends('layouts.base')
@section('title', "Formulaire de création de chauffeur")

@section('before-scripts')

@endsection

@section('body-content')
    <div class="container mb-5">
        @parent
        <form action="" method="post">
            <div class="row mb-4">
                <div class="col input-group">
                    <label class="input-group-text" for="firstName">Prénom & Nom</label>
                    <input id="firstName" class="form-control" type="text" name="firstName" placeholder="Prénom">
                    <label class="input-group-text" for="lastName" hidden></label>
                    <input id="lastName" class="form-control" type="text" name="lastName" placeholder="Nom">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="phoneNumber">Numéro de téléphone</label>
                    <input id="phoneNumber" class="form-control" type="tel" name="phoneNumber" placeholder="(123) 456-7890">
                </div>
                <div class="w-100 pb-4"></div>

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

                <div class="col input-group">
                    <label class="input-group-text" for="licenceNumber">Numéro de permis</label>
                    <input id="licenceNumber" class="form-control" type="text" name="licenceNumber">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="licenceNumber">Date d'expiration du permis</label>
                    <input id="licenceNumber" class="form-control" type="date" name="licenceNumber">
                </div>
                <div class="w-100 pb-4"></div>

                <div class="col input-group">
                    <label class="input-group-text" for="commission">Commission & Solde</label>
                    <input id="commission" class="form-control" type="number" name="commission" placeholder="Commission">
                    <label class="input-group-text" for="balance" hidden></label>
                    <input id="balance" class="form-control" type="number" name="balance" placeholder="Solde">
                </div>
            </div>

            <div class="row">
                <div class="col-4"></div>
                <div class="col"><button type="button" class="btn btn-lg btn-success w-25">Envoyer</button></div>
            </div>

        </form>
    </div>
@endsection

