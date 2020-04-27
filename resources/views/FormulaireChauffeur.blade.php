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
            <!--géneral-->
            <div class="row">
                <!--usager-->
                <div class="col">
                    <div class="group-control">
                        <label for="numTaxi">Usager</label>
                        <input type="text" name="numTaxi" class="form-control" readonly>
                    </div>
                </div>
                <!--numTaxi-->
                <div class="col">
                    <div class="group-control">
                        <label for="numTaxi">Numéro du taxi</label>
                        <input type="text" name="numTaxi" id="numTaxi" class="form-control">
                    </div>
                </div>
                <!--date-->
                <div class="col">
                    <div class="group-control">
                        <label for="numTaxi">Date</label>
                        <input type="datetime-local" name="numTaxi" class="form-control">
                    </div>
                </div>
            </div>

            <!--recette-->
            <div class="row">
                <div class="col">
                    <div class="group-control">
                        <label for="numTaxi">Recette initial</label>
                        <input type="number" name="recetteInit" id="recetteInit" class="form-control" onchange="updateRealRecipe()">
                    </div>
                </div>
                <div class="col">
                    <div class="group-control">
                        <label for="numTaxi">Recette final</label>
                        <input type="number" name="recetteFinal" id="recetteFinal" class="form-control" onchange="updateRealRecipe()">
                    </div>
                </div>
                <div class="col">
                    <div class="group-control">
                        <label for="diff">Prix fixe</label>
                        <input type="number" name="prixFixe" id="prixFixe" class="form-control" onchange="updateRealRecipe()">
                    </div>
                </div>
                <div class="col">
                    <div class="group-control">
                        <label for="diff">Recette réel</label>
                        <input type="number" name="recetteReel" id="recetteReel" class="form-control" readonly onchange="salaire()">
                    </div>
                </div>
            </div>

        <!--millage-->
            <!--millage professionnel -->
            <div class="row">
                <div class="col-4">
            <label for="KilométrageAutoDepart">Kilométrage taximetre debut</label>
            <input type="number" name="millageDepart" id="millageDepart"class="form-control" onchange="difference(this.value,document.getElementById('millageArrive').value,document.getElementById('millageFinal'))">
    </div>
                <div class="col-4">
            <label for="kilometrageAutoArrive">Kilométrage taximetre Arrivée</label>
            <input type="number" name="millageArrive" id="millageArrive" class="form-control" onchange="difference(document.getElementById('millageDepart').value,this.value,document.getElementById('millageFinal'))">
    </div>
                <div class="col-4">
            <label for="millageEffecture">Nombre de kilometre effectué</label>
            <input type="number" name="millageFinal" id="millageFinal" readonly class="form-control"  onchange="difference()">
    </div>
            </div>

            <!--millage pris en charge -->
            <div class="row">
                <div class="col-4">
                    <label for="millageEnCharge">Nombre de kilometrage effectuer professionellement en debut de journée</label>
                    <input type="number" name="millageEnChargeDebut" id="millageEnChargeDebut" class="form-control" onchange="difference(this.value,document.getElementById('millageEnChargeFin').value,document.getElementById('millageEnChargeFinal'))">
                </div>
                <div class="col-4">
            <label for="millageEnCharge">Nombre de kilometrage effectuer professionellement fin de journée</label>
            <input type="number" name="millageEnChargeFin" id="millageEnChargeFin" class="form-control" onchange="difference(document.getElementById('millageEnChargeDebut').value,this.value,document.getElementById('millageEnChargeFinal'))">
    </div>
                <div class="col-4">
                    <label for="millageEnChargeDiff">Nombre de kilometrage dans la journée</label>
                    <input type="number" name="millageEnChargeDiff" id="millageEnChargeFinal" class="form-control" readonly>
                </div>
            </div>

            <!--prise en charge-->
            <div class="row">
            <div class="col-4">
            <label for="priseEnCharge">Nombre de clients début de journée</label>
            <input type="number" name="PriseEnChargeDebut" id="PriseEnChargeDebut" class="form-control" onchange="difference(this.value,document.getElementById('PriseEnChargeFin').value,document.getElementById('nbPriseEnCharge'))">
    </div>
            <div class="col-4">
            <label for="millageEnCharge">Nombre de clients fin de journée</label>
            <input type="number" name="PriseEnChargeFin" id="PriseEnChargeFin" class="form-control" onchange="difference(document.getElementById('PriseEnChargeDebut').value,this.value,document.getElementById('nbPriseEnCharge'))">
    </div>
            <div class="col-4">
            <label for="millageEnChargeDiff">Nombre de clients dans la journée</label>
            <input type="number" name="millageEnChargeDiff" id="nbPriseEnCharge" class="form-control" readonly>
    </div>
    </div>

            <!--millage auto-->
            <div class="row">
            <div class="col-4">
            <label for="priseEnCharge">Kilometre de la voiture debut</label>
            <input type="number" name="millageAutoDebut" id="millageAutoDebut" class="form-control" onchange="difference(this.value,document.getElementById('millageAutoFin').value,document.getElementById('millageAuto'))">
    </div>
            <div class="col-4">
            <label for="millageEnCharge">kilometre de la voiture fin</label>
            <input type="number" name="millageAutoFin" id="millageAutoFin" class="form-control" onchange="difference(document.getElementById('millageAutoDebut').value,this.value,document.getElementById('millageAuto'))">
    </div>
            <div class="col-4">
            <label for="millageEnChargeDiff">Nombre de kilometre de la voiture</label>
            <input type="number" name="millageAutoDiff" id="millageAuto" class="form-control" readonly>
    </div>
    </div>

        <!--depense-->
            <!--salaire-->
            <div class="row">
                <div class="col-3">
                    <label for="salaire">Salaire</label>
                    <input type="number" name="salaire" id="salaire" class="form-control" readonly>
                </div>
            </div>

            <!--gaz-->
            <div class="row">
                <div class="col-3">
                    <label for="gaz">Gaz</label>
                    <input type="number" name="gaz" id="gaz" class="form-control">
                </div>
            </div>

            <!--credit-->
            <div class="row">
                <div class="col-3">
                    <label for="credit">Crédit</label>
                    <input type="number" name="credit" id="credit" class="form-control">
                </div>
            </div>

            <!--divers-->
            <div class="row">
                <div class="col-3">
                    <label for="divers">Divers</label>
                    <input type="number" name="divers" id="divers" class="form-control">
                </div>
            </div>

            <!--total depense-->
            <div class="row">
                <div class="col-3">
                    <label for="totalDepense">Total des depense</label>
                    <input type="number" name="totalDepense" id="totalDepense" class="form-control" readonly>
                </div>
            </div>

        <!--total net-->
            <div class="row">
                <div class="col-3">
                    <label for="TotalNet">Total Net</label>
                    <input type="number" name="totalNet" id="totalNet" class="form-control" readonly>
                </div>
            </div>

            <!--button submit-->
            <button type="button" class="btn btn-success mt-xl-3 align-self-center">Envoyer</button>
        </form>
    </div>
@endsection
