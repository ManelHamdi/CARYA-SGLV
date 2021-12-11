<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('cartGrise')->default(0);
            $table->boolean('attestAssurance')->default(0);
            $table->boolean('carteExploitation')->default(0);
            $table->boolean('vignatte')->default(0);
            $table->boolean('visiteTechnique')->default(0);
            $table->boolean('roueSecours')->default(0);
            $table->boolean('lecteurCd')->default(0);
            $table->boolean('tapis')->default(0);
            $table->boolean('cric')->default(0);
            $table->boolean('enjoliveur')->default(0);
            $table->boolean('antenne')->default(0);
            $table->boolean('allumeCigar')->default(0);
            $table->boolean('trianglePanne')->default(0);
            $table->boolean('autre')->default(0);
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
        Schema::dropIfExists('checkouts');
    }
}
