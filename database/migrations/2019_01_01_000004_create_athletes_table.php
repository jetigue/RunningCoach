<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAthletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('athletes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->char('sex', 1);
            $table->date('dob')->nullable();
            $table->unsignedSmallInteger('grad_year');
            $table->char('status', 1);
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedTinyInteger('training_group_id')->default(1);
            $table->string('slug')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('training_group_id')->references('id')->on('training_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('athletes');
    }
}
