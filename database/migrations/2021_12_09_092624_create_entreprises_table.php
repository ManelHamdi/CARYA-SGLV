<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateEntreprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entreprises', function (Blueprint $table) {
            //$table->id();
            $table->increments('id');
            $table->string('adresse', 40);
            $table->string('ville', 40);
            $table->string('email', 50);
            $table->string('rib');
            $table->string('matfisc');
            $table->integer('telephone');
            $table->integer('telephone2');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE entreprises ADD logo LONGBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entreprises');
    }
}
