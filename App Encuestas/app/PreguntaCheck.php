<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreguntaCheck extends Model
{
    protected $table = 'pregunta_checks';
    protected $fillable = [
        'id_pregunta_check','pregunta_check','id_encuesta',
    ];
    
    public function encuesta()
    {
        return $this->belongsTo(Encuesta::class);
    }
}
