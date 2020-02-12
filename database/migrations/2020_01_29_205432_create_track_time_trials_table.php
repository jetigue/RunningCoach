<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackTimeTrialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('track_time_trials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->date('trial_date');
            $table->unsignedSmallInteger('track_venue_id');
            $table->unsignedTinyInteger('timing_method_id');
            $table->timestamps();

            $table->foreign('track_venue_id')
                ->references('id')
                ->on('track_venues');

            $table->foreign('timing_method_id')
                ->references('id')
                ->on('timing_methods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('track_time_trials');
    }
}
