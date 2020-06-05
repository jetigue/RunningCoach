<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingIntensitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_intensities', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name');
            $table->string('percentVO2Max');
            $table->string('percentHRMax');
            $table->text('description');
            $table->text('purpose');
            $table->string('sources');
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
        Schema::dropIfExists('training_intensities');
    }
}
