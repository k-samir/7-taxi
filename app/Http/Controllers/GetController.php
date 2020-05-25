<?php

namespace App\Http\Controllers;

use App\Taxi;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

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
    public function indexNo(Request $request)
    {
        return view('home')->with('Connected',false);
    }
    public function index(Request $request){
        return view('home');
    }


    public function addConductorShift(Request $request): Renderable
    {
        $taxis = Taxi::All();
        return view("formulaireShift", [
            'todayDate' => Carbon::now()->toDateString() . "T" . Carbon::now()->toTimeString("minute"),
        ])->with('taxis',$taxis);
    }

    //create
    public function createConductor(Request $request): Renderable{
        return $this->sendToView("formulaireChauffeur", self::CREATE_TAG, route("createConductor"));
    }

    public function createClient(Request $request): Renderable{
        return $this->sendToView("formulaireClient", self::CREATE_TAG, route("createClient"));
    }
    
    public function createFixTarif(Request $request): Renderable{
        return $this->sendToView("formulaireTarifFix", self::CREATE_TAG, route("createFixTarif"));
    }

    public function createTaxi(Request $request){
        return $this->sendToView("formulaireAjoutTaxi", self::CREATE_TAG, route('createTaxi'));
    }
    
    //modify
    public function modifyClient(Request $request, int $id): Renderable{
        return $this->sendToView("formulaireClient", self::MODIFY_TAG, route("modifyClient", ["id" => $id]));
    }

    public function modifyConductor(Request $request, int $id): Renderable{
        return $this->sendToView("formulaireChauffeur", self::MODIFY_TAG, route("modifyConductor", ["id" => $id]));
    }

    public function modifyFixTarif(Request $request, int $id): Renderable{
        return $this->sendToView("formulaireTarifFix", self::MODIFY_TAG, route("modifyFixTarif", ["id" => $id]));
    }

    public function modifyTaxi(Request $request, int $id): Renderable{
        $taxi = Taxi::where('id_taxi',$id)->first();
        return $this->sendToView("formulaireAjoutTaxi", self::MODIFY_TAG, route("modifyTaxi", ["id" => $id]),$taxi);
    }



    private function sendToView(string $view, array $tag, string $route, $value=null): Renderable
    {
        $variables = [
            'type' => $tag["type"],
            'routeOnAction' => $route,
            'messageOnAction' => $tag["messageOnAction"],
        ];
        if($value != null) {
            $variables['value'] = $value;
        }

        return view($view, $variables);
    }

}
