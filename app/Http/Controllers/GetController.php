<?php

namespace App\Http\Controllers;

use App\Chauffeur;
use App\Client;
use App\Taxi;
use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\passwordCreation;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Output\ConsoleOutput;

/**
 * A class that only send views from a get.
 * @package App\Http\Controllers
 */
class GetController extends Controller
{
    private const CREATE_TAG = [
        "type" => "création",
        "messageOnAction" => "Créer",
    ];
    private const MODIFY_TAG = [
        "type" => "modification",
        "messageOnAction" => "Modifier",
    ];


    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        return view('home');
    }
    public function sendMail(Request $request, $token,$mdp){ 
        $email = User::where('remember_token',$token)->first()->email;
        Mail::to($email)->send(new passwordCreation($token,$mdp));
        return redirect()->route('home');
    }

    public function addConductorShift(Request $request): Renderable
    {
        $chauffeur = Auth::user()->role == 'admin'? Chauffeur::all() : Chauffeur::where('email',Auth::user()->email)->get();
        date_default_timezone_set('America/New_York');
        return view("formulaireShift")->with([
            'todayDate' => date('Y-m-d\TG:i'),
            'taxis' => Taxi::All(),
            'chauffeurs' => $chauffeur
        ]);
    }

    public function getListOfUsers(Request $request): Renderable
    {
        return view('listUsers')->with('users', User::all()->all());
    }


    //Form create
    public function createConductor(Request $request): Renderable
    {
        return $this->sendToView("formulaireChauffeur", self::CREATE_TAG, route("createConductor"));
    }

    public function createClient(Request $request): Renderable
    {
        return $this->sendToView("formulaireClient", self::CREATE_TAG, route("createClient"));
    }

    public function createFixTarif(Request $request): Renderable
    {
        return $this->sendToView("formulaireTarifFix", self::CREATE_TAG, route("createFixTarif"));
    }

    public function createTaxi(Request $request)
    {
        return $this->sendToView("formulaireAjoutTaxi", self::CREATE_TAG, route('createTaxi'));
    }


    //Form modify
    public function modifyClient(Request $request, int $id): Renderable
    {
        $clients = Client::where('id_client', $id);
        return $this->sendToView("formulaireClient", self::MODIFY_TAG, route("modifyClient", ["id" => $id]), $clients);
    }

    public function modifyConductor(Request $request, int $id): Renderable
    {
        $chauffeur = Chauffeur::where('id_chauffeur', $id)->first();
        return $this->sendToView("formulaireChauffeur", self::MODIFY_TAG, route("modifyConductor", ["id" => $id]), $chauffeur);
    }

    public function modifyFixTarif(Request $request, int $id): Renderable
    {
        //TODO add all fixTarif
        return $this->sendToView("formulaireTarifFix", self::MODIFY_TAG, route("modifyFixTarif", ["id" => $id]));
    }

    public function modifyTaxi(Request $request, int $id): Renderable
    {
        $taxi = Taxi::where('id_taxi', $id)->first();
        return $this->sendToView("formulaireAjoutTaxi", self::MODIFY_TAG, route("modifyTaxi", ["id" => $id]), $taxi);
    }
    
    private function sendToView(string $view, array $tag, string $route, $value = null): Renderable
    {
        $variables = [
            'type' => $tag["type"],
            'routeOnAction' => $route,
            'messageOnAction' => $tag["messageOnAction"],
        ];
        if ($value != null)
        $variables['value'] = $value; 
        return view($view, $variables);
    } 

}
