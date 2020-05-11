@extends('layouts.base')
@section('title','Formulaire pour les chauffeurs')

@section('before-scripts')
    <script> 
        function updateRecetteReel(){
           var recetteInit = document.getElementById('recetteInit').value != '' ? parseInt(document.getElementById('recetteInit').value) :0 ;
           var recetteFinal = document.getElementById('recetteFinal').value != '' ?parseInt(document.getElementById('recetteFinal').value) :0 ;
           var prixFixe = document.getElementById('prixFixe').value != '' ? parseInt(document.getElementById('prixFixe').value) :0;
           console.table(recetteInit,recetteFinal,prixFixe);
           var reel = (recetteFinal - recetteInit) + prixFixe;
           document.getElementById('recetteReel').value = reel;
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
                        <input type="text" name="numTaxi" id="numTaxi" class="form-control" >
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
                        <input type="datetime-local" name="numTaxi" class="form-control" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="group-control">
                        <label for="numTaxi">Recette initial</label>
                        <input type="number" name="recetteInit" id="recetteInit"class="form-control" onchange="updateRecetteReel()">
                    </div>
                </div>
                <div class="col">
                    <div class="group-control">
                        <label for="numTaxi">Recette final</label>
                        <input type="number" name="recetteFinal" id="recetteFinal" class="form-control" onchange="updateRecetteReel()">
                    </div>
                </div>
                <div class="col">
                    <div class="group-control">
                        <label for="diff">Prix fixe</label>
                        <input type="number" name="prixFixe" id="prixFixe" class="form-control" onchange="updateRecetteReel()">
                    </div>
                </div>
                <div class="col">
                    <div class="group-control">
                        <label for="diff">Recette réel</label>
                        <input type="number" name="recetteReel" id="recetteReel" class="form-control" readonly>
                    </div>
                </div>
        </div>
        <button type="button" class="btn btn-success mt-3" >Envoyer</button>
    </form>
    </div>
    @endsection
    