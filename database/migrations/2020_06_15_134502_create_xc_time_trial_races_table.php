<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXCTimeTrialRacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xc_time_trial_races', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('xc_time_trial_id');
            $table->unsignedTinyInteger('gender_id');
            $table->unsignedTinyInteger('cross_country_event_id');
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('xc_time_trial_id')
                ->references('id')
                ->on('xc_time_trials');

            $table->foreign('gender_id')
                ->references('id')
                ->on('genders');

            $table->foreign('cross_country_event_id')
                ->references('id')
                ->on('cross_country_events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('xc_time_trial_races');
    }
}
