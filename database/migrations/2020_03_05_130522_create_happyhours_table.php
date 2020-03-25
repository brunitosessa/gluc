<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHappyhoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('happyhours', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('bar_id')->unsigned();
            $table->boolean('enabled')->default(1);
            $table->timestamps();
            $table->foreign('bar_id')->references('id')->on('bars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('happyhours');
    }
}
