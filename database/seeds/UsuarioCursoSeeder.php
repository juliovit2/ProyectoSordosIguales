<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioCursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tabla_usuario_cursos')->Insert([
            'asistencia' => '100',
            'estado' => 'Cursando',
            'usuarioid' => '1',
            'cursoid' => '1',


        ]);

        DB::table('tabla_usuario_cursos')->Insert([
            'usuarioid' => '4',
            'cursoid' => '1',
            'estado' => 'Cursando',
            'asistencia' => '100'
        ]);

        DB::table('tabla_usuario_cursos')->Insert([
            'usuarioid' => '5',
            'cursoid' => '2',
            'estado' => 'Cursando',
            'asistencia' => '100'
        ]);

        DB::table('tabla_usuario_cursos')->Insert([
            'usuarioid' => '6',
            'cursoid' => '2',
            'estado' => 'Cursando',
            'asistencia' => '100'
        ]);

        DB::table('tabla_usuario_cursos')->Insert([
            'usuarioid' => '3',
            'cursoid' => '2',
            'estado' => 'Cursando',
            'asistencia' => '100'
        ]);


    }
}
