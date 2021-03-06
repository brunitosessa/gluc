<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_hours', function (Blueprint $table) {                        
            $table->increments('id');
            $table->integer('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->boolean('enabled')->default(0);
            $table->integer('bar_id')->unsigned();
            $table->foreign('bar_id')->references('id')->on('bars');

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
        Schema::dropIfExists('business_hours');
    }
}