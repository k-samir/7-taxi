<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Symfony\Component\Console\Output\ConsoleOutput;


class ClientController extends Controller
{
    //
    //
    public function client()
    {
        return view("formulaireClient");
    }


    public function createClient(Request $request){

       
        $out = new ConsoleOutput();
        $out->writeln($request);
        
        $client = new Client();
       
        $client->prenom = $request->input('firstName');
        $client->nom = $request->input('lastName');
        
        $client->telephone=$request->input('phoneNumber');
        $client->email=$request->input('email');
        $client->no_rue=$request->input('streetNumber');
        $client->rue=$request->input('streetName');
        $client->ville=$request->input('cityName');
        $client->code_postal=$request->input('postalCode');
     
        $client->solde_client=$request->input('solde');
        $client->save();
        return redirect()->route("home");
    }
}
