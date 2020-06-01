@extends('layouts.base')
@section('title', "Formulaire d'ajout de shifts")
@section('styles')
    <style>
        #center {
            padding-left: 70px;
        }
    </style>
@endsection

@section('body-content')
    @parent
    <div class="container mb-5">
        <form method="POST" action="{{route("addConductorShift")}}" name="form_shift">
        @csrf
        <!-- chauffeur & taxi-->
        <div class="row mb-4 justify-content-center">
            <div class="col input-group">
                <label class="input-group-text" for="driverNo">Chauffeur</label>
                <select class="form-control" name="selectChauffeur" id="selectChauffeur" onchange="updateRealRecipe()">
                    @foreach ($chauffeurs as $chauffeur)
                        <option commission={{$chauffeur->commission}}> {{$chauffeur->prenom ." ".$chauffeur->nom}} </option>
                    @endforeach
                </select>
            </div>
            <div class="col input-group">
                <label class="input-group-text" for="driverNo">Taxi</label>
            <select class="form-control" name="taxiNo">
                @foreach($taxis as $taxi)
                    <option>{{ $taxi->no_taxi }}</option>
                @endforeach
            </select>
            </div>
            <div class="w-100"></div>
        </div>
        <!--Date-->
        <div class="row mb-4">
            <div class="col input-group">
                <label class="input-group-text" for="dateStart">Date (Début)</label>
                <input id="dateStart" class="form-control" value="{{old('dateStart', $todayDate)}}" type="datetime-local" name="dateStart" placeholder="jj/mm/aaaa hh:mm" onblur="dateVerification()" required>
            </div>
            <div class="col input-group">
                <label class="input-group-text" for="dateEnd">Date (Fin)</label>
                <input id="dateEnd" class="form-control" value="{{old('dateEnd', $todayDate)}}" type="datetime-local" name="dateEnd" placeholder="jj/mm/aaaa hh:mm" onblur="dateVerification()" required>
            </div>
            <div class="w-100"></div>
            <div class="col-5"><span class="text-danger text-sm-right">@error('dateStart'){{$message}}@enderror</span></div>
            <div class="col-5"><span class="text-danger text-sm-right">@error('dateEnd'){{$message}}@enderror</span></div>
        </div>
        <!--Recette-->
        <div class="row mb-4 justify-content-center">
            <div class="col-9 input-group">
                <label class="input-group-text" for="startRecipe">Recette</label>
                <input id="startRecipe" class="form-control" value="{{old('startRecipe')}}" type="number" name="startRecipe" min="0" placeholder="Initiale" required oninput="updateRealRecipe()">
                <label class="input-group-text" for="finalRecipe" hidden></label>
                <input id="finalRecipe" class="form-control" value="{{old('finalRecipe')}}" type="number" name="finalRecipe" min="0" placeholder="Finale" required oninput="updateRealRecipe()">
            </div>
            <div class="col input-group">
                <label class="input-group-text" for="fixPrice">Prix fixe</label>
                <input id="fixPrice" class="form-control" value="{{old('fixPrice')}}" type="number" name="fixPrice" min="0" required oninput="updateRealRecipe()">
            </div>
            <div class="w-100"></div>
        </div>
        <!--Recette réelle-->
        <div class="row mb-4 justify-content-center">
            <div class="col-3"></div>
            <div class="col-6 input-group">
                <label class="input-group-text font-weight-bold bg-transparent border-0">Recette réelle</label>
                <input id="realRecipe" class="form-control font-weight-bold bg-transparent border-0" type="number" readonly disabled>
            </div>
            <div class="w-100"></div>
            <div class="col-3"></div>
        </div>

        <table id="kilometrage-values" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col" id="center">Départ</th>
                    <th scope="col" id="center" class="mx-auto">Arrivée</th>
                    <th scope="col" class="pl-0">Différence</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Millage</th>
                    <td><input id="startingMillage" class="form-control w-75" type="number" name="startingMillage" oninput="setDifferenceOnMillage()" required></td>
                    <td><input id="endingMillage" class="form-control w-75" type="number" name="endingMillage" oninput="setDifferenceOnMillage()" required></td>
                    <td><label id="totalMillage" type="number"></label></td>
                </tr>
                <tr>
                    <th scope="row">Millage en charge</th>
                    <td><input id="startingMileageLaden" class="form-control w-75" type="number" name="startingMileageLaden" oninput="setDifferenceOnMillageLaden()" required></td>
                    <td><input id="endingMileageLaden" class="form-control w-75" type="number" name="endingMileageLaden" oninput="setDifferenceOnMillageLaden()" required></td>
                    <td><label id="totalMileageLaden" type="number"></label></td>
                </tr>
                <tr>
                    <th scope="row">Prise en charge</th>
                    <td><input id="startingAmountOfPassengers" class="form-control w-75" type="number" name="startingAmountOfPassengers" oninput="setDifferenceOnAmountOfPassengers()" required></td>
                    <td><input id="endingAmountOrPassengers" class="form-control w-75" type="number" name="endingAmountOrPassengers" oninput="setDifferenceOnAmountOfPassengers()" required></td>
                    <td><label id="totalAmountOfPassengers" type="number"></label></td>
                </tr>
                <tr>
                    <th scope="row">Millage auto</th>
                    <td><input id="startingMileageInVehicle" class="form-control w-75" type="number" name="startingMileageInVehicle" oninput="setDifferenceOnMileageInVehicle()" required></td>
                    <td><input id="endingMileageInVehicle" class="form-control w-75" type="number" name="endingMileageInVehicle" oninput="setDifferenceOnMileageInVehicle()" required></td>
                    <td><label id="totalMileageInVehicle" type="number"></label></td>
                </tr>
            </tbody>
        </table>
        <!--Salaire-->
        <div class="row mb-4 justify-content-center">
            <div class="col-3"></div>
            <div class="col-6 input-group">
                <label class="input-group-text font-weight-bold bg-transparent border-0">Salaire</label>
                <input id="salary" class="form-control font-weight-bold bg-transparent border-0" type="number" step="0.01" readonly disabled>
            </div>
        </div>
        <!--Dépenses(gaz, credit, divers)-->
        <div class="row mb-4 justify-content-center">
            <div class="col input-group">
                <label class="input-group-text" for="gaz">Gaz</label>
                <input id="gaz" class="form-control" value="{{old('gaz')}}" type="number" name="gaz" min="0" oninput="updateTotalDepense()">
            </div>
            <div class="col input-group">
                <label class="input-group-text" for="credit">Crédit</label>
                <input id="credit" class="form-control" value="{{old('credit')}}" type="number" name="credit" min="0" oninput="updateTotalDepense()">
            </div>
            <div class="col input-group">
                <label class="input-group-text" for="various">Divers</label>
                <input id="various" class="form-control" value="{{old('various')}}" type="number" name="various" min="0" oninput="updateTotalDepense()">
            </div>
            <div class="w-100"></div>
            <div class="col"><span class="text-danger text-sm-right">@error('gaz'){{$message}}@enderror</span></div>
            <div class="col"><span class="text-danger text-sm-right">@error('credit'){{$message}}@enderror</span></div>
            <div class="col"><span class="text-danger text-sm-right">@error('various'){{$message}}@enderror</span></div>
        </div>
        <!--Totaux (dépense/net)-->
        <div class="row mb-4 justify-content-center">
            <div class="col input-group">
                <label class="input-group-text font-weight-bold bg-transparent border-0" for="totalExpenses">Total des dépense</label>
                <input id="totalExpenses" class="form-control font-weight-bold bg-transparent border-0" type="number" step="0.01" name="totalExpenses" readonly disabled>
            </div>
            <div class="col input-group">
                <label class="input-group-text font-weight-bold bg-transparent border-0" for="totalNet">Total Net</label>
                <input id="totalNet" class="form-control font-weight-bold bg-transparent border-0" type="number" step="0.01" name="totalNet" readonly disabled>
            </div>
        </div>
        <!--Envoyer-->
        <div class="row">
            <div class="col-4"></div>
            <div class="col"><button type="submit" class="btn btn-lg btn-success">Envoyer</button></div>
        </div>
    </form>
    </div>
@endsection

@section('after-scripts')
    <script src="{{asset('js/formDriver.js')}}" defer></script>
@endsection
