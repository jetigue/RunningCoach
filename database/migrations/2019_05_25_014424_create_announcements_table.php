<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->increments('id');
            $table->date('begin_date');
            $table->date('end_date');
            $table->string('title');
            $table->text('body');
            $table->string('link_1')->nullable();
            $table->string('link_text_1')->nullable();
            $table->string('link_2')->nullable();
            $table->string('link_text_2')->nullable();
            $table->string('link_3')->nullable();
            $table->string('link_text_3')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announcements');
    }
}
