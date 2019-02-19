<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    protected $table = 'encuestas';
    protected $fillable = [
        'id_encuesta','nombre_cli','sucursal','fecha_emision','encargado_cli','tecnico','observaciones','contacto','Activado','id_user',//'id_pregunta_foranea',//agregar foranea
    ];
    
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    
}
