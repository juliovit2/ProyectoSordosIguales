<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioNotasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tabla_usuario_notas')->Insert([
            'nota' => '6',
            'usuarioid' => '1',
            'cursoid' => '1',
            'notaid' => '1'
        ]);

        DB::table('tabla_usuario_notas')->Insert([
            'nota' => '4',
            'usuarioid' => '1',
            'cursoid' => '1',
            'notaid' => '1'
        ]);

        DB::table('tabla_usuario_notas')->Insert([
            'nota' => '3',
            'usuarioid' => '1',
            'cursoid' => '1',
            'notaid' => '1'
        ]);

        DB::table('tabla_usuario_notas')->Insert([
            'nota' => '7',
            'usuarioid' => '4',
            'cursoid' => '1',
            'notaid' => '1'
        ]);

        DB::table('tabla_usuario_notas')->Insert([
            'nota' => '6',
            'usuarioid' => '4',
            'cursoid' => '1',
            'notaid' => '1'
        ]);

        DB::table('tabla_usuario_notas')->Insert([
            'nota' => '3',
            'usuarioid' => '5',
            'cursoid' => '2',
            'notaid' => '1'
        ]);

        DB::table('tabla_usuario_notas')->Insert([
            'nota' => '4',
            'usuarioid' => '5',
            'cursoid' => '2',
            'notaid' => '1'
        ]);

        DB::table('tabla_usuario_notas')->Insert([
            'nota' => '5',
            'usuarioid' => '5',
            'cursoid' => '2',
            'notaid' => '1'
        ]);

        DB::table('tabla_usuario_notas')->Insert([
            'nota' => '5',
            'usuarioid' => '6',
            'cursoid' => '2',
            'notaid' => '1'
        ]);
    }
}
