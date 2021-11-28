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
            $table->integer('idClient')->unsigned();
            $table->string('matricule')->index();
            $table->date('dateDebut');
            $table->date('dateFin');
            $table->integer('nbrJour');
            $table->double('remise');
            $table->double('montant');
            $table->double('fraisLivraison');
            $table->double('fraisReprise');
            $table->timestamps();
            $table->foreign('idClient')->references('id')->on('clients')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('matricule')->references('matricule')->on('vehicule')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
