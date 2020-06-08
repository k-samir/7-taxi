<?php

namespace App\Http\Controllers;

use App\Chauffeur;
use App\Http\Requests\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Taxi;

class FormShiftController extends Controller
{
    public function addShift(Request $request)
    {
        $chauffeur = explode(" ",$request->input('selectChauffeur'));
        $id_chauffeur = Chauffeur::where('prenom','=',$chauffeur[0])->where('nom','=',$chauffeur[1])->first()->id_chauffeur;
        DB::table("formulaire")->insert([
            "id_chauffeur" => $id_chauffeur,
            "id_taxi" => $request['taxiNo'],
            "date_debut" => $request['dateStart'],
            "date_fin" => $request['dateEnd'],

            "recette_depart" => $request['startRecipe'],
            "recette_arrivee" => $request['finalRecipe'],
            "prix_fixes" => $request['fixPrice'],

            "kilometrage_depart" => $request['startingMillage'],
            "kilometrage_arrivee" => $request['endingMillage'],
            "kilometrage_pris_en_charge_depart" => $request['startingMileageLaden'],
            "kilometrage_pris_en_charge_arrivee" => $request['endingMileageLaden'],
            "prise_en_charge_debut" => $request['startingAmountOfPassengers'],
            "prise_en_charge_arrive" => $request['endingAmountOrPassengers'],
            "kilometrage_auto_depart" => $request['startingMileageInVehicle'],
            "kilometrage_auto_arrivee" => $request['endingMileageInVehicle'],

            "depense_gaz" => $request['gaz'],
            "depense_credit" => $request['somme_credit'],
            "depense_divers" => $request['various'],
        ]);
        
        $taxi = Taxi::where('no_taxi',$request['taxiNo'])->first();
        $taxi->recette_taximetre < $request['finalRecipe'] ? $taxi->recette_taximetre = $request['finalRecipe']:'';
        $taxi->kilometrage_taximetre < $request['endingMillage'] ? $taxi->kilometrage_taximetre = $request['endingMillage']:'';
        $taxi->kilometrage_en_charge_taximetre < $request['endingMileageLaden'] ? $taxi->kilometrage_en_charge_taximetre = $request['endingMileageLaden']:'';
        $taxi->prise_en_charge_taximetre < $request['endingAmountOrPassengers'] ? $taxi->prise_en_charge_taximetre = $request['endingAmountOrPassengers']:'';
        $taxi->kilometrage_taxi < $request['endingMileageInVehicle'] ? $taxi->kilometrage_taxi = $request['endingMileageInVehicle']:'';
        $taxi->save();
        return view('home')->with(['message' => "Le conducteur a bien été ajouté"]);
    }
}
