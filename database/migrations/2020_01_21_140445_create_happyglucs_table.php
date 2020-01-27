<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHappyglucsTable extends Migration
{
    public function up()
    {
        Schema::create('happyglucs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('frequency');
            $table->integer('quantity');
            $table->boolean('exclusive')->default(0);
            $table->integer('bar_id')->unsigned()->unique();
            $table->boolean('enabled')->default(1);
            $table->timestamps();
            $table->foreign('bar_id')->references('id')->on('bars');
        });
    }

    public function down()
    {
        Schema::dropIfExists('happyglucs');
    }
}
