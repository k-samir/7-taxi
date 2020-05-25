<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;


class ClientController extends Controller
{

    public function client()
    {
        return view("formulaireClient");
    }

    public function createClient(Request $request)
    {

        $client = new Client();

        $client->no_client = $request->input('clientNumber');
        $client->solde_client = $request->input('solde');

        $client->prenom = $request->input('firstName');
        $client->nom = $request->input('lastName');

        $client->telephone = $request->input('phoneNumber');
        $client->email = $request->input('email');

        $client->no_rue = $request->input('streetNumber');
        $client->rue = $request->input('streetName');
        $client->ville = $request->input('cityName');
        $client->code_postal = $request->input('postalCode');

        $client->save();
        return redirect()->route("home");
    }

}
