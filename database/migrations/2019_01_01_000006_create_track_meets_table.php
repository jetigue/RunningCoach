<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackMeetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('track_meets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedSmallInteger('track_meet_name_id');
            $table->date('meet_date');
            $table->unsignedTinyInteger('season_id');
            $table->unsignedSmallInteger('track_venue_id');
            $table->unsignedSmallInteger('host_id');
            $table->unsignedTinyInteger('timing_method_id');
            $table->string('slug');
            $table->timestamps();

            $table->foreign('host_id')->references('id')->on('hosts');
            $table->foreign('track_meet_name_id')->references('id')->on('track_meet_names');
            $table->foreign('season_id')->references('id')->on('seasons');
            $table->foreign('timing_method_id')->references('id')->on('timing_methods');
            $table->foreign('track_venue_id')->references('id')->on('track_venues');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('track_meets');
    }
}
