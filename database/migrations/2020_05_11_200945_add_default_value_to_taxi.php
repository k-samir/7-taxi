<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultValueToTaxi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('taxi', function (Blueprint $table) {
            $table->integer('kilometrage_taxi')->default(0)->change();
            $table->integer('kilometrage_taximetre')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('taxi', function (Blueprint $table) {
            $table->integer('kilometrage_taxi')->default(null)->change();
            $table->integer('kilometrage_taximetre')->default(null)->change();
        });
    }
}
