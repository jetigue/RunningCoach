<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXCTimeTrialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xc_time_trials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->date('trial_date');
            $table->unsignedSmallInteger('cross_country_venue_id');
            $table->unsignedTinyInteger('timing_method_id');
            $table->timestamps();

            $table->foreign('cross_country_venue_id')
                ->references('id')
                ->on('cross_country_venues');

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
        Schema::dropIfExists('xc_time_trials');
    }
}
