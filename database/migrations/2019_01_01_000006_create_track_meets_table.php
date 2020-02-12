<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->unsignedSmallInteger('meet_name_id');
            $table->date('meet_date');
            $table->unsignedTinyInteger('season_id');
            $table->unsignedSmallInteger('track_venue_id');
            $table->unsignedSmallInteger('host_id');
            $table->unsignedTinyInteger('timing_method_id');
            $table->string('slug')->unique();
            $table->timestamps();

            $table->foreign('host_id')->references('id')->on('hosts');
            $table->foreign('meet_name_id')->references('id')->on('meet_names');
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
