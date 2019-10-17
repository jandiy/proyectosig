<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleEspecialidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_especialidad', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ayudante_id')->unsigned();
            $table->foreign('ayudante_id')->references('id')->on('usuario_movil')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('especialidad_id')->unsigned();
            $table->foreign('especialidad_id')->references('id')->on('especialidad')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_especialidad');
    }
}
