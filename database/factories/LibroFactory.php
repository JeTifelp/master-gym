<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Libro;
use Faker\Generator as Faker;

$factory->define(Libro::class, function (Faker $faker) {
    return [
        //
        'nombre' => $faker->text(30),
        'autor' => $faker->name,
        'genero' => $faker->randomElement(['novela', 'Ciencia', 'Infantil', 'Cocina', 'Poesia']),
        'editorial' => $faker->company,
        'descripcion' => $faker->text(200),
    ];
});
