@extends('layouts.base')
@section('title',"Ajouter un Taxi")

@section('body-content')
    @parent
    <form action="{{route('createTaxi')}}" method="post">
        @csrf
        <div class="container mb-5">
            <p>{{$errorMessage ?? ''}}</p>
            <h3 class=justify-content-center>Taxi</h3>
            <div class="row mb-4 justify-content-center">
                <div class="col input-group">
                    <label for="NoTaxi" class="input-group-text">Numéro Taxi</label>
                    <input id="NoTaxi" name="NoTaxi" class="form-control" type="text" minlength="4" value="{{ old('NoTaxi') }}" required>
                </div>
                <div class="col input-group">
                    <label for="Immat" class="input-group-text">Immatriculation</label>
                    <input id="immat" name="immat" class="form-control" type="text" minlength="4" value="{{old('immat')}}" required>
                </div>
                <div class="col input-group">
                    <label for="No Taxi" class="input-group-text">Assurance</label>
                    <input id="assurence" name="assurence" class="form-control" type="number" value="{{old('assurence')}}" required>
                </div>
            </div>
            <div class="row mb-4 justify-content-center">
                <div class="col input-group">
                    <label for="DateMiseCiruc" class="input-group-text">Date de mise en circulation du taxi</label>
                <input id="date_circ" name="date_circ" class="form-control" type="date" value="{{old('date_circ')}}" required>
                </div>
                <div class="col input-group">
                    <label for="DateMiseCiruc" class="input-group-text">Kilommetrage de la voiture</label>
                    <input id="kilo_voiture" name="kilo_voiture" class="form-control" min="0" type="number" value="{{old('kilo_voiture')}}" required>
                </div>
            </div>
            <div class="row mb-4 justify-content-center">
                <div class="col input-group"> 
                    <div class="mr-5 ml-4">
                        <input type="radio" class="form-check-input" name="petit" id="petit">
                        <label class="form-check-label" for="petit">Petite voiture</label>

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
                    <input type="number" name="NoTaximetre" min="0" class="form-control" value="{{old('NoTaximetre')}}" required>
                </div>
                <div class="col input-group">
                    <label for="NoTaximetre" class="input-group-text">Recette</label>
                <input type="number" name="recette_taximetre" min="0" class="form-control" value="{{old('recette_taximetre')}}" required>
                </div>

            </div>
            <div class="row mb-4 justify-content-center">
                <div class="col input-group">
                    <label for="NoTaximetre" class="input-group-text">Millage</label>
                <input type="number" name="millage_taximetre" min="0" class="form-control" value="{{old('millage_taximetre')}}" required>
                </div>
                <div class="col input-group">
                    <label for="NoTaximetre" class="input-group-text">Millage en charge</label>
                    <input type="number" name="millage_en_charge_taximetre" min="0" class="form-control" value="{{old('millage_en_charge_taximetre')}}" required>
                </div>
                <div class="col input-group">
                    <label for="NoTaximetre" class="input-group-text">Prise en charge</label>
                    <input type="number" name="prise_en_charge_taximetre" min="0" class="form-control" value="{{old('prise_en_charge_taximetre')}}" required>
                </div>
            </div>
            <div class="row mb-5 justify-content-center">
                <button class="btn btn-success">Crée</button>
            </div>
        </div>
    </form>
    
@endsection