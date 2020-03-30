<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('style');
            $table->string('description');
            $table->string('brand');
            $table->string('color');
            $table->integer('ibu')->nullable();
            $table->integer('alcohol')->nullable();
            $table->float('price')->nullable();
            $table->float('happyhour_price')->nullable();
            $table->boolean('enabled')->default(1);
            $table->integer('bar_id')->unsigned();
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
        Schema::dropIfExists('beers');
    }
}
