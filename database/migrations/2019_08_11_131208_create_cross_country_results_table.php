<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->unsignedTinyInteger('points')->nullable();

            $table->foreign('cross_country_team_result_id')
                ->references('id')
                ->on('cross_country_team_results')
                ->onDelete('cascade');

            $table->foreign('athlete_id')
                ->references('id')
                ->on('athletes')
                ->onDelete('cascade');
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
        Schema::dropIfExists('cross_country_results');
    }
}
