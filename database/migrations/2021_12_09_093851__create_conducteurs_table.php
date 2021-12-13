<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConducteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conducteurs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom', 35)->nullable();
            $table->string('prenom', 35)->nullable();
            $table->string('adresse', 35)->nullable();
            $table->string('ville', 35)->nullable();
            $table->integer('tel')->nullable();
            $table->date('dateNaissance')->nullable();
            $table->string('lieuNaissance', 35)->nullable();
            $table->string('nationalite', 35)->nullable();
            $table->integer('cin')->nullable();
            $table->date('dateEmit')->nullable();
            $table->string('permisConduire', 35)->nullable();
            $table->date('dateEmitPermis')->nullable();
            $table->string('delivrePermis', 35)->nullable();
            $table->integer('client_id')->unsigned();
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients')
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
        Schema::dropIfExists('conducteurs');
    }
}
