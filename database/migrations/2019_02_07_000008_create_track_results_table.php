<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->unsignedTinyInteger('event_id');
            $table->unsignedSmallInteger('place');
            $table->unsignedTinyInteger('minutes');
            $table->unsignedTinyInteger('seconds');
            $table->unsignedInteger('total_seconds');
            $table->unsignedTinyInteger('milliseconds')->nullable();
            $table->unsignedTinyInteger('points')->nullable();
            $table->timestamps();

            $table->foreign('track_team_result_id')
                ->references('id')
                ->on('track_team_results')
                ->onDelete('cascade');

            $table->foreign('event_id')
                ->references('id')
                ->on('events')
                ->onDelete('cascade');

            $table->foreign('athlete_id')
                ->references('id')
                ->on('athletes')
                ->onDelete('cascade');
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
