<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom', 25);
            $table->string('prenom', 25);
            $table->string('adresse', 35)->nullable();
            $table->string('ville', 25)->nullable();
            $table->integer('tel')->nullable();
            $table->string('email', 25)->nullable();
            $table->String('password')->nullable();
            $table->date('dateNaissance')->nullable();
            $table->string('lieuNaissance', 25)->nullable();
            $table->integer('cin')->nullable();
            $table->string('nationalite', 25)->nullable();
            $table->date('dateEmit')->nullable();
            $table->string('permisConduire', 35)->nullable();
            $table->date('dateEmitPermis')->nullable();
            $table->string('delivrePermis', 35)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('clients');
    }
}
