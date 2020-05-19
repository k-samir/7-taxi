<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chauffeur;
use Symfony\Component\Console\Output\ConsoleOutput;

class ChauffeurController extends Controller
{
    //
    public function chauffeur()
    {
        return view("formulaireChauffeur");
    }


    public function createChauffeur(Request $request){

        $type=0;
        $out = new ConsoleOutput();
        $out->writeln($request);
        
        $chauffeur = new Chauffeur();
        $chauffeur->no_chauffeur = $request->input('no_chauffeur');
        $chauffeur->prenom = $request->input('firstName');
        $chauffeur->nom = $request->input('lastName');
        $chauffeur->commission = $request->input('commission');
        $chauffeur->telephone=$request->input('phoneNumber');
        $chauffeur->no_rue=$request->input('streetNumber');
        $chauffeur->rue=$request->input('streetName');
        $chauffeur->ville=$request->input('cityName');
        $chauffeur->code_postal=$request->input('postalCode');
        $chauffeur->no_permis=$request->input('licenceNumber');
        $chauffeur->date_expiration_permis=$request->input('licenceExpirationDate');
        $chauffeur->solde=$request->input('balance');
        $chauffeur->save();
        return redirect()->route("home");
    }
}
