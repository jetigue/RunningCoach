<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrossCountryTeamResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cross_country_team_results', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cross_country_meet_id');
            $table->unsignedSmallInteger('division_id');
            $table->unsignedTinyInteger('event_id');
            $table->unsignedSmallInteger('place');
            $table->unsignedSmallInteger('points')->nullable();
            $table->unsignedSmallInteger('number_teams');
            $table->string('slug');
            $table->timestamps();

            $table->foreign('cross_country_meet_id')
                ->references('id')
                ->on('cross_country_meets')
                ->onDelete('cascade');

            $table->foreign('division_id')
                ->references('id')
                ->on('divisions');

            $table->foreign('event_id')
                ->references('id')
                ->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cross_country_team_results');
    }
}
