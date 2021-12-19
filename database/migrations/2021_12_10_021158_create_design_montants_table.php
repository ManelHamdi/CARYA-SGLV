<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignMontantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designMontants', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('contrat_id')->unsigned();
            $table->double('locationBase')->nullable();
            $table->double('conducteur')->nullable();
            $table->double('siegeBebe')->nullable();
            $table->double('chauffeur')->nullable();
            $table->double('surchargeAerop')->nullable();
            $table->double('remise')->nullable();
            $table->double('fraisLivraison')->nullable();
            $table->double('fraisReprise')->nullable();
            $table->double('tva')->nullable();
            $table->double('suppFranchise')->nullable();
            $table->double('assurancePassager')->nullable();
            $table->double('timbre')->nullable();
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
        Schema::dropIfExists('designMontants');
    }
}
