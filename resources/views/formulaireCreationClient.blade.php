@extends('layouts.base')
@section('title', "Formulaire de création de client")

@section('body-content')
    <div class="container mb-5">
        @parent
        <form method="POST" action="{{route("createClient")}}">
            @csrf

            <div class="row mb-4 justify-content-center">
                <div class="col input-group">
                    <label class="input-group-text" for="firstName">Prénom & Nom</label>
                    <input id="firstName" class="form-control" value="{{old('firstName')}}" type="text" name="firstName" placeholder="Prénom" required>
                    <label class="input-group-text" for="lastName" hidden></label>
                    <input id="lastName" class="form-control" value="{{old('lastName')}}" type="text" name="lastName" placeholder="Nom" required>
                </div>
                <div class="w-100"></div>
                <div class="col"><span class="text-danger text-sm-right">@error('firstName'){{$message}}@enderror</span></div>
                <div class="col"><span class="text-danger text-sm-right">@error('lastName'){{$message}}@enderror</span></div>
            </div>

        </form>
    </div>
@endsection
