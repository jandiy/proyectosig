<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiante', function (Blueprint $table) {
            $table->integer('usuario_id')->unsigned();
            $table->string('carrera');
            $table->string('facultad');
            $table->date('fecha_registro');
            $table->integer('estado');
            $table->foreign('usuario_id')->references('id')->on('usuario_movil')
                ->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiante');
    }
}
