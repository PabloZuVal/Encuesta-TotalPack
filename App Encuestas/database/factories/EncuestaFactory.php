<?php

use Faker\Generator as Faker;

$factory->define(App\Encuesta::class, function (Faker $faker) {
    $texto = $facker->unique()->word(5);
    return [
        'nombre_cli' => $facker->unique()->word(5),
        'fecha_emision' =>$facker->date,
        'encargado_cli' =>$facker->word(5),
        'tecnico' =>$facker->name,
        'contacto' =>$facker->text(20),

    ];
});
