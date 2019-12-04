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
            $table->string('nombre');
            $table->string('imagen',255)->default('default.png');;
            $table->integer('localidad');
            $table->string('direccion',200);
            $table->string('descripcion',200)->nullable();
            $table->string('telefono',20);
            $table->string('email',100)->unique();
            $table->float('lat',10,6);
            $table->float('lng',10,6);
            $table->integer('habilitado')->default(1);
            $table->string('password')->nullable();
            $table->string('salt')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('bars');
    }
}
