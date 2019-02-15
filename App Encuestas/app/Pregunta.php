<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $table = 'preguntas';
    protected $fillable = [
        'id_pregunta','pregunta','tipo_respuesta','Activado','secuencia','id_pagina',
    ];
    
    public function encuesta()
    {
        return $this->belongsTo(pagina::class);
    }
}
