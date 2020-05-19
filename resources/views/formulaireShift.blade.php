@extends('layouts.base')
@section('title', "Formulaire pour les shifts")

@section('body-content')
    @parent
    <div class="container mb-5">
        <form method="POST" action="{{route("addConductorShift")}}">
        @csrf
        <!-- chauffeur & taxi-->
        <div class="row mb-4 justify-content-center">
            <div class="col input-group">
                <label class="input-group-text font-weight-bold bg-transparent border-0" for="driverNo">Numéro de conducteur</label>
                <input id="driverNo" class="form-control font-weight-bold bg-transparent border-0" value="{{\Illuminate\Support\Facades\Auth::id()}}" type="text" name="driverNo" minlength="1" readonly disabled>
            </div>
            <div class="col input-group">
                <label class="input-group-text" for="taxiNo">Numéro du taxi</label>
                <input id="taxiNo" class="form-control" value="{{old('taxiNo')}}" type="text" name="taxiNo" min="0" required>
            </div>
            <div class="w-100"></div>
            <div class="col"></div>
            <div class="col-5"><span class="text-danger text-sm-right">@error('taxiNo'){{$message}}@enderror</span></div>
        </div>
        <!--Date-->
        <div class="row mb-4 justify-content-center">
            <div class="col-5 input-group">
                <label class="input-group-text" for="dateStart">Date (Début)</label>
                <input id="dateStart" class="form-control" value="{{old('dateStart', $todayDate)}}" type="datetime-local" name="dateStart" placeholder="jj/mm/aaaa hh:mm" required>
            </div>
            <div class="col-5 input-group">
                <label class="input-group-text" for="dateEnd">Date (Fin)</label>
                <input id="dateEnd" class="form-control" value="{{old('dateEnd', $todayDate)}}" type="datetime-local" name="dateEnd" placeholder="jj/mm/aaaa hh:mm" required>
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
        <!--Taximètre-->
        <div class="row mb-4 justify-content-center">
            <h4 class="mx-auto pt-3">Nombre de kilomètre dans le taximètre</h4>
            <div class="w-100"></div>
            <div class="col input-group">
                <label class="input-group-text" for="startingMillage">Départ</label>
                <input id="startingMillage" class="form-control" value="{{old('startingMillage')}}" type="number" name="startingMillage" required oninput="setDifferenceOnMillage()" min="0">
            </div>
            <div class="col input-group">
                <label class="input-group-text" for="endingMillage">Arrivée</label>
                <input id="endingMillage" class="form-control" value="{{old('endingMillage')}}" min="0" type="number" name="endingMillage" required oninput="setDifferenceOnMillage()">
            </div>
            <div class="col-3 input-group">
                <label class="input-group-text font-weight-bold bg-transparent border-0">Total</label>
                <input id="totalMillage" class="form-control font-weight-bold bg-transparent border-0" type="number" readonly disabled>
            </div>
            <div class="w-100"></div>
        </div>

        <!--Kimolétrage professionnel-->
        <div class="row mb-4 justify-content-center">
            <h4 class="mx-auto pt-3">Nombre de kilomètre effectué professionellement (dans la journée)</h4>
            <div class="w-100"></div>
            <div class="col input-group">
                <label class="input-group-text" for="startingMileageLaden">Départ</label>
                <input id="startingMileageLaden" class="form-control" value="{{old('startingMileageLaden')}}" min="0" type="number" name="startingMileageLaden" required oninput="setDifferenceOnMillageLaden()">
            </div>
            <div class="col input-group">
                <label class="input-group-text" for="endingMileageLaden">Arrivée</label>
                <input id="endingMileageLaden" class="form-control" value="{{old('endingMileageLaden')}}" type="number" min="0" name="endingMileageLaden" required oninput="setDifferenceOnMillageLaden()">
            </div>
            <div class="col-3 input-group">
                <label class="input-group-text font-weight-bold bg-transparent border-0">Total</label>
                <input id="totalMileageLaden" class="form-control font-weight-bold bg-transparent border-0" type="number" readonly disabled>
            </div>
            <div class="w-100"></div>
        </div>
        <!--Nombre de clients-->
        <div class="row mb-4 justify-content-center">
            <h4 class="mx-auto pt-3">Nombre de clients (dans la journée)</h4>
            <div class="w-100"></div>
            <div class="col input-group">
                <label class="input-group-text" for="startingAmountOfPassengers">Départ</label>
                <input id="startingAmountOfPassengers" class="form-control" value="{{old('startingAmountOfPassengers')}}" min="0" type="number" name="startingAmountOfPassengers" required oninput="setDifferenceOnAmountOfPassengers()">
            </div>
            <div class="col input-group">
                <label class="input-group-text" for="endingAmountOrPassengers">Arrivée</label>
                <input id="endingAmountOrPassengers" class="form-control" value="{{old('endingAmountOrPassengers')}}" type="number" min="0" name="endingAmountOrPassengers" required oninput="setDifferenceOnAmountOfPassengers()">
            </div>
            <div class="col-3 input-group">
                <label class="input-group-text font-weight-bold bg-transparent border-0">Total</label>
                <input id="totalAmountOfPassengers" class="form-control font-weight-bold bg-transparent border-0" type="number" readonly disabled>
            </div>
            <div class="w-100"></div>
            <div class="col"><span class="text-danger text-sm-right">@error('startingAmountOfPassengers'){{$message}}@enderror</span></div>
            <div class="col"><span class="text-danger text-sm-right">@error('endingAmountOrPassengers'){{$message}}@enderror</span></div>
            <div class="col-3"></div>
        </div>
        <!--Kilométrage de voiture-->
        <div class="row mb-4 justify-content-center">
            <h4 class="mx-auto pt-3">Nombre de kilomètre de la voiture</h4>
            <div class="w-100"></div>
            <div class="col input-group">
                <label class="input-group-text" for="startingMileageInVehicle">Départ</label>
                <input id="startingMileageInVehicle" class="form-control" value="{{old('startingMileageInVehicle')}}" min="0" type="number" name="startingMileageInVehicle" required oninput="setDifferenceOnMileageInVehicle()">
            </div>
            <div class="col input-group">
                <label class="input-group-text" for="endingMileageInVehicle">Arrivée</label>
                <input id="endingMileageInVehicle" class="form-control" value="{{old('endingMileageInVehicle')}}" type="number" min="0" name="endingMileageInVehicle" required oninput="setDifferenceOnMileageInVehicle()">
            </div>
            <div class="col-3 input-group">
                <label class="input-group-text font-weight-bold bg-transparent border-0">Total</label>
                <input id="totalMileageInVehicle" class="form-control font-weight-bold bg-transparent border-0" type="number" min="0" readonly disabled>
            </div>
            <div class="w-100"></div>
        </div>
        <!--Salaire-->
        <div class="row mb-4 justify-content-center">
            <div class="col-3"></div>
            <div class="col-6 input-group">
                <label class="input-group-text font-weight-bold bg-transparent border-0">Salaire</label>
                <input id="salary" class="form-control font-weight-bold bg-transparent border-0" type="number" readonly disabled>
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
                <input id="totalExpenses" class="form-control font-weight-bold bg-transparent border-0" type="number" name="totalExpenses" readonly disabled>
            </div>
            <div class="col input-group">
                <label class="input-group-text font-weight-bold bg-transparent border-0" for="totalNet">Total Net</label>
                <input id="totalNet" class="form-control font-weight-bold bg-transparent border-0" type="number" name="totalNet" readonly disabled>
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
    <script>var commission = {{$commission??0.36}}</script>
    <script src="{{asset('js/formDriver.js')}}" defer></script>
@endsection
