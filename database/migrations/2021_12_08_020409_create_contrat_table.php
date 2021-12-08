<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->string('vehicule_matricule')->index();
            $table->date('dateDebut');
            $table->date('dateFin');
            $table->integer('nbrJour');
            $table->double('remise');
            $table->double('montant');
            $table->double('fraisLivraison');
            $table->double('fraisReprise');
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('vehicule_matricule')->references('matricule')->on('vehicules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrat');
    }
}
