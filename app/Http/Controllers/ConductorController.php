<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class ConductorController extends Controller
{


    public function modifyConductor(Request $request, int $id): Renderable
    {
        return view("formulaireChauffeur", [
            'type' => "modification",
            'id' => $id,
            'routeOnAction' => route('modifyConductor'),
            'messageOnAction' => "Modifier",
        ]);
    }


}
