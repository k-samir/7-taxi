<?php

namespace App;

use App\Http\Requests\FormRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Form extends Model
{


    public function addForm(FormRequest $request)
    {
        DB::table("formulaire")->insert([
            "id_chauffeur" => Auth::id(),
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
            "depense_credit" => $request['credit'],
            "depense_divers" => $request['various'],
        ]);
    }


}
