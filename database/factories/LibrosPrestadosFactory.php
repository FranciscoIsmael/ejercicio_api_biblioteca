<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LibrosPrestados;
use Faker\Generator as Faker;

$factory->define(LibrosPrestados::class, function (Faker $faker) {
    return [
        //
        'id_usuario'=> factory(\App\Usuario::class),
        'id_libro'=> factory(\App\Libro::class)
    ];
});
