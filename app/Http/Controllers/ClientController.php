<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{


    public function modifyClient(Request $request, int $id)
    {
        return view("home");
    }


}
