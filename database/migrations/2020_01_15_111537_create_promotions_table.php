<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('image',255)->default('default.jpg');
            $table->string('description',200)->nullable();
            $table->boolean('enabled')->default(1);
            $table->boolean('exclusive')->default(0);
            $table->integer('bar_id')->unsigned();
            $table->date('end_date')->nullable();
            $table->timestamps();
            $table->foreign('bar_id')->references('id')->on('bars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotions');
    }
}
