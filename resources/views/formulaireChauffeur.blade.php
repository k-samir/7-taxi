@extends('layouts.base')
@section('title', "Formulaire pour les chauffeurs")

@section('body-content')
    <div class="container mb-5">
        @parent
        <form action="" method="post">
            <div class="row mb-4 justify-content-center">
                <div class="col input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0" for="user">Numéro d'utilisateur</label>
                    <input id="user" class="form-control font-weight-bold bg-transparent border-0" type="text" name="user" readonly disabled>
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="numTaxi">Numéro du taxi</label>
                    <input id="numTaxi" class="form-control" type="text" name="numTaxi">
                </div>
                <div class="col-5 input-group">
                    <label class="input-group-text" for="date_date">Date</label>
                    <input id="date_date" class="form-control" type="date" name="date_date" placeholder="jj/mm/aaaa">
                    <input id="date_time" class="form-control" type="time" name="date_time" placeholder="hh:mm">
                    <label class="input-group-text" for="date_time" hidden></label>
                </div>
                <div class="w-100 pb-4"></div>

                <div class="col-8 input-group">
                    <label class="input-group-text" for="startRecipe">Recette</label>
                    <input id="startRecipe" class="form-control" type="number" name="recetteInit" placeholder="Initiale" onchange="updateRealRecipe()">
                    <label class="input-group-text" for="finalRecipe" hidden></label>
                    <input id="finalRecipe" class="form-control" type="number" name="finalRecipe" placeholder="Finale" onchange="updateRealRecipe()">
                </div>
                <div class="col"></div>
                <div class="w-100 pb-2"></div>
                <div class="col input-group">
                    <label class="input-group-text" for="fixPrice">Prix fixe</label>
                    <input id="fixPrice" class="form-control" type="number" name="fixPrice" onchange="updateRealRecipe()">
                </div>
                <div class="col input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0" for="realRecipe">Recette réel</label>
                    <input id="realRecipe" class="form-control font-weight-bold bg-transparent border-0" type="number" name="realRecipe" readonly disabled onchange="updateSalary()">
                </div>
                <div class="w-100 pb-4"></div>

                <h4 class="mx-auto pt-3">Nombre de kilomètre dans le taximètre</h4>
                <div class="w-100"></div>
                <div class="col-4 input-group">
                    <label class="input-group-text" for="startingMillage">Début</label>
                    <input id="startingMillage" class="form-control" type="number" name="startingMillage" onchange="setDifferenceOnMillage()">
                </div>
                <div class="col-4 input-group">
                    <label class="input-group-text" for="endingMillage">Arrivée</label>
                    <input id="endingMillage" class="form-control" type="number" name="endingMillage" onchange="setDifferenceOnMillage()">
                </div>
                <div class="col-4 input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0" for="totalMillage">Total</label>
                    <input id="totalMillage" class="form-control font-weight-bold bg-transparent border-0" type="number" name="totalMillage" readonly disabled>
                </div>
                <div class="w-100 pb-4"></div>

                <h4 class="mx-auto pt-3">Nombre de kilomètre effectué professionellement (dans la journée)</h4>
                <div class="w-100"></div>
                <div class="col input-group">
                    <label class="input-group-text" for="startingMileageLaden">Début</label>
                    <input id="startingMileageLaden" class="form-control" type="number" name="startingMileageLaden" onchange="setDifferenceOnMillageLaden()">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="endingMileageLaden">Fin</label>
                    <input  id="endingMileageLaden" class="form-control" type="number" name="endingMileageLaden" onchange="setDifferenceOnMillageLaden()">
                </div>
                <div class="col-3 input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0" for="totalMileageLaden">Total</label>
                    <input id="totalMileageLaden" class="form-control font-weight-bold bg-transparent border-0" type="number" name="totalMileageLaden" readonly disabled>
                </div>
                <div class="w-100 pb-4"></div>

                <h4 class="mx-auto pt-3">Nombre de clients (dans la journée)</h4>
                <div class="w-100"></div>
                <div class="col input-group">
                    <label class="input-group-text" for="startingAmountOfPassengers">Début</label>
                    <input id="startingAmountOfPassengers" class="form-control" type="number" name="startingAmountOfPassengers" onchange="setDifferenceOnAmountOfPassengers()">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="endingAmountOrPassengers">Fin</label>
                    <input id="endingAmountOrPassengers" class="form-control" type="number" name="endingAmountOrPassengers" onchange="setDifferenceOnAmountOfPassengers()">
                </div>
                <div class="col-3 input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0" for="totalAmountOfPassengers">Total</label>
                    <input id="totalAmountOfPassengers" class="form-control font-weight-bold bg-transparent border-0" type="number" name="totalAmountOfPassengers" readonly disabled>
                </div>
                <div class="w-100 pb-4"></div>


                <h4 class="mx-auto pt-3">Nombre de kilomètre de la voiture</h4>
                <div class="w-100"></div>
                <div class="col input-group">
                    <label class="input-group-text" for="startingMileageInVehicle">Début</label>
                    <input id="startingMileageInVehicle" class="form-control" type="number" name="startingMileageInVehicle" onchange="setDifferenceOnMillage()">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="endingMileageInVehicle">Fin</label>
                    <input id="endingMileageInVehicle" class="form-control" type="number" name="endingMileageInVehicle" onchange="setDifferenceOnMillage()">
                </div>
                <div class="col-3 input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0" for="totalMileageInVehicle">Total</label>
                    <input id="totalMileageInVehicle" class="form-control font-weight-bold bg-transparent border-0" type="number" name="totalMileageInVehicle" readonly disabled>
                </div>
                <div class="w-100 pb-4"></div>

                <div class="col input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0" for="salary">Salaire</label>
                    <input id="salary" class="form-control font-weight-bold bg-transparent border-0" type="number" name="salary" readonly disabled>
                </div>
                <div class="w-100 pb-4"></div>

                <div class="col input-group">
                    <label class="input-group-text" for="gaz">Gaz</label>
                    <input id="gaz" class="form-control" type="number" name="gaz">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="credit">Crédit</label>
                    <input id="credit" class="form-control" type="number" name="credit">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="various">Divers</label>
                    <input id="various" class="form-control" type="number" name="various">
                </div>
                <div class="w-100 pb-4"></div>

                <div class="col input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0" for="totalExpenses">Total des dépense</label>
                    <input id="totalExpenses" class="form-control font-weight-bold bg-transparent border-0" type="number" name="totalExpenses" readonly disabled>
                </div>
                <div class="col input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0" for="totalNet">Total Net</label>
                    <input id="totalNet" class="form-control font-weight-bold bg-transparent border-0" type="number" name="totalNet" readonly disabled>
                </div>

            </div>

            <div class="row">
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
