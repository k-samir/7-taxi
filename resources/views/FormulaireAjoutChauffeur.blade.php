@extends('layouts.base')
@section('title',"Formulaire d'ajout de chauffeur")

@section('before-scripts')
  
@endsection

@section('body-content')
    @parent
    <div class="container">
    <form action="" method="post">
            <div class="row">
                <div class="col">
                    <div class="group-control">
                        <label for="numTaxi">Nom</label>
                        <input type="text" name="nomChauffeur" id="nomChauffeur" class="form-control" >
                    </div>
                </div>
                <div class="col">
                    <div class="group-control">
                        <label for="numTaxi">Prénom</label>
                        <input type="text" name="prenomChauffeur" class="form-control">
                    </div>
                </div>
                <div class="col">
              
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="group-control">
                        <label for="numTaxi">Numéro de téléphone</label>
                        <input type="text" name="phoneChauffeur" id="phoneChauffeur"class="form-control" >
                    </div>
                </div>
                <div class="col">
                    <div class="group-control">
                        <label for="numTaxi">Numéro de rue</label>
                        <input type="number" name="numeroRue" id="numeroRue" class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="group-control">
                        <label for="diff">Rue</label>
                        <input type="text" name="rueChauffeur" id="rueChauffeur" class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="group-control">
                        <label for="diff">Ville</label>
                        <input type="text" name="ville" id="ville" class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="group-control">
                        <label for="diff">Code Postale</label>
                        <input type="text" name="codePostale" id="codePostale" class="form-control">
                    </div>
                </div>
        </div>
        <div class="row">
                <div class="col">
                    <div class="group-control">
                        <label for="numTaxi">Numéro de permis</label>
                        <input type="text" name="numPermis" id="numPermis" class="form-control" >
                    </div>
                </div>
                <div class="col">
                <div class="group-control">
                        <label for="numTaxi">Date d'expiration du permis</label>
                        <input type="datetime-local" name="datePermisExpiration" class="form-control" >
                    </div>
                </div>
                <div class="col">
                <div class="group-control">
                        <label for="numTaxi">Commission</label>
                        <input type="number" name="commission" class="form-control">
                    </div>
                </div>
            </div>
        <button type="button" class="btn btn-success mt-3" >Envoyer</button>
    </form>
    </div>
    @endsection
    