<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $table = 'preguntas';
    protected $fillable = [
        'id_pregunta','pregunta','id_encuesta_foranea',
    ];
    
    public function encuesta()
    {
        return $this->belongsTo(Encuesta::class);
    }
}
