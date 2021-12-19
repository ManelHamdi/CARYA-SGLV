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
            $table->double('prixLoc')->nullable();
            $table->date('dateAchat')->nullable();
            $table->string('type')->nullable();
            $table->string('model')->nullable();
            $table->string('marque')->nullable();
            $table->string('couleur')->nullable();
            $table->integer('nbrPlaces')->nullable();
            $table->boolean('climatisation')->default(0);
            $table->longText('description')->nullable();
            $table->string('carburation')->nullable();
            $table->double('kilometrage')->nullable();
            //$table->string('kilometrage');
            $table->string('puissance')->nullable();
            $table->string('boiteVitesse')->nullable();
            $table->string('tailleMoteur')->nullable();
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
