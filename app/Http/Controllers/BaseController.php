<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class BaseController extends Controller
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
        return view("formulaireChauffeur");
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
