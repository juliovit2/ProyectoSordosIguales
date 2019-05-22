<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables(['tabla_usuarios'
            ,'users'
            //,'tabla_colaborador_alianzas'
            ,'tabla_cursos'
            //,'tabla_directorios'
            ,'tabla_evaluaciones_cursos'
            //,'tabla_fundaciones'
            //,'tabla_imagenes_noticias'
            //,'tabla_memorias'
            //,'tabla_noticias'
            //,'tabla_personas'
            //,'tabla_preguntas_frecuentes'
            //,'tabla_suscrptores'
            ,'tabla_usuario_cursos'
            ,'tabla_usuario_notas'
        ]);// añadir el resto de las tablas a ejecutarles su seeder correspondiente

        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        //$this->call(UsuarioSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CursoSeeder::class);
        $this->call(UsuarioCursoSeeder::class);
        $this->call(UsuarioNotasSeeder::class);
        $this->call(EvaluacionesCursoSeeder::class);

        // llamar a los seeders correspondientes faltantes

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }

    protected function truncateTables($tables): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach ($tables as $table){
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

    }
}
