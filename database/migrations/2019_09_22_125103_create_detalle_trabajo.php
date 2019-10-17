<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleTrabajo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_trabajo', function (Blueprint $table) {
            $table->increments('id');
            $table->time('hora');
            $table->string('nombre')->nullable();
            $table->date('fecha');
            $table->integer('estado');
            $table->integer('dtespecialidad_id')->unsigned();
            $table->foreign('dtespecialidad_id')->references('id')->on('detalle_especialidad')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('trabajo_id')->unsigned();
                    $table->foreign('trabajo_id')->references('id')->on('trabajo')
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
        Schema::dropIfExists('detalle_trabajo');
    }
}
