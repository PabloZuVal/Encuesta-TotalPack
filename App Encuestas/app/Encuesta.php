<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    protected $table = 'encuestas';
    protected $fillable = [
        'id_encuesta','nombre_cli','fecha_emision','encargado_cli','tecnico','observaciones','contacto','id_user',
    ];
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
