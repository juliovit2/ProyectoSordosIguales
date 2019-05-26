<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\tabla_noticia;
use Faker\Generator as Faker;

$factory->define(App\tabla_noticia::class, function (Faker $faker) {
    return [
        'titulo' => $faker->text(100),
        'contenido' => $faker->randomHtml()
    ];
});