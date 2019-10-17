<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleTurno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_turno', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('turno_id')->unsigned();
            $table->foreign('turno_id')->references('id')->on('turno')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('dtespecialidad_id')->unsigned();
            $table->foreign('dtespecialidad_id')->references('id')->on('detalle_especialidad')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->date('hora_inicio');
            $table->date('hora_fin')->nullable();
            $table->time('fecha_inicio');
            $table->time('fecha_fin')->nullable();
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
        Schema::dropIfExists('detalle_turno');
    }
}
