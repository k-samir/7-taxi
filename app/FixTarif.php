<?php

namespace App;

use App\Http\Requests\FixTarifRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FixTarif extends Model
{


    public function addFixTarif(FixTarifRequest $request): void
    {
        DB::table('type_tarif_fixe')->insert([
            'lieu_depart' => $request['startingLocation'],
            'lieu_arrive' => $request['endingLocation'],
            'montant' => $request['amount'],
        ]);
    }

    public function updateFixTarif(FixTarifRequest $request, int $id): void
    {
        DB::table('type_tarif_fixe')
            ->where("id_type_tarif_fixe", $id)
            ->update([
            'lieu_depart' => $request['startingLocation'],
            'lieu_arrive' => $request['endingLocation'],
            'montant' => $request['amount'],
        ]);
    }


}
