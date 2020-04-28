<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{


    function showConductor(Request $request)
    {
        return view("FormulaireChauffeur");
    }

    function addConductor(Request $request)
    {
        return view("FormulaireAjoutChauffeur");
    }

}
