<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrossCountryResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cross_country_results', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('cross_country_team_result_id');
            $table->unsignedInteger('athlete_id');
            $table->unsignedSmallInteger('place');
            $table->unsignedInteger('total_seconds');
            $table->unsignedTinyInteger('milliseconds')->nullable();
            $table->unsignedSmallInteger('points')->nullable();
            $table->float('vdot', 3,1)->nullable();
            $table->timestamps();

            $table->foreign('cross_country_team_result_id')
                ->references('id')
                ->on('cross_country_team_results');

            $table->foreign('athlete_id')
                ->references('id')
                ->on('athletes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cross_country_results');
    }
}
