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
            $table->string('matricule', 40)->primary();
            $table->double('prixLoc');
            $table->date('dateAchat');
            $table->string('type', 35);
            $table->string('model', 35);
            $table->string('marque', 35);
            $table->string('couleur', 35);
            $table->integer('nbrPlaces');
            $table->boolean('climatisation')->default(0);
            $table->string('description');
            $table->string('carburation', 35);
            $table->integer('kilometrage')->nullable();
            //$table->string('kilometrage', 35);
            $table->string('puissance', 35);
            $table->string('boiteVitesse', 35);
            $table->string('tailleMoteur', 35);
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
