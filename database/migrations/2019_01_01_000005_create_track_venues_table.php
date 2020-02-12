<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackVenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('track_venues', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name', 150);
            $table->unsignedTinyInteger('track_surface_id');
            $table->timestamps();

            $table->foreign('track_surface_id')->references('id')->on('track_surfaces');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('track_venues');
    }
}
