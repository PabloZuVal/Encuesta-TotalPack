<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespuestaClasica extends Model
{
    protected $table = 'respuesta_clasicas';
    protected $fillable = [
        'id_respuesta_clasica','respuesta','id_pregunta_clasica',
    ];
    
    public function preguntaClasica()
    {
        return $this->belongsTo(PreguntaClasica::class);
    }
}
