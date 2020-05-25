<?php

namespace App\Http\Controllers;

use App\Taxi;
use Illuminate\Http\Request;

class TaxiController extends Controller
{


    public function taxi(Request $request)
    {
        return view("formulaireAjoutTaxi")->with('errorMessage', $request->session()->get('errorMessage'));
    }

    public function createTaxi(Request $request)
    {
        if (!$request->has('carSize'))
            return redirect()->route('getTaxi')->with('errorMessage', 'Veuillez choisir le type de voiture')->withInput();


        $taxi = new Taxi();
        $taxi->no_taxi = $request->input('noTaxi');
        $taxi->plaque_immatriculation = $request->input('immatriculation');
        $taxi->no_assurance = $request->input('assurance');
        $taxi->date_debut_circulation = $request->input('circulationDate');
        $taxi->kilometrage_taxi = $request->input('carMileage');
        $taxi->no_type_voiture = $request->input('carSize');
        $taxi->no_taximetre = $request->input('taximeterNo');
        $taxi->recette_taximetre = $request->input('taximeterRecipe');
        $taxi->kilometrage_taximetre = $request->input('taximeterMileage');
        $taxi->kilometrage_en_charge_taximetre = $request->input('taximeterMileageLaden');
        $taxi->prise_en_charge_taximetre = $request->input('taximeterAmountOfCourses');
        $taxi->save();

        return redirect()->route("home")->with(['message' => "Le taxi a bien été créé!"]);
    }

    public function getTaxis(){
       $taxis =  Taxi::all();
       return view('ListeTaxi')->with('taxis',$taxis);
    }
}
