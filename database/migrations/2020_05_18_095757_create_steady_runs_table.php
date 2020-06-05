<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSteadyRunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
        Schema::create('steady_runs', function (Blueprint $table) {
            $table->id();
            $table->date('training_date');
            $table->unsignedTinyInteger('steady_run_type_id');
            $table->unsignedSmallInteger('duration');
            $table->enum('duration_unit', ['meters', 'miles', 'minutes']);
            $table->unsignedTinyInteger('training_intensity_id');
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

            $table->foreign('steady_run_type_id')
                ->references('id')
                ->on('steady_run_types');

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
        Schema::dropIfExists('steady_runs');
    }
}
