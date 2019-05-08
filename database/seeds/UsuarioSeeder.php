<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tabla_usuarios')->Insert([
            'rut' => '190584550',
            'correo' => 'jc@jc.jc',
            'nombre' => 'Jota Se',
            'direccion' => 'UCN',
            'telefono' => '666666',
            'ciudad' => 'Antofagasta',
            'clave' => 'jc',
            'rol' => 'Alumno',
            'cursando' => false
        ]);
    }
}
