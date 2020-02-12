<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrossCountryVenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cross_country_venues', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name', 150);
            $table->unsignedTinyInteger('season_id');
            $table->timestamps();

            $table->foreign('season_id')->references('id')->on('seasons');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cross_country_venues');
    }
}
