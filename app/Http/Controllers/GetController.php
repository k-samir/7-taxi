<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view("formulaireChauffeur",[
            'driverNo'=>Auth::id(),
            'todayDate'=> Carbon::now()->toDateString()."T". Carbon::now()->toTimeString("minute"),
        ]);
    }

    /**
     * @param Request $request
     * @return Renderable
     */
    public function addConductor(Request $request)
    {
        return view("formulaireAjoutChauffeur");
    }


}
