<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUbicacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubicacion', function (Blueprint $table) {
            $table->increments('id');
            $table->double('latitud',15,10);
            $table->double('longitud',15,10);
            $table->integer('ayudante_id')->unsigned();
            $table->foreign('ayudante_id')->references('usuario_id')->on('ayudante')
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
        Schema::dropIfExists('ubicacion');
    }
}
