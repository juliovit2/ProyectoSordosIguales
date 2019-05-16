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
            'cursando' => true
        ]);

        DB::table('tabla_usuarios')->Insert([
            'rut' => '188974732',
            'correo' => 'julio@julio.julio',
            'nombre' => 'Julio Julio',
            'direccion' => 'UCN',
            'telefono' => '662606',
            'ciudad' => 'Antofagasta',
            'clave' => 'julio',
            'rol' => 'Alumno',
            'cursando' => false
        ]);

        DB::table('tabla_usuarios')->Insert([
            'rut' => '111111111',
            'correo' => 'hi@hi.hi',
            'nombre' => 'Jai',
            'direccion' => 'UCN',
            'telefono' => '555555',
            'ciudad' => 'Antofagasta',
            'clave' => 'jai',
            'rol' => 'Administrador',
            'cursando' => false
        ]);

        DB::table('tabla_usuarios')->Insert([
            'rut' => '189188366',
            'correo' => 'manuelzuletab@gmail.com',
            'nombre' => 'Jota Se',
            'direccion' => 'UCN',
            'telefono' => '666666',
            'ciudad' => 'Antofagasta',
            'clave' => 'jc',
            'rol' => 'Alumno',
            'cursando' => true
        ]);

        DB::table('tabla_usuarios')->Insert([
            'rut' => '18502184k',
            'correo' => 'jdm006@alumnos.ucn.cl',
            'nombre' => 'Julio Díaz',
            'direccion' => 'UCN',
            'telefono' => '88886981',
            'ciudad' => 'Antofagasta',
            'clave' => '123',
            'rol' => 'Alumno',
            'cursando' => true
        ]);
    }
}
