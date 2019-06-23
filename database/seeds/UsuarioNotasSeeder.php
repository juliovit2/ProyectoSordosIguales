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
            'nota' => '60',
            'usuarioid' => '1',
            'cursoid' => '1',
            'notaid' => '1'
        ]);

        DB::table('tabla_usuario_notas')->Insert([
            'nota' => '40',
            'usuarioid' => '1',
            'cursoid' => '1',
            'notaid' => '1'
        ]);

        DB::table('tabla_usuario_notas')->Insert([
            'nota' => '30',
            'usuarioid' => '1',
            'cursoid' => '1',
            'notaid' => '1'
        ]);

        DB::table('tabla_usuario_notas')->Insert([
            'nota' => '70',
            'usuarioid' => '4',
            'cursoid' => '1',
            'notaid' => '1'
        ]);

        DB::table('tabla_usuario_notas')->Insert([
            'nota' => '60',
            'usuarioid' => '4',
            'cursoid' => '1',
            'notaid' => '1'
        ]);

        DB::table('tabla_usuario_notas')->Insert([
            'nota' => '30',
            'usuarioid' => '5',
            'cursoid' => '2',
            'notaid' => '1'
        ]);

        DB::table('tabla_usuario_notas')->Insert([
            'nota' => '40',
            'usuarioid' => '5',
            'cursoid' => '2',
            'notaid' => '1'
        ]);

        DB::table('tabla_usuario_notas')->Insert([
            'nota' => '50',
            'usuarioid' => '5',
            'cursoid' => '2',
            'notaid' => '1'
        ]);

        DB::table('tabla_usuario_notas')->Insert([
            'nota' => '50',
            'usuarioid' => '6',
            'cursoid' => '2',
            'notaid' => '1'
        ]);
    }
}
