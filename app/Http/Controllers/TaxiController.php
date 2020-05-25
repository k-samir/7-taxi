<?php

namespace App\Http\Controllers;

use App\Taxi;
use Illuminate\Http\Request;
use Symfony\Component\Console\Output\ConsoleOutput;

class TaxiController extends Controller
{
    

    public function createTaxi(Request $request)
    {
        if($request->input('petit') && $request->input('grand') || $request->has(['petit,grand']))
            return redirect()->route('getTaxi')->with('errorMessage', 'Veuillez choisir le type de voiture')->withInput();
        
        $taxi = new Taxi();
        $taxi->no_taxi = $request->input('NoTaxi');
        $taxi->plaque_immatriculation = $request->input('immat');
        $taxi->no_assurance = $request->input('assurence');
        $taxi->date_debut_circulation = $request->input('date_circ');
        $taxi->kilometrage_taxi = $request->input('kilo_voiture');
        $taxi->no_type_voiture = $request->input('type');
        $taxi->no_taximetre = $request->input('NoTaximetre');
        $taxi->recette_taximetre = $request->input('recette_taximetre');
        $taxi->kilometrage_taximetre = $request->input('millage_taximetre');
        $taxi->kilometrage_en_charge_taximetre = $request->input('millage_en_charge_taximetre');
        $taxi->prise_en_charge_taximetre = $request->input('prise_en_charge_taximetre');
        $taxi->save();

        return redirect()->route("home");
    }

    public function getTaxis(){
       $taxis =  Taxi::all();
       return view('ListeTaxi')->with('taxis',$taxis);
    }
}
