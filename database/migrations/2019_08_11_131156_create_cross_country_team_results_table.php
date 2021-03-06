<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->unsignedTinyInteger('race_title_id')->nullable();
            $table->unsignedTinyInteger('cross_country_event_id');
            $table->unsignedSmallInteger('place')->nullable();
            $table->unsignedSmallInteger('points')->nullable();
            $table->unsignedSmallInteger('number_teams');
            $table->unsignedSmallInteger('number_runners');
            $table->text('notes')->nullable();
            $table->string('slug');
            $table->timestamps();

            $table->foreign('cross_country_meet_id')
                ->references('id')
                ->on('cross_country_meets');

            $table->foreign('division_id')
                ->references('id')
                ->on('divisions');

            $table->foreign('cross_country_event_id')
                ->references('id')
                ->on('cross_country_events');

            $table->foreign('race_title_id')
                ->references('id')
                ->on('race_titles');
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
