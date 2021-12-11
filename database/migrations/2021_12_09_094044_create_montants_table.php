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
            $table->double('sousTotal');
            $table->double('montantNet');
            $table->double('montantDuD');
            $table->double('montantRecu');
            $table->double('montantDu');
            $table->integer('contrat_id')->unsigned();
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
