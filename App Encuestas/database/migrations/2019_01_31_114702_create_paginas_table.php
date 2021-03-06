<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaginasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paginas', function (Blueprint $table) {
            $table->increments('id_pagina');
            $table->string('nombre_seccion');
            $table->integer('secuencia');
            $table->boolean('Activado');
            $table->integer('id_encuesta')->unsigned();
            $table->foreign('id_encuesta')->references('id_encuesta')->on('encuestas'); 
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
        Schema::dropIfExists('paginas');
    }
}
