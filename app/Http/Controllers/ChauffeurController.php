<?php

namespace App\Http\Controllers;

use App\Chauffeur;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\Console\Output\ConsoleOutput;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ChauffeurController extends Controller
{

    public function chauffeur()
    {
        return view("formulaireChauffeur");
    }

    public function createChauffeur(Request $request)
    {
        $chauffeur = new Chauffeur();

        $chauffeur->no_chauffeur = $request->input('driverNo');
        $chauffeur->prenom = $request->input('firstName');
        $chauffeur->nom = $request->input('lastName');
        $chauffeur->commission = $request->input('commission');
        $chauffeur->telephone = $request->input('phoneNumber');
        $chauffeur->email = $request->input('email');
        $chauffeur->no_rue = $request->input('streetNumber');
        $chauffeur->rue = $request->input('streetName');
        $chauffeur->ville = $request->input('cityName');
        $chauffeur->code_postal = $request->input('postalCode');
        $chauffeur->no_permis = $request->input('licenceNumber');
        $chauffeur->date_expiration_permis = $request->input('licenceExpirationDate');
        $chauffeur->solde = $request->input('balance');
        $chauffeur->save();

        $token = Hash::make(Str::random(60));
        $token = str_replace("/","~",$token);
        $user = new User();
        $user->name = substr($request->input('firstName'),0,1) . $request->input('lastName');
        $user->email = $request->input('email');
        $user->password = Hash::make('pass');
        $user->remember_token = $token;
        $user->role = 'conductor';
        $user->save();
        $console= new ConsoleOutput();
        $console->writeln($token);
        return redirect()->route("sendMail",['token'=>$token]);
    }

    public function getChauffeur(){
        $chauffeurs = Chauffeur::all();
        return view('listeChauffeur')->with('items',$chauffeurs);
    }

    public function modifyConductor(Request $request,$id){
        $chauffeur = Chauffeur::find($id);
        $chauffeur->no_chauffeur = $request->input('driverNo');
        $chauffeur->prenom = $request->input('firstName');
        $chauffeur->nom = $request->input('lastName');
        $chauffeur->commission = $request->input('commission');
        $chauffeur->telephone = $request->input('phoneNumber');
        $chauffeur->email = $request->input('email');
        $chauffeur->no_rue = $request->input('streetNumber');
        $chauffeur->rue = $request->input('streetName');
        $chauffeur->ville = $request->input('cityName');
        $chauffeur->code_postal = $request->input('postalCode');
        $chauffeur->no_permis = $request->input('licenceNumber');
        $chauffeur->date_expiration_permis = $request->input('licenceExpirationDate');
        $chauffeur->solde = $request->input('balance');
        $chauffeur->save();

        return redirect()->route('listChauffeur');
    }
}
