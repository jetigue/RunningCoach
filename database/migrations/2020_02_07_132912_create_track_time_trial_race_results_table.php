<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackTimeTrialRaceResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('track_time_trial_race_results', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('track_time_trial_race_id');
            $table->unsignedInteger('athlete_id');
            $table->unsignedSmallInteger('place');
            $table->unsignedInteger('total_seconds');
            $table->unsignedTinyInteger('milliseconds')->nullable();
            $table->float('vdot', 3,1)->nullable();
            $table->unsignedTinyInteger('heat');
            $table->timestamps();

            $table->foreign('athlete_id')
                ->references('id')
                ->on('athletes');

            $table->foreign('track_time_trial_race_id')
                ->references('id')
                ->on('track_time_trial_races');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('track_time_trial_race_results');
    }
}
