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
            $table->string('nombre');
            $table->string('apellido');
            // $table->string('celular');
            // $table->string('email');
            // $table->string('token');
            // $table->string('idFacebook');
            // $table->string('tokenAndroid');
            // $table->integer('adminBar');
            // $table->integer('administrador');
            // $table->integer('localidad');
            // $table->timestamp('ultimaConexion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
