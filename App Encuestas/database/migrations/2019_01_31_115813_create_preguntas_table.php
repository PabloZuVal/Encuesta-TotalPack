<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->increments('id_pregunta');
            $table->string('pregunta');
            $table->enum('tipo_respuesta',['checkbox','string','select']); //agregado 
            $table->boolean('Activado');
            $table->integer('secuencia');
            $table->integer('id_pagina')->unsigned(); 
            $table->foreign('id_pagina')->references('id_pagina')->on('paginas'); 
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
        Schema::dropIfExists('preguntas');
    }
}
