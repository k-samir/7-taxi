@extends('layouts.base')
@section('title', "Formulaire pour les chauffeurs")

@section('body-content')
    <div class="container mb-5">
        @parent
        <form action="" method="post">
            <div class="row mb-4 justify-content-center">
                <div class="col input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0">Numéro de conducteur</label>
                    <input id="driverNo" class="form-control font-weight-bold bg-transparent border-0" type="text" readonly disabled>
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="taxiNo">Numéro du taxi</label>
                    <input id="taxiNo" class="form-control" value="{{old('taxiNo')}}" type="text" name="taxiNo" minlength="1" required>
                </div>
                <div class="w-100 pb-4"></div>
                <div class="col-5 input-group">
                    <label class="input-group-text" for="dateStart_date">Date (Début)</label>
                    <input id="dateStart_date" class="form-control" value="{{old('dateStart_date', \Carbon\Carbon::now()->toDateString())}}" type="date" name="dateStart_date" placeholder="jj/mm/aaaa" required>
                    <input id="dateStart_time" class="form-control" value="{{old('dateStart_time', \Carbon\Carbon::now()->toTimeString("minute"))}}" type="time" name="dateStart_time" placeholder="hh:mm" required>
                    <label class="input-group-text" for="dateStart_time" hidden></label>
                </div>
                <div class="col-5 input-group">
                    <label class="input-group-text" for="dateEnd_date">Date (Fin)</label>
                    <input id="dateEnd_date" class="form-control" value="{{old('dateEnd_date', \Carbon\Carbon::now()->toDateString())}}" type="date" name="dateEnd_date" placeholder="jj/mm/aaaa" required>
                    <input id="dateEnd_time" class="form-control" value="{{old('dateEnd_time', \Carbon\Carbon::now()->toTimeString("minute"))}}" type="time" name="dateEnd_time" placeholder="hh:mm" required>
                    <label class="input-group-text" for="dateEnd_time" hidden></label>
                </div>
                <div class="w-100 pb-4"></div>

                <div class="col-8 input-group">
                    <label class="input-group-text" for="startRecipe">Recette</label>
                    <input id="startRecipe" class="form-control" value="{{old('startRecipe', 0)}}" type="number" name="recetteInit" min="0" placeholder="Initiale" required>
                    <label class="input-group-text" for="finalRecipe" hidden></label>
                    <input id="finalRecipe" class="form-control" value="{{old('finalRecipe', 0)}}" type="number" name="finalRecipe" min="0" placeholder="Finale" required>
                </div>
                <div class="col"></div>
                <div class="w-100 pb-2"></div>
                <div class="col input-group">
                    <label class="input-group-text" for="fixPrice">Prix fixe</label>
                    <input id="fixPrice" class="form-control" value="{{old('fixPrice', 0)}}" type="number" name="fixPrice" min="0" required>
                </div>
                <div class="col input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0">Recette réel</label>
                    <input id="realRecipe" class="form-control font-weight-bold bg-transparent border-0" type="number" readonly disabled>
                </div>
                <div class="w-100 pb-4"></div>

                <h4 class="mx-auto pt-3">Nombre de kilomètre dans le taximètre</h4>
                <div class="w-100"></div>
                <div class="col-4 input-group">
                    <label class="input-group-text" for="startingMillage">Début</label>
                    <input id="startingMillage" class="form-control" value="{{old('startingMillage', 0)}}" type="number" name="startingMillage" required>
                </div>
                <div class="col-4 input-group">
                    <label class="input-group-text" for="endingMillage">Arrivée</label>
                    <input id="endingMillage" class="form-control" value="{{old('endingMillage', 0)}}" type="number" name="endingMillage" required>
                </div>
                <div class="col-4 input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0">Total</label>
                    <input id="totalMillage" class="form-control font-weight-bold bg-transparent border-0" type="number" readonly disabled>
                </div>
                <div class="w-100 pb-4"></div>

                <h4 class="mx-auto pt-3">Nombre de kilomètre effectué professionellement (dans la journée)</h4>
                <div class="w-100"></div>
                <div class="col input-group">
                    <label class="input-group-text" for="startingMileageLaden">Début</label>
                    <input id="startingMileageLaden" class="form-control" value="{{old('startingMileageLaden', 0)}}" type="number" name="startingMileageLaden" required>
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="endingMileageLaden">Fin</label>
                    <input  id="endingMileageLaden" class="form-control" value="{{old('endingMileageLaden', 0)}}" type="number" name="endingMileageLaden" required>
                </div>
                <div class="col-3 input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0">Total</label>
                    <input id="totalMileageLaden" class="form-control font-weight-bold bg-transparent border-0" type="number" readonly disabled>
                </div>
                <div class="w-100 pb-4"></div>

                <h4 class="mx-auto pt-3">Nombre de clients (dans la journée)</h4>
                <div class="w-100"></div>
                <div class="col input-group">
                    <label class="input-group-text" for="startingAmountOfPassengers">Début</label>
                    <input id="startingAmountOfPassengers" class="form-control" value="{{old('startingAmountOfPassengers', 0)}}" type="number" name="startingAmountOfPassengers" required>
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="endingAmountOrPassengers">Fin</label>
                    <input id="endingAmountOrPassengers" class="form-control" value="{{old('endingAmountOrPassengers', 0)}}" type="number" name="endingAmountOrPassengers" required>
                </div>
                <div class="col-3 input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0">Total</label>
                    <input id="totalAmountOfPassengers" class="form-control font-weight-bold bg-transparent border-0" type="number" readonly disabled>
                </div>
                <div class="w-100 pb-4"></div>


                <h4 class="mx-auto pt-3">Nombre de kilomètre de la voiture</h4>
                <div class="w-100"></div>
                <div class="col input-group">
                    <label class="input-group-text" for="startingMileageInVehicle">Début</label>
                    <input id="startingMileageInVehicle" class="form-control" value="{{old('startingMileageInVehicle', 0)}}" type="number" name="startingMileageInVehicle" required onchange="setDifferenceOnMillage()">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="endingMileageInVehicle">Fin</label>
                    <input id="endingMileageInVehicle" class="form-control" value="{{old('endingMileageInVehicle', 0)}}" type="number" name="endingMileageInVehicle" required onchange="setDifferenceOnMillage()">
                </div>
                <div class="col-3 input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0">Total</label>
                    <input id="totalMileageInVehicle" class="form-control font-weight-bold bg-transparent border-0" type="number" readonly disabled>
                </div>
                <div class="w-100 pb-4"></div>

                <div class="col input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0">Salaire</label>
                    <input id="salary" class="form-control font-weight-bold bg-transparent border-0" type="number" readonly disabled>
                </div>
                <div class="w-100 pb-4"></div>

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

                <div class="col input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0">Total des dépense</label>
                    <input id="totalExpenses" class="form-control font-weight-bold bg-transparent border-0" type="number" readonly disabled>
                </div>
                <div class="col input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0">Total Net</label>
                    <input id="totalNet" class="form-control font-weight-bold bg-transparent border-0" type="number" readonly disabled>
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
