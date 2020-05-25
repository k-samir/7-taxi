@extends('layouts.base')
@section('title',"Ajouter un Taxi")

@section('body-content')
    @parent
    <p>{{$value->no_taxi ?? ''}}</p>
    <form action="{{$routeOnAction}}" method="post">
        @csrf
        <div class="container mb-5">
            <p>{{$errorMessage ?? ''}}</p>
            <h3 class=justify-content-center>Taxi</h3>
            <div class="row justify-content-center">
                <div class="col input-group">
                    <label for="noTaxi" class="input-group-text">Numéro</label>
                    <input id="noTaxi" class="form-control" name="NoTaxi" type="text" minlength="4" value="{{ old('noTaxi', '') }}" required>
                </div>
                <div class="col input-group">
                    <label for="immatriculation" class="input-group-text">Immatriculation</label>
                    <input id="immatriculation" class="form-control" name="immatriculation" type="text" minlength="4" value="{{old('immatriculation', '')}}" required>
                </div>
                <div class="col input-group">
                    <label for="assurance" class="input-group-text">Assurance</label>
                    <input id="assurance" class="form-control" name="assurance" type="number" value="{{old('assurance', '')}}" required>
                </div>
            </div>
            <div class="w-100 pb-4"></div>
            <div class="row">
                <div class="col input-group">
                    <label for="circulationDate" class="input-group-text">Date de mise en circulation</label>
                    <input id="circulationDate" class="form-control" name="circulationDate" type="date" value="{{old('circulationDate')}}" placeholder="jj/mm/aaaa" required>
                </div>
                <div class="col input-group">
                    <label for="carMileage" class="input-group-text">Kilométrage</label>
                    <input id="carMileage" class="form-control" name="carMileage" min="0" type="number" value="{{old('carMileage', '')}}" required>
                </div>
            </div>
            <div class="w-100 pb-4"></div>
            <div class="row justify-content-center">
                <div class="col"></div>
                <div class="col-5 form-check-inline pl-3">
                    <div class="input-group-text">Taille</div>
                    <div class="form-check">
                        <input id="smallCarSize" class="form-check-input" type="radio" name="carSize" value="1" checked>
                        <label class="form-check-label" for="smallCarSize">Petite</label>
                    </div>
                    <div class="form-check">
                        <input id="bigCarSize" class="form-check-input" type="radio" name="carSize" value="2">
                        <label class="form-check-label" for="bigCarSize">Grande</label>
                    </div>
                </div>
                <div class="col"></div>
            </div>
            <div class="w-100 pb-4"></div>
            <h4>Taximetre</h4>
            <div class="row justify-content-center">
                <div class="col input-group">
                    <label class="input-group-text" for="taximeterNo">Numéro</label>
                    <input id="taximeterNo" class="form-control" type="number" name="taximeterNo" min="0" value="{{old('taximeterNo', '')}}" required>
                </div>
                <div class="col input-group">
                    <label for="taximeterRecipe" class="input-group-text">Recette</label>
                    <input id="taximeterRecipe" class="form-control" type="number" name="taximeterRecipe" min="0" value="{{old('recette_taximetre', '')}}" required>
                </div>
            </div>
            <div class="w-100 pb-4"></div>
            <div class="row justify-content-center">
                <div class="col input-group">
                    <label class="input-group-text" for="taximeterMileage">Kilométrage</label>
                    <input id="taximeterMileage" class="form-control" type="number" name="taximeterMileage" min="0" value="{{old('millage_taximetre', '')}}" required>
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="taximeterMileageLaden">Kilométrage en charge</label>
                    <input id="taximeterMileageLaden" class="form-control" type="number" name="taximeterMileageLaden" min="0" value="{{old('taximeterMileageLaden', '')}}" required>
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="taximeterAmountOfCourses">Prise en charge</label>
                    <input id="taximeterAmountOfCourses" class="form-control" type="number" name="taximeterAmountOfCourses" min="0" value="{{old('taximeterAmountOfCourses', '')}}" required>
                </div>
            </div>
            <div class="w-100 pb-4"></div>
            <div class="row mb-5 justify-content-center">
                <button class="btn btn-success"> {{$messageOnAction}} </button>
            </div>
        </div>
    </form>

@endsection
