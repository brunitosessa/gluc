<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHappyglucUserTable extends Migration
{
    public function up()
    {
        Schema::create('happygluc_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->index();
            $table->integer('happygluc_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('happygluc_id')->references('id')->on('happyglucs')->onDelete('cascade');            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_happygluc');
    }
}
