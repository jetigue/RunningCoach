<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('divisions', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedTinyInteger('gender_id');
            $table->unsignedTinyInteger('level_id');
            $table->string('name')->unique();
            $table->timestamps();

            $table->foreign('gender_id')->references('id')
                ->on('genders');

            $table->foreign('level_id')->references('id')
                ->on('levels');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('divisions');
    }
}
