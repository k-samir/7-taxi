<?php

namespace App\Http\Controllers;

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
    public function index(Request $request)
    {
        return view('home');
    }


    public function addConductorShift(Request $request): Renderable
    {
        return view("formulaireShift", [
            'todayDate' => Carbon::now()->toDateString() . "T" . Carbon::now()->toTimeString("minute"),
        ]);
    }


    public function createConductor(Request $request): Renderable
    {
        return $this->sendToView("formulaireChauffeur", self::CREATE_TAG, route("createConductor"));
    }

    public function modifyConductorFromRequest(Request $request): Renderable
    {
        return $this->modifyConductor($request, $request['id']);
    }

    public function modifyConductor(Request $request, int $id): Renderable
    {
        return $this->sendToView("formulaireChauffeur", self::MODIFY_TAG, route("modifyConductor", ["id" => $id]), $id);
    }


    public function createClient(Request $request): Renderable
    {
        return $this->sendToView("formulaireClient", self::CREATE_TAG, route("createClient"));
    }

    public function modifyClientFromRequest(Request $request): Renderable
    {
        return $this->modifyClient($request, $request['id']);
    }

    public function modifyClient(Request $request, int $id): Renderable
    {
        return $this->sendToView("formulaireClient", self::MODIFY_TAG, route("modifyClient", ["id" => $id]), $id);
    }


    public function createFixTarif(Request $request): Renderable
    {
        return $this->sendToView("formulaireTarifFix", self::CREATE_TAG, route("createFixTarif"));
    }

    public function modifyFixTarifFromRequest(Request $request): Renderable
    {
        return $this->modifyFixTarif($request, $request['id']);
    }

    public function modifyFixTarif(Request $request, int $id): Renderable
    {
        return $this->sendToView("formulaireTarifFix", self::MODIFY_TAG, route("modifyFixTarif", ["id" => $id]), $id);
    }


    public function modifyTaxi(Request $request, int $id): Renderable
    {
        return $this->sendToView("formulaireAjoutTaxi", self::MODIFY_TAG, route("modifyTaxi", ["id" => $id]), $id);
    }

    public function modifyTaxiFromRequest(Request $request): Renderable
    {
        return $this->modifyTaxi($request, $request['id']);
    }


    private function sendToView(string $view, array $tag, string $route, int $id = -1): Renderable
    {
        $variables = [
            'type' => $tag["type"],
            'routeOnAction' => $route,
            'messageOnAction' => $tag["messageOnAction"],
        ];
        if ($id != -1)
            $variables['id'] = $id;

        return view($view, $variables);
    }

}
