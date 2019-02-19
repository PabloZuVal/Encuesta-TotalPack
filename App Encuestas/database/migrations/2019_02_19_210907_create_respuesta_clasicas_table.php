<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespuestaClasicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuesta_clasicas', function (Blueprint $table) {
            $table->increments('id_respuesta_clasica');
            $table->text('respuesta');
            $table->integer('id_pregunta_clasica')->unsigned(); 
            $table->foreign('id_pregunta_clasica')->references('id_pregunta_clasica')->on('pregunta_clasicas'); 
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
        Schema::dropIfExists('respuesta_clasicas');
    }
}
