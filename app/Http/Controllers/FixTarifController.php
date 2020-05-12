<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FixTarifController extends Controller
{


    public function modifyFixTarif(Request $request, int $id)
    {
        return view("formulaireTarifFix", [
            'type' => "modification",
            'id' => $id,
        ]);
    }


}
