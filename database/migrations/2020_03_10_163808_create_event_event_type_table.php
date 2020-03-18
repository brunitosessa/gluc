<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventEventTypeTable extends Migration
{
    public function up()
    {
        Schema::create('event_event_type', function (Blueprint $table) {
            $table->integer('event_id')->unsigned()->index();
            $table->integer('event_type_id')->unsigned()->index();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('event_type_id')->references('id')->on('event_types')->onDelete('cascade');            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_happygluc');
    }
}
