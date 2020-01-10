<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('image',255)->default('default.jpg');
            $table->string('address',200);
            $table->float('lat',10,6);
            $table->float('lng',10,6);
            $table->string('description',200)->nullable();
            $table->integer('city_id')->unsigned()->nullable()->default(null);
            $table->integer('enabled')->default(1);
            $table->date('date');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
}
