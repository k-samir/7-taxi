@extends('layouts.base')
@section('title',"Ajouter un Taxi")

@section('body-content')
    @parent
    <form action="" method="post">
        @csrf
        <div class="container mb-5">
            <h3 class=justify-content-center>Taxi</h3>
            <div class="row mb-4 justify-content-center">
                <div class="col input-group">
                    <label for="Immat" class="input-group-text">Numéro Taxi</label>
                    <input id="NoTaxi" class="form-control" type="text" minlength="4">
                </div>
                <div class="col input-group">
                    <label for="Immat" class="input-group-text">Immatriculation</label>
                    <input id="NoTaxi" class="form-control" type="text" minlength="4">
                </div>
                <div class="col input-group">
                    <label for="No Taxi" class="input-group-text">Assurance</label>
                    <input id="NoTaxi" class="form-control" type="number">
                </div>
            </div>
            <div class="row mb-4 justify-content-center">
                <div class="col input-group">
                    <label for="DateMiseCiruc" class="input-group-text">Date de mise en circulation du taxi</label>
                    <input id="NoTaxi" class="form-control" type="date">
                </div>
                <div class="col input-group">
                    <label for="DateMiseCiruc" class="input-group-text">Kilommetrage de la voiture</label>
                    <input id="NoTaxi" class="form-control" min="0" type="number">
                </div>
            </div>
            <div class="row mb-4 justify-content-center">
                <div class="col input-group"> 
                    <div class="mr-5 ml-4">
                        <input type="radio" class="form-check-input" name="petit" id="petit">
                        <label class="form-check-label" for="petit">Petit voiture</label>

                    </div>
                    <div>
                        <input type="radio" class="form-check-input" name="grand" id="grand">
                        <label class="form-check-label" for="grand">Grande voiture</label>
                    </div>
                </div>
            </div>
            <h4>Taximetre</h4>
            <div class="row mb-4 justify-content-center">
                <div class="col input-group">
                    <label for="NoTaximetre" class="input-group-text">Numéro du taximetre</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col input-group">
                    <label for="NoTaximetre" class="input-group-text">Recette</label>
                    <input type="number" min="0" class="form-control">
                </div>

            </div>
            <div class="row mb-4 justify-content-center">
                <div class="col input-group">
                    <label for="NoTaximetre" class="input-group-text">Millage</label>
                    <input type="number" min="0" class="form-control">
                </div>
                <div class="col input-group">
                    <label for="NoTaximetre" class="input-group-text">Millage en charge</label>
                    <input type="number" min="0" class="form-control">
                </div>
                <div class="col input-group">
                    <label for="NoTaximetre" class="input-group-text">Prise en charge</label>
                    <input type="number" min="0" class="form-control">
                </div>
            </div>
            <div class="row mb-5 justify-content-center">
                <button class="btn btn-success">Crée</button>
            </div>
        </div>
    </form>
    
@endsection