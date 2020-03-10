<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('track_results', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('track_team_result_id');
            $table->unsignedInteger('athlete_id');
            $table->unsignedTinyInteger('track_event_id');
            $table->unsignedSmallInteger('place');
            $table->unsignedInteger('total_seconds');
            $table->unsignedTinyInteger('milliseconds')->nullable();
            $table->unsignedTinyInteger('points')->nullable();
            $table->unsignedTinyInteger('heat')->default(1);
            $table->timestamps();

            $table->foreign('track_team_result_id')
                ->references('id')
                ->on('track_team_results');

            $table->foreign('track_event_id')
                ->references('id')
                ->on('track_events');

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
        Schema::dropIfExists('track_results');
    }
}
