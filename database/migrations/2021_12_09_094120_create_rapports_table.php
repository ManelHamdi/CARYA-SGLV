<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('panne', 50);
            $table->string('desc');
            $table->double('prix');
            $table->date('datePanna');
            $table->integer('nbrJour');
            $table->string('vehicule_matricule')->index();
            $table->integer('employe_id')->unsigned();
            $table->timestamps();
            $table->foreign('vehicule_matricule')->references('matricule')->on('vehicules')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('employe_id')->references('id')->on('employes')
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
        Schema::dropIfExists('rapports');
    }
}
