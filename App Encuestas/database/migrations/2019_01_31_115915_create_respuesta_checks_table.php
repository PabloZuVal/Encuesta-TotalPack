<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespuestaChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuesta_checks', function (Blueprint $table) {
            $table->increments('id_respuesta_check');
            $table->boolean('respuesta_chack');
            $table->integer('id_pregunta_check')->unsigned(); 
            $table->foreign('id_pregunta_check')->references('id_pregunta_check')->on('pregunta_checks'); 
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
        Schema::dropIfExists('respuesta_checks');
    }
}
