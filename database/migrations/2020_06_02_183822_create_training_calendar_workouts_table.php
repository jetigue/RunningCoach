<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingCalendarWorkoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_calendar_workouts', function (Blueprint $table) {
            $table->id();
            $table->date('workout_date');
            $table->string('name', 50);
            $table->unsignedTinyInteger('training_group_id');
            $table->timestamps();

            $table->foreign('workout_date')
                ->references('calendar_date')
                ->on('calendar');

            $table->foreign('training_group_id')
                ->references('id')
                ->on('training_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('training_calendar_workouts');
    }
}
