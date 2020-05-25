<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create("chauffeur", function (Blueprint $table) {
            $table->integer("id_chauffeur", true);
            $table->integer("no_chauffeur")->nullable(true);
            $table->string("prenom", 255)->nullable(true);
            $table->string("nom", 255)->nullable(true);
            $table->float("commission", 3, 2)->nullable(true);
            $table->string("telephone", 255)->nullable(true);
            $table->integer("no_rue")->nullable(true);
            $table->string("rue", 255)->nullable(true);
            $table->string("ville", 255)->nullable(true);
            $table->string("code_postal", 10)->nullable(true);
            $table->string("no_permis", 50)->nullable(true);
            $table->date("date_expiration_permis")->nullable(true);
            $table->float("solde", 7, 2)->nullable(true);
            $table->timestamps();
        });

        Schema::create("type_voiture", function (Blueprint $table) {
            $table->integer("no_type_voiture", true);
            $table->integer("nb_place")->nullable(true);
            $table->timestamps();
        });

        Schema::create('taxi', function (Blueprint $table) {
            $table->integer("id_taxi", true);
            $table->string("no_taxi", 255);
            $table->string("plaque_immatriculation", 20);
            $table->float("kilometrage_taxi",16,1);
            $table->date("date_debut_circulation");
            $table->string("no_assurance", 255);
            $table->string("no_taximetre", 255);
            $table->float("kilometrage_taximetre");
            $table->float("kilometrage_en_charge_taximetre");
            $table->float("recette_taximetre");
            $table->integer("prise_en_charge_taximetre");
            $table->integer("no_type_voiture");
            $table->timestamps();

            $table->foreign("no_type_voiture", "no_type_voiture")->references("no_type_voiture")->on("type_voiture");
        });

        Schema::create("client", function (Blueprint $table) {
            $table->integer("id_client", true);
            $table->float("solde_client", 7, 2)->nullable(true);
            $table->string("prenom", 255)->nullable(true);
            $table->string("nom", 255)->nullable(true);
            $table->string("telephone", 255)->nullable(true);
            $table->string("email", 255)->nullable(true);
            $table->integer("no_rue")->nullable(true);
            $table->string("rue", 255)->nullable(true);
            $table->string("ville", 255)->nullable(true);
            $table->string("code_postal", 10)->nullable(true);
            $table->timestamps();
        });

        Schema::create("type_paiement", function (Blueprint $table) {
            $table->integer("id_type_paiement", true);
            $table->string("nom", 255)->nullable(false);
            $table->timestamps();
        });

        Schema::create("formulaire", function (Blueprint $table) {
            $table->integer("id_formulaire", true);
            $table->dateTime("date_debut")->nullable(false);
            $table->dateTime("date_fin")->nullable(false);
            $table->float("recette_depart", 7, 2)->nullable(false);
            $table->float("recette_arrivee", 7, 2)->nullable(false);
            $table->float("prix_fixes", 7, 2)->nullable(false);
            $table->integer("kilometrage_depart")->nullable(false);
            $table->integer("kilometrage_arrivee")->nullable(false);
            $table->integer("kilometrage_pris_en_charge_depart")->nullable(false);
            $table->integer("kilometrage_pris_en_charge_arrivee")->nullable(false);
            $table->integer("prise_en_charge_debut")->nullable(false);
            $table->integer("prise_en_charge_arrive")->nullable(false);
            $table->integer("kilometrage_auto_depart")->nullable(false);
            $table->integer("kilometrage_auto_arrivee")->nullable(false);
            $table->float("depense_gaz", 7, 2)->nullable(true);
            $table->float("depense_credit", 7, 2)->nullable(true);
            $table->float("depense_divers", 7, 2)->nullable(true);
            $table->integer("id_taxi")->nullable(false);
            $table->integer("id_chauffeur")->nullable(false);
            $table->timestamps();

            $table->foreign("id_taxi")->references("id_taxi")->on("taxi");
            $table->foreign("id_chauffeur")->references("id_chauffeur")->on("chauffeur");

        });

        Schema::create("paiement", function (Blueprint $table) {
            $table->integer("id_paiement", true);
            $table->float("solde", 7, 2)->nullable(false);
            $table->dateTime("date")->nullable(false);
            $table->integer("id_formulaire")->nullable(true);
            $table->integer("id_type_paiement")->nullable(true);
            $table->integer("id_client")->nullable(true);
            $table->timestamps();

            $table->foreign("id_formulaire")->references("id_formulaire")->on("formulaire");
            $table->foreign("id_type_paiement")->references("id_type_paiement")->on("type_paiement");
            $table->foreign("id_client")->references("id_client")->on("client");

        });

        Schema::create("type_tarif_fixe", function (Blueprint $table) {
            $table->integer("id_type_tarif_fixe", true);
            $table->string("lieu_depart", 255)->nullable(false);
            $table->string("lieu_arrive", 255)->nullable(false);
            $table->float("montant", 7, 2)->nullable(true);
        });

        Schema::create("tarif_fixe", function (Blueprint $table) {
            $table->integer("id_tarif_fixe", true);
            $table->float("montant", 7, 2)->nullable(false);
            $table->dateTime("date")->nullable(true);
            $table->integer("id_formulaire")->nullable(false);
            $table->integer("id_type_tarif_fixe")->nullable(true);
            $table->timestamps();

            $table->foreign("id_formulaire")->references("id_formulaire")->on("formulaire");
            $table->foreign("id_type_tarif_fixe")->references("id_type_tarif_fixe")->on("type_tarif_fixe");

        });

        
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('tarif_fixe');
        Schema::dropIfExists('type_tarif_fixe');
        Schema::dropIfExists('paiement');
        Schema::dropIfExists('formulaire');
        Schema::dropIfExists('type_paiement');
        Schema::dropIfExists('client');
        Schema::dropIfExists('taxi');
        Schema::dropIfExists('type_voiture');
        Schema::dropIfExists('chauffeur');

    }


}
