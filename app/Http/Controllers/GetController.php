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

    /**
     * @param Request $request
     * @return Renderable
     */
    public function addConductorShift(Request $request)
    {
        return view("formulaireChauffeur", [
            'todayDate' => Carbon::now()->toDateString() . "T" . Carbon::now()->toTimeString("minute"),
        ]);
    }

    /**
     * @param Request $request
     * @return Renderable
     */
    public function createConductor(Request $request)
    {
        return view("formulaireCreationChauffeur", ["type" => "création"]);
    }

    /**
     * @param Request $request
     * @return Renderable
     */
    public function createClient(Request $request)
    {
        return view("formulaireClient", ["type" => "création"]);
    }

    /**
     * @param Request $request
     * @return Renderable
     */
    public function createFixTarif(Request $request)
    {
        return view("formulaireTarifFix", ["type" => "création"]);
    }


}
