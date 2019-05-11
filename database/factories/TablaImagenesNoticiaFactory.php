<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\tabla_imagenes_noticia;
use Faker\Generator as Faker;

$factory->define(tabla_imagenes_noticia::class, function (Faker $faker) {
    return [
        'imagen' => $faker->text('100'),
        'noticiaid' => $faker->numberBetween(1,10)
    ];
});
