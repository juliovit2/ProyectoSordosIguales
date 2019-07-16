<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tabla_cursos')->Insert([
            'nombre' => 'Lenguaje Señas Basico',
            'profesorid' => '1'
        ]);

        DB::table('tabla_cursos')->Insert([
            'nombre' => 'Lenguaje Señas Intermedio',
            'profesorid' => '2'
        ]);

        DB::table('tabla_cursos')->Insert([
            'nombre' => 'Lenguaje Señas Avanzado',
            'profesorid' => '3'
        ]);
    }
}
