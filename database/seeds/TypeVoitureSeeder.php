<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeVoitureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_voiture')->insert(
                [
                    ['nb_place' => 5],
                    ['nb_place' => 7],
                ]
        );
    }
}
