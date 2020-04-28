@extends('layouts.base')
@section('title','Formulaire pour les chauffeurs')

@section('before-scripts')
    <script>

        /**
         * Update the value of the element by id 'salaire'
         * to the value 'recetteReel' multiplied by the commision receive.
         */
        function salaire() {
            let commision = 0.36;
            document.getElementById('salaire').value = document.getElementById('recetteReel').value * commision;
        }

        function difference(depart, arrive, diff) {
            var departTemp = depart != 0 ? depart : 0;
            var arriveTemp = arrive != 0 ? arrive : 0;
            diff.value = arriveTemp - departTemp;
        }

        /**
         * Method to calculate the real recipe from the difference of initial recipe and final recipe plu the fix price.<br>
         * If the realRecipe is greater than 0, then, the method {@link salaire} will be called.
         */
        function updateRealRecipe() {
            let startingRecipe = parseInt(document.getElementById('recetteInit').value);
            let endingRecipe = parseInt(document.getElementById('recetteFinal').value);
            let fixPrice = parseInt(document.getElementById('prixFixe').value);

            let realRecipe = endingRecipe - startingRecipe + fixPrice;
            document.getElementById('recetteReel').value = realRecipe;
            if (realRecipe > 0) salaire();

        }
    </script>
@endsection

