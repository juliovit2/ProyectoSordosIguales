<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EvaluacionesCursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tabla_evaluaciones_cursos')->Insert([
            'nombreEvaluacion' => 'Taller',
            'cursoid' => '1'
        ]);

        DB::table('tabla_evaluaciones_cursos')->Insert([
            'nombreEvaluacion' => 'Taller',
            'cursoid' => '2'
        ]);

        DB::table('tabla_evaluaciones_cursos')->Insert([
            'nombreEvaluacion' => 'Taller Abierto',
            'cursoid' => '2'
        ]);

        DB::table('tabla_evaluaciones_cursos')->Insert([
            'nombreEvaluacion' => 'TallerAbierto',
            'cursoid' => '3'
        ]);
    }
}
