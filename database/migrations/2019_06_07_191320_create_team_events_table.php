<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('event_date');
            $table->string('event_time');
            $table->string('location');
            $table->string('details')->nullable();
            $table->string('link')->nullable();
            $table->string('link_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_events');
    }
}