@section('body-content')
    @parent
    <div class="container">
        <form action="" method="post">
            <div class="row">
                <div class="col input-group">
                    <label class="input-group-text" for="user">Usager</label>
                    <input id="user" class="form-control" type="text" name="user" readonly>
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="numTaxi">Numéro du taxi</label>
                    <input id="numTaxi" class="form-control" type="text" name="numTaxi">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="date_date">Date</label>
                    <input id="date_date" class="form-control" type="date" name="date_date">
                    <input id="date_time" class="form-control" type="time" name="date">
                    <label class="input-group-text" for="date_time" hidden></label>
                </div>
            </div>

            <div class="row">
                <div class="col input-group">
                    <label class="input-group-text" for="startRecipe">Recette initial</label>
                    <input id="startRecipe" class="form-control" type="number" name="recetteInit" onchange="updateRealRecipe()">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="finalRecipe">Recette final</label>
                    <input id="finalRecipe" class="form-control" type="number" name="finalRecipe" onchange="updateRealRecipe()">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="fixPrice">Prix fixe</label>
                    <input id="fixPrice" class="form-control" type="number" name="fixPrice" onchange="updateRealRecipe()">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="realRecipe">Recette réel</label>
                    <input id="realRecipe" class="form-control" type="number" name="realRecipe" readonly onchange="salaire()">
                </div>
            </div>

            <div class="row">
                <div class="col-4 input-group">
                    <label class="input-group-text" for="startingMillage">Kilométrage taximètre (début)</label>
                    <input type="number" name="startingMillage" id="startingMillage" class="form-control" onchange="difference(this.value,document.getElementById('millageArrive').value,document.getElementById('millageFinal'))">
                </div>
                <div class="col-4 input-group">
                    <label class="input-group-text" for="endingMillage">Kilométrage taximètre (arrivée)</label>
                    <input type="number" name="endingMillage" id="endingMillage" class="form-control" onchange="difference(document.getElementById('millageDepart').value,this.value,document.getElementById('millageFinal'))">
                </div>
                <div class="col-4 input-group">
                    <label class="input-group-text" for="totalMillage">Kilométrage taximètre (total)</label>
                    <input type="number" name="totalMillage" id="totalMillage" readonly class="form-control" onchange="difference()">
                </div>
            </div>

            <div class="row">
                <div class="col-4 input-group">
                    <label class="input-group-text" for="startingMileageLaden">Nombre de kilomètre effectué professionellement (début de journée)</label>
                    <input id="startingMileageLaden" class="form-control"type="number" name="startingMileageLaden" onchange="difference(this.value,document.getElementById('millageEnChargeFin').value,document.getElementById('millageEnChargeFinal'))">
                </div>
                <div class="col-4 input-group">
                    <label class="input-group-text" for="endingMileageLaden">Nombre de kilomètre effectué professionellement (fin de journée)</label>
                    <input  id="endingMileageLaden" class="form-control"type="number" name="endingMileageLaden" onchange="difference(document.getElementById('millageEnChargeDebut').value,this.value,document.getElementById('millageEnChargeFinal'))">
                </div>
                <div class="col-4 input-group">
                    <label class="input-group-text" for="mileageLadenTotal">Nombre de kilomètre effectué professionellement (toute la journée)</label>
                    <input id="mileageLadenTotal" class="form-control" type="number" name="mileageLadenTotal" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-4 input-group">
                    <label class="input-group-text" for="startingAmountOfPassengers">Nombre de clients (début de journée)</label>
                    <input id="startingAmountOfPassengers" class="form-control" type="number" name="startingAmountOfPassengers" onchange="difference(this.value,document.getElementById('PriseEnChargeFin').value,document.getElementById('nbPriseEnCharge'))">
                </div>
                <div class="col-4 input-group">
                    <label class="input-group-text" for="endingAmountOrPassengers">Nombre de clients (fin de journée)</label>
                    <input id="endingAmountOrPassengers" class="form-control" type="number" name="endingAmountOrPassengers" onchange="difference(document.getElementById('PriseEnChargeDebut').value,this.value,document.getElementById('nbPriseEnCharge'))">
                </div>
                <div class="col-4 input-group">
                    <label class="input-group-text" for="totalAmountOfPassengers">Nombre de clients (toute la journée)</label>
                    <input id="totalAmountOfPassengers" class="form-control" type="number" name="totalAmountOfPassengers" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-4 input-group">
                    <label class="input-group-text" for="startingMileageInVehicle">Nombre de kilomètre de la voiture (début)</label>
                    <input id="startingMileageInVehicle" class="form-control" type="number" name="startingMileageInVehicle" onchange="difference(this.value,document.getElementById('millageAutoFin').value,document.getElementById('millageAuto'))">
                </div>
                <div class="col-4 input-group">
                    <label class="input-group-text" for="endingMileageInVehicle">Nombre de kilomètre de la voiture (fin)</label>
                    <input id="endingMileageInVehicle" class="form-control" type="number" name="endingMileageInVehicle" onchange="difference(document.getElementById('millageAutoDebut').value,this.value,document.getElementById('millageAuto'))">
                </div>
                <div class="col-4 input-group">
                    <label class="input-group-text" for="totalMileageInVehicle">Nombre de kilomètre de la voiture (total)</label>
                    <input id="totalMileageInVehicle" class="form-control" type="number" name="totalMileageInVehicle" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-3 input-group">
                    <label class="input-group-text" for="salary">Salaire</label>
                    <input id="salary" class="form-control" type="number" name="salary" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-3 input-group">
                    <label class="input-group-text" for="gaz">Gaz</label>
                    <input id="gaz" class="form-control" type="number" name="gaz">
                </div>
            </div>

            <div class="row">
                <div class="col-3 input-group">
                    <label class="input-group-text" for="credit">Crédit</label>
                    <input id="credit" class="form-control" type="number" name="credit">
                </div>
            </div>

            <div class="row">
                <div class="col-3 input-group">
                    <label class="input-group-text" for="various">Divers</label>
                    <input id="various" class="form-control" type="number" name="various">
                </div>
            </div>

            <div class="row">
                <div class="col-3 input-group">
                    <label class="input-group-text" for="totalExpenses">Total des depense</label>
                    <input id="totalExpenses" class="form-control" type="number" name="totalExpenses" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-3 input-group">
                    <label class="input-group-text" for="totalNet">Total Net</label>
                    <input id="totalNet" class="form-control" type="number" name="totalNet" readonly>
                </div>
            </div>

            <button type="button" class="btn btn-success mt-xl-3 align-self-center">Envoyer</button>
        </form>
    </div>
@endsection
