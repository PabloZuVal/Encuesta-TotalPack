<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pagina extends Model
{
    protected $table = 'paginas';
    protected $fillable = [
        'id_pagina','nombre_seccion','secuencia','Activado','id_encuesta',
    ];
    
    public function users()
    {
        return $this->belongsTo(pregunta::class);
    }
}
