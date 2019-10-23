<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioMovil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_movil', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('foto');
            $table->string('apellido');
            $table->string('correo');
            $table->string('contrasena');
            $table->string('genero');
            $table->date('fecha_nacimiento');
            $table->integer('celular');
            $table->integer('contacto_emergencia');
            $table->double('latitud',15,10);
            $table->double('longitud',15,10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_movil');
    }
}
