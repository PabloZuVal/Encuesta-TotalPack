<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreguntaClasicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregunta_clasicas', function (Blueprint $table) {
            $table->increments('id_pregunta_clasica');
            $table->string('pregunta');
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
        Schema::dropIfExists('pregunta_clasicas');
    }
}
