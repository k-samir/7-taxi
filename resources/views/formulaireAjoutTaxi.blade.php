@extends('layouts.base')
@section('title',"Ajouter un Taxi")

@section('body-content')
    @parent
    <form action="" method="post">
        @csrf
        <div class="container mb-5">
            <div class="row mb-4 justify-content-center">
                <div class="col input-group">
                    <label for="No Taxi" class="input-group-text">Numéro du taxi</label>
                    <input id="NoTaxi" class="form-control" type="number" minlength="4">
                </div>
                <div class="col input-group">
                    <label for="Immat" class="input-group-text">Numéro d'immatriculation</label>
                    <input id="NoTaxi" class="form-control" type="text" minlength="4">
                </div>
                <div class="col input-group">
                    <label for="No Taxi" class="input-group-text">Numéro du assurance</label>
                    <input id="NoTaxi" class="form-control" type="number">
                </div>
            </div>
            <div class="row mb-4 justify-content-center">
                <div class="col input-group">
                    <label for="DateMiseCiruc" class="input-group-text">Date de mise en circulation du taxi</label>
                    <input id="NoTaxi" class="form-control" type="date">
                </div>
            </div>
            <div class="row mb-4 justify-content-center">
                <div class="col input-group">
                    <label for="NoTaximetre" class="input-group-text">Numéro du taximetre utilisé</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col input-group"> 
                    <label for="NbPlace" class="input-group-text">Nombre de place</label>
                    <input type="number" name="nbPlace" id="nbPlace" maxlength="1">
                </div>
            </div>
            <div class="row mb-5 justify-content-center">
                <button class="btn btn-success">Crée</button>
            </div>
        </div>
    </form>
    
@endsection