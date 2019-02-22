<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $table = 'preguntas';
    protected $fillable = [
        'id_pregunta','pregunta','tipo_respuesta','Activado','secuencia','id_pagina',
    ];
    
    public function pagina()
    {
        return $this->hasto(pagina::class); //ver bien esta relacion
    }
}
