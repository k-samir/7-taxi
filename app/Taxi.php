<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Taxi extends Model
{
    protected $table = 'taxi';


    public static function createTaxi(Request $request, int $type): void
    {
        $taxi = new Taxi();
        $taxi->no_taxi = $request->input('NoTaxi');
        $taxi->plaque_immatriculation = $request->input('immat');
        $taxi->no_assurance = $request->input('assurence');
        $taxi->date_debut_circulation = $request->input('date_circ');
        $taxi->kilometrage_taxi = $request->input('kilo_voiture');
        $taxi->no_type_voiture = $type;
        $taxi->no_taximetre = $request->input('NoTaximetre');
        $taxi->recette_taximetre = $request->input('recette_taximetre');
        $taxi->kilometrage_taximetre = $request->input('millage_taximetre');
        $taxi->kilometrage_en_charge_taximetre = $request->input('millage_en_charge_taximetre');
        $taxi->prise_en_charge_taximetre = $request->input('prise_en_charge_taximetre');
        $taxi->save();
    }

}
