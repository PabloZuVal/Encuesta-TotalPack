<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuestas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_encuesta');
            $table->string('nombre_cli');
            $table->string('sucursal');
            $table->dateTime('fecha_emision');
            $table->string('encargado_cli');
            $table->string('tecnico');
            $table->text('observaciones');
            $table->string('contacto');
            $table->boolean('Activado');
            $table->integer('id_user')->unsigned(); 
            $table->foreign('id_user')->references('id')->on('users'); 
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
        Schema::dropIfExists('encuestas');
    }
}
