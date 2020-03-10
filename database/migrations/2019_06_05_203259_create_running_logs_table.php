<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRunningLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('running_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->date('run_date');
            $table->decimal('distance', 3, 1);
            $table->unsignedInteger('total_seconds');
            $table->unsignedTinyInteger('milliseconds')->nullable();
            $table->unsignedTinyInteger('day_time_id');
            $table->unsignedTinyInteger('run_type_id');
            $table->unsignedTinyInteger('terrain_type_id');
            $table->unsignedTinyInteger('run_effort_id');
            $table->unsignedTinyInteger('run_feeling_id');
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('running_logs');
    }
}
