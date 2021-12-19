<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMontantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('montants', function (Blueprint $table) {
            $table->increments('id');
            $table->double('sousTotal')->nullable();
            $table->double('montantNet')->nullable();
            $table->double('montantDuD')->nullable();
            $table->double('montantRecu')->nullable();
            $table->double('montantDu')->nullable();
            $table->bigInteger('contrat_id')->unsigned();
            $table->timestamps();
            $table->foreign('contrat_id')->references('id')->on('contrats')
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
        Schema::dropIfExists('montants');
    }
}
