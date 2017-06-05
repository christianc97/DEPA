<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cedula')->unique();
            $table->string('nombre1');
            $table->string('nombre2');
            $table->string('apellido1');
            $table->string('apellido2');
            $table->string('area');
            $table->date('fecha_nacimiento');
            $table->string('genero');
            $table->string('telefono');
            $table->string('celular');
            $table->string('direccion');
            $table->string('email')->unique();
            $table->string('eps');
            $table->string('afp');
            $table->string('correo_corporativo');
            $table->date('fecha_ingreso');
            $table->date('fecha_finalizacion_contrato');
            $table->string('passwords');
            $table->boolean('activo');
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
        Schema::drop('users');
    }
}
