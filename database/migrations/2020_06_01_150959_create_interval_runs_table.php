<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntervalRunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interval_runs', function (Blueprint $table) {
            $table->id();
            $table->date('training_date');
            $table->unsignedTinyInteger('interval_run_type_id');
            $table->unsignedTinyInteger('number_sets')->default(1);
            $table->unsignedTinyInteger('number_repetitions');
            $table->unsignedSmallInteger('duration');
            $table->unsignedTinyInteger('training_intensity_id');
            $table->enum('duration_unit', ['meters', 'miles', 'minutes', 'seconds']);
            $table->unsignedSmallInteger('recovery');
            $table->enum('recovery_unit', ['meters', 'miles', 'minutes', 'seconds']);
            $table->enum('recovery_type', ['Easy', 'jog', 'walk', 'rest']);
            $table->enum('workout', ['primary', 'secondary']);
            $table->enum('varsity', ['yes', 'no'])->default('no');
            $table->enum('junior_varsity', ['yes', 'no'])->default('no');
            $table->enum('open', ['yes', 'no'])->default('no');
            $table->enum('beginner', ['yes', 'no'])->default('no');

            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('training_date')
                ->references('calendar_date')
                ->on('calendar');

            $table->foreign('interval_run_type_id')
                ->references('id')
                ->on('interval_run_types');

            $table->foreign('training_intensity_id')
                ->references('id')
                ->on('training_intensities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interval_runs');
    }
}
