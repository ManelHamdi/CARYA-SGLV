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
            $table->string('livraison', 50);
            $table->string('reprise', 50);
            $table->date('dateDebut');
            $table->date('dateFin');
            $table->string('carburationL', 30)->nullable();
            $table->string('carburationR', 30)->nullable();
            $table->string('kmL', 30)->nullable();
            $table->string('kmR', 30)->nullable();
            $table->integer('nbrJour');
            $table->string('prolongation', 30)->nullable();
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('vehicule_matricule')->references('matricule')->on('vehicules')
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
