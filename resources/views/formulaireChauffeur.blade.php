@extends('layouts.base')
@section('title', "Formulaire pour les chauffeurs")

@section('body-content')
    <div class="container mb-5">
        @parent
        <form method="POST" action="{{route("addConductorShiftPost")}}">
            @csrf

            <div class="row mb-4 justify-content-center">
                <div class="col input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0" for="driverNo">Numéro de conducteur</label>
                    <input id="driverNo" class="form-control font-weight-bold bg-transparent border-0" value="{{$driverNo??Auth::id()}}" type="text" name="driverNo" minlength="1" readonly disabled>
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="taxiNo">Numéro du taxi</label>
                    <input id="taxiNo" class="form-control" value="{{old('taxiNo')}}" type="text" name="taxiNo" minlength="1" required>
                </div>
                <div class="w-100 pb-4"></div>
                <div class="col-5 input-group">
                    <label class="input-group-text" for="dateStart">Date (Début)</label>
                    <input id="dateStart" class="form-control" value="{{old('dateStart', \Carbon\Carbon::now()->toDateString()."T".\Carbon\Carbon::now()->toTimeString("minute"))}}" type="datetime-local" name="dateStart" placeholder="jj/mm/aaaa hh:mm" required>
                </div>
                <div class="col-5 input-group">
                    <label class="input-group-text" for="dateEnd">Date (Fin)</label>
                    <input id="dateEnd" class="form-control" value="{{old('dateEnd', \Carbon\Carbon::now()->toDateString()."T".\Carbon\Carbon::now()->toTimeString("minute"))}}" type="datetime-local" name="dateEnd" placeholder="jj/mm/aaaa hh:mm" required>
                </div>
                <div class="w-100"></div>
                <div class="col-5"><span class="text-danger text-sm-right">@error('dateStart'){{$message}}@enderror</span></div>
                <div class="col-5"><span class="text-danger text-sm-right">@error('dateEnd'){{$message}}@enderror</span></div>
                <div class="w-100 pb-4"></div>
            </div>
            <!--Recette-->
            <div class="row justify-content-center">
                <div class="col-9 input-group">
                    <label class="input-group-text" for="startRecipe">Recette</label>
                    <input id="startRecipe" class="form-control" value="{{old('startRecipe')}}" type="number" name="startRecipe" min="0" placeholder="Initiale" required>
                    <label class="input-group-text" for="finalRecipe" hidden></label>
                    <input id="finalRecipe" class="form-control" value="{{old('finalRecipe')}}" type="number" name="finalRecipe" min="0" placeholder="Finale" required>
                </div>
                <div class="col"></div>
                <div class="w-100"></div>
                <div class="col-4"><span class="text-danger text-sm-right">@error('startRecipe'){{$message}}@enderror</span></div>
                <div class="col-4"><span class="text-danger text-sm-right">@error('finalRecipe'){{$message}}@enderror</span></div>
                <div class="w-100 pb-2"></div>
                <div class="col input-group">
                    <label class="input-group-text" for="fixPrice">Prix fixe</label>
                    <input id="fixPrice" class="form-control" value="{{old('fixPrice')}}" type="number" name="fixPrice"min="0" required>
                </div>
                <!--Recette réelle-->
                <div class="col input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0">Recette réelle</label>
                    <input id="realRecipe" class="form-control font-weight-bold bg-transparent border-0" type="number" readonly disabled>
                </div>
                <div class="w-100"></div>
                <div class="col"><span class="text-danger text-sm-right">@error('fixPrice'){{$message}}@enderror</span></div>
                <div class="col"><span class="text-danger text-sm-right">@error('realRecipe'){{$message}}@enderror</span></div>
                <div class="w-100 pb-4"></div>
            </div>
            <!--Taximètre-->
            <div class="row justify-content-center">
                <h4 class="mx-auto pt-3">Nombre de kilomètre dans le taximètre</h4>
                <div class="w-100"></div>
                <div class="col-4 input-group">
                    <label class="input-group-text" for="startingMillage">Départ</label>
                    <input id="startingMillage" class="form-control" value="{{old('startingMillage')}}" type="number" name="startingMillage" required>
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="endingMillage">Arrivée</label>
                    <input id="endingMillage" class="form-control" value="{{old('endingMillage')}}" type="number" name="endingMillage" required>
                </div>
                <div class="col-3 input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0" for="totalMillage">Total</label>
                    <input id="totalMillage" class="form-control font-weight-bold bg-transparent border-0" type="number" name="totalMillage" readonly disabled>
                </div>
                <div class="w-100"></div>
                <div class="col-4"><span class="text-danger text-sm-right">@error('startingMillage'){{$message}}@enderror</span></div>
                <div class="col-4"><span class="text-danger text-sm-right">@error('endingMillage'){{$message}}@enderror</span></div>
                <div class="col-4"></div>
                <div class="w-100 pb-4"></div>
                @php//TODO add somme des tarif fixes @endphp
            </div>
            <!--Kimolétrage professionnel-->
            <div class="row justify-content-center">
                <h4 class="mx-auto pt-3">Nombre de kilomètre effectué professionellement (dans la journée)</h4>
                <div class="w-100"></div>
                <div class="col input-group">
                    <label class="input-group-text" for="startingMileageLaden">Départ</label>
                    <input id="startingMileageLaden" class="form-control" value="{{old('startingMileageLaden')}}" type="number" name="startingMileageLaden" required>
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="endingMileageLaden">Arrivée</label>
                    <input id="endingMileageLaden" class="form-control" value="{{old('endingMileageLaden')}}" type="number" name="endingMileageLaden" required>
                </div>
                <div class="col-3 input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0">Total</label>
                    <input id="totalMileageLaden" class="form-control font-weight-bold bg-transparent border-0" type="number" readonly disabled>
                </div>
                <div class="w-100"></div>
                <div class="col"><span class="text-danger text-sm-right">@error('startingMileageLaden'){{$message}}@enderror</span></div>
                <div class="col"><span class="text-danger text-sm-right">@error('endingMileageLaden'){{$message}}@enderror</span></div>
                <div class="col-3"></div>
                <div class="w-100 pb-4"></div>
            </div>
            <!--Nombre de clients-->
            <div class="row justify-content-center">
                <h4 class="mx-auto pt-3">Nombre de clients (dans la journée)</h4>
                <div class="w-100"></div>
                <div class="col input-group">
                    <label class="input-group-text" for="startingAmountOfPassengers">Départ</label>
                    <input id="startingAmountOfPassengers" class="form-control" value="{{old('startingAmountOfPassengers')}}" type="number" name="startingAmountOfPassengers" required>
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="endingAmountOrPassengers">Arrivée</label>
                    <input id="endingAmountOrPassengers" class="form-control" value="{{old('endingAmountOrPassengers')}}" type="number" name="endingAmountOrPassengers" required>
                </div>
                <div class="col-3 input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0">Total</label>
                    <input id="totalAmountOfPassengers" class="form-control font-weight-bold bg-transparent border-0" type="number" readonly disabled>
                </div>
                <div class="w-100"></div>
                <div class="col"><span class="text-danger text-sm-right">@error('startingAmountOfPassengers'){{$message}}@enderror</span></div>
                <div class="col"><span class="text-danger text-sm-right">@error('endingAmountOrPassengers'){{$message}}@enderror</span></div>
                <div class="col-3"></div>
                <div class="w-100 pb-4"></div>
            </div>
            <!--Kilométrage de voiture-->
            <div class="row justify-content-center">
                <h4 class="mx-auto pt-3">Nombre de kilomètre de la voiture</h4>
                <div class="w-100"></div>
                <div class="col input-group">
                    <label class="input-group-text" for="startingMileageInVehicle">Départ</label>
                    <input id="startingMileageInVehicle" class="form-control" value="{{old('startingMileageInVehicle')}}" type="number" name="startingMileageInVehicle" required onchange="setDifferenceOnMillage()">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="endingMileageInVehicle">Arrivée</label>
                    <input id="endingMileageInVehicle" class="form-control" value="{{old('endingMileageInVehicle')}}" type="number" name="endingMileageInVehicle" required onchange="setDifferenceOnMillage()">
                </div>
                <div class="col-3 input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0">Total</label>
                    <input id="totalMileageInVehicle" class="form-control font-weight-bold bg-transparent border-0" type="number" readonly disabled>
                </div>
                <div class="w-100"></div>
                <div class="col"><span class="text-danger text-sm-right">@error('startingMileageInVehicle'){{$message}}@enderror</span>
                </div>
                <div class="col"><span class="text-danger text-sm-right">@error('endingMileageInVehicle'){{$message}}@enderror</span>
                </div>
                <div class="col-3"></div>
                <div class="w-100 pb-4"></div>
            </div>
            <!--Salaire-->
            <div class="row justify-content-center">
                <div class="col input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0">Salaire</label>
                    <input id="salary" class="form-control font-weight-bold bg-transparent border-0" type="number" readonly disabled>
                </div>
                <div class="w-100 pb-4"></div>
            </div>
            <!--Dépenses(gaz, credit, divers)-->
            <div class="row justify-content-center">
                <div class="col input-group">
                    <label class="input-group-text" for="gaz">Gaz</label>
                    <input id="gaz" class="form-control" value="{{old('gaz')}}" type="number" name="gaz" min="0">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="credit">Crédit</label>
                    <input id="credit" class="form-control" value="{{old('credit')}}" type="number" name="credit" min="0">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="various">Divers</label>
                    <input id="various" class="form-control" value="{{old('various')}}" type="number" name="various" min="0">
                </div>
                <div class="w-100"></div>
                <div class="col"><span class="text-danger text-sm-right">@error('gaz'){{$message}}@enderror</span>
                </div>
                <div class="col"><span class="text-danger text-sm-right">@error('credit'){{$message}}@enderror</span></div>
                <div class="col"><span class="text-danger text-sm-right">@error('various'){{$message}}@enderror</span></div>
                <div class="w-100 pb-4"></div>
            </div>
            <!--Totaux (dépense/net)-->
            <div class="row justify-content-center">
                <div class="col input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0">Total des dépense</label>
                    <input id="totalExpenses" class="form-control font-weight-bold bg-transparent border-0" type="number" readonly disabled>
                </div>
                <div class="col input-group">
                    <label class="input-group-text font-weight-bold bg-transparent border-0">Total Net</label>
                    <input id="totalNet" class="form-control font-weight-bold bg-transparent border-0" type="number" readonly disabled>
                </div>
            </div>
            <!--Envoyer-->
            <div class="row mt-3">
                    <div class="col-4"></div>
                    <div class="col">
                        <button type="submit" class="btn btn-lg btn-success">Envoyer</button>
                    </div>
            </div>
        </form>
    </div>
@endsection

@section('after-scripts')
    <script>var commission = {{$commission??0.36}}</script>
    <script src="{{asset('js/formDriver.js')}}" defer></script>
@endsection
