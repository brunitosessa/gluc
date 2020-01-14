<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicitiesTable extends Migration
{
    public function up()
    {
        Schema::create('publicities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('image',255)->default('default.jpg');
            $table->string('description',200)->nullable();
            $table->integer('city_id')->unsigned();
            $table->date('end_date');
            $table->integer('enabled')->default(1);
            $table->timestamps();
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    public function down()
    {
        Schema::dropIfExists('publicities');
    }
}
