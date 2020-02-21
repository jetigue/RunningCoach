<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackTeamResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('track_team_results', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('track_meet_id');
            $table->unsignedSmallInteger('division_id');
            $table->unsignedSmallInteger('place');
            $table->unsignedSmallInteger('points')->nullable();
            $table->unsignedSmallInteger('number_teams');
            $table->text('notes')->nullable();
            $table->string('slug');
            $table->timestamps();

            $table->foreign('track_meet_id')
                ->references('id')
                ->on('track_meets');

            $table->foreign('division_id')
                ->references('id')
                ->on('divisions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('track_team_results');
    }
}
