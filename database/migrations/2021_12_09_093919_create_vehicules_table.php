<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->string('matricule')->primary();
            $table->double('prixLoc');
            $table->date('dateAchat');
            $table->string('type');
            $table->string('model');
            $table->string('marque');
            $table->string('couleur');
            $table->integer('nbrPlaces');
            $table->boolean('climatisation')->default(0);
            $table->string('description');
            $table->string('carburation');
            $table->double('kilometrage')->nullable();
            //$table->string('kilometrage');
            $table->string('puissance');
            $table->string('boiteVitesse');
            $table->string('tailleMoteur');
            $table->boolean('disponibilite')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicules');
    }
}
