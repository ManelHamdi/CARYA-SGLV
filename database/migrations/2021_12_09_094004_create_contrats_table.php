<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->string('vehicule_matricule')->index();
            $table->string('livraison');
            $table->string('reprise');
            $table->dateTime('dateDebut');
            $table->dateTime('dateFin');
            $table->string('carburationD')->nullable();
            $table->string('carburationR')->nullable();
            $table->double('kmD')->nullable();
            $table->double('kmR')->nullable();
            $table->integer('nbrJour');
            $table->string('prolongation')->nullable();
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('vehicule_matricule')->references('matricule')->on('vehicules')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        //DB::statement('ALTER TABLE table_name AUTO_INCREMENT = 21520213;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrats');
    }
}
