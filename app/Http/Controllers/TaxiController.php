<?php

namespace App\Http\Controllers;

use App\Taxi;
use Illuminate\Http\Request;
use Symfony\Component\Console\Output\ConsoleOutput;

class TaxiController extends Controller
{

    public function createTaxi(Request $request)
    {
        $type = 0;
        $out = new ConsoleOutput();
        $out->writeln($request);
        if ($request->input('petit')) {
            $type = 1;
        } else if ($request->input('grand')) {
            $type = 2;
        }
        if ($type == 0) {
            return redirect()->route('createTaxi')->with('errorMessage', 'Veuillez choisir le type de voiture')->withInput();
        }
        Taxi::createTaxi($request,$type);
        return redirect()->route("home");
    }
}
