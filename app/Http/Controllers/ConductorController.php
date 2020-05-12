<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConductorController extends Controller
{


    public function modifyConductor(Request $request, int $id)
    {
        return view("formulaireChauffeur", [
            'type' => "modification",
            'id' => $id,
        ]);
    }


}
