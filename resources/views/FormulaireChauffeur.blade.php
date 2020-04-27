@extends('layouts.base')
@section('title','Formulaire pour les chauffeurs')

@section('before-scripts')
    <script>
        function updateRecetteReel() {
            let startingRecipe = parseInt(document.getElementById('recetteInit').value);
            let endingRecipe = parseInt(document.getElementById('recetteFinal').value);
            let fixPrice = parseInt(document.getElementById('prixFixe').value);

            document.getElementById('recetteReel').value = (endingRecipe - startingRecipe) + fixPrice;
        }
    </script>
@endsection

@section('body-content')
    @parent
    <div class="container">
        <form action="" method="post">
            <div class="row">
                <div class="col">
                    <div class="group-control">
                        <label for="numTaxi">Numéro du taxi</label>
                        <input type="text" name="numTaxi" id="numTaxi" class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="group-control">
                        <label for="numTaxi">Nom du chauffeur</label>
                        <input type="text" name="numTaxi" class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="group-control">
                        <label for="numTaxi">Date</label>
                        <input type="datetime-local" name="numTaxi" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="group-control">
                        <label for="numTaxi">Recette initial</label>
                        <input type="number" name="recetteInit" id="recetteInit" class="form-control"onchange="updateRecetteReel()">
                    </div>
                </div>
                <div class="col">
                    <div class="group-control">
                        <label for="numTaxi">Recette final</label>
                        <input type="number" name="recetteFinal" id="recetteFinal" class="form-control"onchange="updateRecetteReel()">
                    </div>
                </div>
                <div class="col">
                    <div class="group-control">
                        <label for="diff">Prix fixe</label>
                        <input type="number" name="prixFixe" id="prixFixe" class="form-control"onchange="updateRecetteReel()">
                    </div>
                </div>
                <div class="col">
                    <div class="group-control">
                        <label for="diff">Recette réel</label>
                        <input type="number" name="recetteReel" id="recetteReel" class="form-control" readonly>
                    </div>
                </div>
        </div>
        <div style="margin-top:2rem;text-align:center">
        <button type="button" class="btn btn-success mt-3" style="width:170px" >Envoyer</button>
        </div>
    </form>
    </div>
    @endsection
    