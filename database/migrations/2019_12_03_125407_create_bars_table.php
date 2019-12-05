<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image',255)->default('default.png');;
            $table->integer('city_id')->unsigned()->nullable()->default(null);
            $table->string('address',200);
            $table->string('description',200)->nullable();
            $table->string('phone',20);
            $table->string('email',100)->unique();
            $table->float('lat',10,6);
            $table->float('lng',10,6);
            $table->integer('enabled')->default(1);
            $table->string('password')->nullable();
            $table->string('salt')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bars');
    }
}
