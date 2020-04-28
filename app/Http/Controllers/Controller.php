<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{


    function addConductorShift(Request $request)
    {
        return view("formulaireChauffeur");
    }

    function addConductor(Request $request)
    {
        return view("formulaireAjoutChauffeur");
    }

}
