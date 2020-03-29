<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrossCountryMeetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cross_country_meets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedSmallInteger('cross_country_meet_name_id');
            $table->date('meet_date');
            $table->unsignedSmallInteger('cross_country_venue_id');
            $table->unsignedSmallInteger('host_id');
            $table->unsignedTinyInteger('timing_method_id');
            $table->string('slug')->unique();
            $table->timestamps();

            $table->foreign('host_id')->references('id')->on('hosts');
            $table->foreign('cross_country_meet_name_id')->references('id')->on('cross_country_meet_names');
            $table->foreign('timing_method_id')->references('id')->on('timing_methods');
            $table->foreign('cross_country_venue_id')->references('id')->on('cross_country_venues');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cross_country_meets');
    }
}
