<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

/**
 * A class that only send views from a get.
 * @package App\Http\Controllers
 */
class GetController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        return view('home');
    }

    public function addConductorShift(Request $request): Renderable
    {
        return view("formulaireShift", [
            'todayDate' => Carbon::now()->toDateString() . "T" . Carbon::now()->toTimeString("minute"),
        ]);
    }


    public function createConductor(Request $request): Renderable
    {
        return view("formulaireChauffeur", [
            "type" => "création",
            'routeOnAction' => route('createConductor'),
            'messageOnAction' => "Créer",
        ]);
    }

    public function createClient(Request $request): Renderable
    {
        return view("formulaireClient", [
            "type" => "création",
            'routeOnAction' => route("createClient"),
            'messageOnAction' => "Créer",
        ]);
    }

    public function createFixTarif(Request $request): Renderable
    {
        return view("formulaireTarifFix", [
            "type" => "création",
            'messageOnAction' => "Créer",
        ]);
    }

    public function createTaxi(Request $request): Renderable
    {
        return view("formulaireAjoutTaxi");
    }


}
