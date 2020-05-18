@extends('layouts.base')
@section('title')
    Formulaire de {{$type}} de tarif fix @if(isset($id))(Id: {{$id}})@endif
@endsection

@section('body-content')
    @parent
    <div class="container mb-5">
        <form method="post" action="{{$routeOnAction}}">
            @csrf
            <div class="row mb-4 justify-content-center">
                <div class="col-4 input-group">
                    <label class="input-group-text" for="startingLocation">Lieux</label>
                    <input id="startingLocation" class="form-control" value="{{old('startingLocation', $startingLocation ?? "")}}" maxlength="255" type="number" name="startingLocation" placeholder="Départ" required>
                    <label class="input-group-text" for="endingLocation" hidden>Lieux</label>
                    <input id="endingLocation" class="form-control" value="{{old('endingLocation', $endingLocation ?? "")}}" maxlength="255" type="number" name="startingLocation" placeholder="Arrivé" required>
                </div>
                <div class="w-100 pb-4"></div>
                <div class="col-4 input-group">
                    <label class="input-group-text" for="amount">Montant</label>
                    <input id="amount" class="form-control" value="{{old('amount', $amount ?? "")}}" type="number" maxlength="7" name="amount" placeholder="Montant" required>
                </div>
                <div class="w-100 pb-4"></div>

                <div class="col-4"></div>
                <div class="col"><button type="button" class="btn btn-lg btn-success w-25">{{$messageOnAction}}</button></div>


            </div>
        </form>
    </div>
@endsection
