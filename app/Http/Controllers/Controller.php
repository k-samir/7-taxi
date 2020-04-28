<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{

    /**
     * @return Renderable
     */
    function addConductorShift()
    {
        return view("formulaireChauffeur");
    }

    /**
     * @return Renderable
     */
    function addConductor()
    {
        return view("formulaireAjoutChauffeur");
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('home');
    }

}
