<?php

namespace App\Http\Controllers;


use App\FixTarif;
use App\Http\Requests\FixTarifRequest;
use Illuminate\Contracts\Support\Renderable;

class FixTarifController extends Controller
{
    private $fixTarif;

    public function __construct()
    {
        $this->fixTarif = new FixTarif();
    }


    public function createFixTarif(FixTarifRequest $request): Renderable
    {
        $this->fixTarif->addFixTarif($request);
        return view('home')->with(['message' => "Le tarif fix a bien été créé."]);
    }

    public function modifyFixTarif(FixTarifRequest $request, int $id): Renderable
    {
        $this->fixTarif->updateFixTarif($request, $id);
        return view('home')->with(['message' => "Le tarif fix a bien été modifié."]);
    }

}
