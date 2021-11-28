<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapport', function (Blueprint $table) {
            $table->increments('id');
            $table->string('panne', 50);
            $table->string('desc');
            $table->double('prix');
            $table->date('datePanna');
            $table->integer('nbrJour');
            $table->string('matricule')->index();
            $table->integer('idEmploye')->unsigned();
            $table->timestamps();
            $table->foreign('matricule')->references('matricule')->on('vehicule')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('idEmploye')->references('id')->on('employes')
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
        Schema::dropIfExists('rapport');
    }
}
