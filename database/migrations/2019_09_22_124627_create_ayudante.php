<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAyudante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ayudante', function (Blueprint $table) {
            $table->increments('usuario_id');
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
        Schema::dropIfExists('ayudante');
    }
}
