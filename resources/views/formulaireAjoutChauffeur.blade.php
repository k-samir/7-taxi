@extends('layouts.base')
@section('title',"Formulaire d'ajout de chauffeur")

@section('before-scripts')

@endsection

@section('body-content')
    @parent
    <div class="container">
        <form action="" method="post">
            <div class="row">
                <div class="col-4 input-group">
                    <label class="input-group-text" for="lastName">Nom</label>
                    <input id="lastName" class="form-control" type="text" name="lastName">
                </div>
                <div class="col-4 input-group">
                    <label class="input-group-text" for="firstName">Prénom</label>
                    <input id="firstName" class="form-control" type="text" name="firstName">
                </div>
                <div class="w-100"></div>

                <div class="col input-group">
                    <label class="input-group-text" for="phoneNumber">Numéro de téléphone</label>
                    <input id="phoneNumber" class="form-control" type="tel" name="phoneNumber">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="streetNumber">Numéro de rue</label>
                    <input id="streetNumber" class="form-control" type="number" name="streetNumber">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="streetName">Rue</label>
                    <input id="streetName" class="form-control" type="text" name="streetName">
                </div>
                <div class="w-100"></div>

                <div class="col input-group">
                    <label class="input-group-text" for="cityName">Ville</label>
                    <input id="cityName" class="form-control" type="text" name="cityName">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="postalCode">Code Postal</label>
                    <input id="postalCode" class="form-control" type="text" name="postalCode">
                </div>
                <div class="w-100"></div>

                <div class="col input-group">
                    <label class="input-group-text" for="licenceNumber">Numéro de permis</label>
                    <input id="licenceNumber" class="form-control" type="text" name="licenceNumber">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="licenceNumber">Date d'expiration du permis</label>
                    <input id="licenceNumber" class="form-control" type="date" name="licenceNumber">
                </div>
                <div class="w-100"></div>

                <div class="col input-group">
                    <label class="input-group-text" for="commission">Commission</label>
                    <input id="commission" class="form-control" type="number" name="commission">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="balance">Solde</label>
                    <input id="balance" class="form-control" type="number" name="balance">
                </div>
            </div>

            <div class="row">
                <div class="col-4"></div>
                <div class="col"><button type="button" class="btn btn-success w-25">Envoyer</button></div>
            </div>

        </form>
    </div>
@endsection
