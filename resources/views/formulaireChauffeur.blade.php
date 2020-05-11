@extends('layouts.base')
@section('title', "Formulaire pour les chauffeurs")

@section('body-content')
    <div class="container mb-5">
        @parent
        <form action="" method="post">
            <!-- chauffeur & taxi-->
            <div class="row justify-content-center">
                <div class="col input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0" for="driverNo">Numéro de conducteur</label>
                    <input id="driverNo" class="form-control font-weight-bold bg-transparent border-0" type="text" name="driverNo" minlength="1" readonly disabled value="{{Auth::id()}}">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="taxiNo">Numéro du taxi</label>
                    <input id="taxiNo" class="form-control" type="text" name="taxiNo" minlength="1">
                </div>
                <div class="w-100 pb-4"></div>
            </div>
            <!--Date-->
            <div class="row justify-content-center">
                <div class="col input-group">
                    <label class="input-group-text" for="dateStart_date">Date (Début)</label>
                    <input id="dateStart_date" class="form-control" type="date" name="dateStart_date" placeholder="jj/mm/aaaa">
                    <input id="dateStart_time" class="form-control" type="time" name="dateStart_time" placeholder="hh:mm">
                    <label class="input-group-text" for="dateStart_time" hidden></label>
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="dateEnd_date">Date (Fin)</label>
                    <input id="dateEnd_date" class="form-control" type="date" name="dateEnd_date" placeholder="jj/mm/aaaa">
                    <input id="dateEnd_time" class="form-control" type="time" name="dateEnd_time" placeholder="hh:mm">
                    <label class="input-group-text" for="dateEnd_time" hidden></label>
                </div>
                <div class="w-100 pb-4"></div>
            </div>
            <!--Recette-->
            <div class="row justify-content-center">
                    <div class="col-9 input-group">
                        <label class="input-group-text" for="startRecipe">Recette</label>
                        <input id="startRecipe" class="form-control" type="number" name="recetteInit" min="0" placeholder="Initiale" onchange="updateRealRecipe()">
                        <input id="finalRecipe" class="form-control" type="number" name="finalRecipe" min="0" placeholder="Finale" onchange="updateRealRecipe()">
                    </div>
                    <div class="col input-group">
                        <label class="input-group-text" for="fixPrice">Prix fixe</label>
                        <input id="fixPrice" class="form-control" type="number" name="fixPrice" min="0" onchange="updateRealRecipe()">
                    </div>
                    <div class="w-100 pb-4"></div>
            </div>
            <!--Recette réel-->
            <div class="row justify-content-center">
                <div class="col-3"></div>
                <div class="col-6 input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0" for="realRecipe">Recette réel</label>
                    <input id="realRecipe" class="form-control font-weight-bold bg-transparent border-0" type="number" name="realRecipe" readonly disabled onchange="updateSalary()">
                </div>
                <div class="w-100 pb-4"></div>
            </div>
            
            <!--Taximetre-->
            <div class="row justify-content-center">
                <h4 class="mx-auto pt-3">Nombre de kilomètre dans le taximètre</h4>
                <div class="w-100"></div>
                <div class="col input-group">
                    <label class="input-group-text" for="startingMillage">Départ</label>
                    <input id="startingMillage" class="form-control" type="number" name="startingMillage" onchange="setDifferenceOnMillage()">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="endingMillage">Arrivée</label>
                    <input id="endingMillage" class="form-control" type="number" name="endingMillage" onchange="setDifferenceOnMillage()">
                </div>
                <div class="col-3 input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0" for="totalMillage">Total</label>
                    <input id="totalMillage" class="form-control font-weight-bold bg-transparent border-0" type="number" name="totalMillage" readonly disabled>
                </div>
                <div class="w-100 pb-4"></div>
            </div>
            <!--millage pro-->
            <div class="row justify-content-center">
                <h4 class="mx-auto pt-3">Nombre de kilomètre effectué professionellement (dans la journée)</h4>
                <div class="w-100"></div>
                <div class="col input-group">
                    <label class="input-group-text" for="startingMileageLaden">Départ</label>
                    <input id="startingMileageLaden" class="form-control" type="number" name="startingMileageLaden" onchange="setDifferenceOnMillageLaden()">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="endingMileageLaden">Arrivée</label>
                    <input  id="endingMileageLaden" class="form-control" type="number" name="endingMileageLaden" onchange="setDifferenceOnMillageLaden()">
                </div>
                <div class="col-3 input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0" for="totalMileageLaden">Total</label>
                    <input id="totalMileageLaden" class="form-control font-weight-bold bg-transparent border-0" type="number" name="totalMileageLaden" readonly disabled>
                </div>
                <div class="w-100 pb-4"></div>
            </div>
            <!--nb client-->
            <div class="row justify-content-center">
                <h4 class="mx-auto pt-3">Nombre de clients (dans la journée)</h4>
                <div class="w-100"></div>
                <div class="col input-group">
                    <label class="input-group-text" for="startingAmountOfPassengers">Départ</label>
                    <input id="startingAmountOfPassengers" class="form-control" type="number" name="startingAmountOfPassengers" onchange="setDifferenceOnAmountOfPassengers()">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="endingAmountOrPassengers">Arrivée</label>
                    <input id="endingAmountOrPassengers" class="form-control" type="number" name="endingAmountOrPassengers" onchange="setDifferenceOnAmountOfPassengers()">
                </div>
                <div class="col-3 input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0" for="totalAmountOfPassengers">Total</label>
                    <input id="totalAmountOfPassengers" class="form-control font-weight-bold bg-transparent border-0" type="number" name="totalAmountOfPassengers" readonly disabled>
                </div>
                <div class="w-100 pb-4"></div>
            </div>
            <!-- millage auto-->
            <div class="row justify-content-center">
                <h4 class="mx-auto pt-3">Nombre de kilomètre de la voiture</h4>
                <div class="w-100"></div>
                <div class="col input-group">
                    <label class="input-group-text" for="startingMileageInVehicle">Départ</label>
                    <input id="startingMileageInVehicle" class="form-control" type="number" name="startingMileageInVehicle" onchange="setDifferenceOnMileageInVehicle()">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="endingMileageInVehicle">Arrivée</label>
                    <input id="endingMileageInVehicle" class="form-control" type="number" name="endingMileageInVehicle" onchange="setDifferenceOnMileageInVehicle()">
                </div>
                <div class="col-3 input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0" for="totalMileageInVehicle">Total</label>
                    <input id="totalMileageInVehicle" class="form-control font-weight-bold bg-transparent border-0" type="number" name="totalMileageInVehicle" min="0" readonly disabled>
                </div>
                <div class="w-100 pb-4"></div>
            </div>
            <!--salaire-->
            <div class="row justify-content-center">
                <div class="col-3"></div>
                <div class="col-6 input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0" for="salary">Salaire</label>
                    <input id="salary" class="form-control font-weight-bold bg-transparent border-0" type="number" name="salary" min="0" readonly disabled>
                </div>
                <div class="w-100 pb-4"></div>
            </div>
            <!--depense autre : gaz, credit, divers-->
            <div class="row justify-content-center">
                <div class="col input-group">
                    <label class="input-group-text" for="gaz">Gaz</label>
                    <input id="gaz" class="form-control" type="number" name="gaz" min="0">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="credit">Crédit</label>
                    <input id="credit" class="form-control" type="number" name="credit" min="0">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="various">Divers</label>
                    <input id="various" class="form-control" type="number" name="various" min="0">
                </div>
                <div class="w-100 pb-4"></div>
            </div>
            <!-- total  depense total net-->
            <div class="row justify-content-center">

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
            <div class="row mt-3">
                <div class="col-4"></div>
                <div class="col"><button type="button" class="btn btn-lg btn-success">Envoyer</button></div>
            </div>
        </form>
    </div>
@endsection

@section('after-scripts')
    <script>var commission = {{$commission??0.36}}</script>
    <script src="{{asset('js/formDriver.js')}}" defer></script>
@endsection
