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
            $table->string('matricule', 30)->primary();
            $table->double('prixLoc');
            $table->date('dateAchat');
            $table->string('type', 30);
            $table->string('model', 30);
            $table->string('marque', 30);
            $table->string('couleur', 30);
            $table->integer('nbrPlaces');
            $table->boolean('climatisation')->default(0);
            $table->string('description');
            $table->string('carburation', 30);
            $table->string('kilometrage', 30);
            $table->string('puissance', 30);
            $table->string('boiteVitesse', 30);
            $table->string('tailleMoteur', 30);
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
