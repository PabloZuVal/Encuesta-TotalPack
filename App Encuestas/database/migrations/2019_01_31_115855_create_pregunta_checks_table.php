<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreguntaChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregunta_checks', function (Blueprint $table) {
            $table->increments('id_pregunta_check');
            $table->string('pregunta_check');
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
        Schema::dropIfExists('pregunta_checks');
    }
}
