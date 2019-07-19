<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tabla_personas')->Insert([
            'rut' => '168741014',
            'correo' => 'glenshooo@gmail.com',
            'nombre' => 'Glenn Gomez',
            'telefono' => '78674987',
            'rol' => 'Profesor',
            'certificado' => 'Esta persona se encuentra certificada para impartir clases de todo tipo debido a su vasta experiencia'
        ]);

        DB::table('tabla_personas')->Insert([
            'rut' => '183116150',
            'correo' => 'barbs@hamsterlover.com',
            'nombre' => 'Bárbara Hormazábal',
            'telefono' => '92318787',
            'rol' => 'Profesor',
            'certificado' => 'Esta persona se encuentra certificada para desenvolverse como interprete'
        ]);

        DB::table('tabla_personas')->Insert([
            'rut' => '192046688',
            'correo' => 'juanq@gmail.com',
            'nombre' => 'Juan Quispe',
            'telefono' => '87352100',
            'rol' => 'Profesor'
        ]);
    }
}
