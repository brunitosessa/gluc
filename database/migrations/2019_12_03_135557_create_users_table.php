<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lastname');
            $table->string('avatar',255)->default('default.jpg');
            $table->string('phone',20)->nullable();
            $table->string('email',100)->unique();
            $table->string('facebook_id',150)->nullable()->unique();
            $table->integer('city_id')->unsigned()->nullable();
            $table->string('password')->nullable();
            $table->string('device_token', 170)->nullable()->default(null);
            $table->string('api_token', 80)->unique()->nullable()->default(null);
            $table->foreign('city_id')->references('id')->on('cities');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
