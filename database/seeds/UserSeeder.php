<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->Insert([
            'rut' => '190584550',
            'email' => 'jc@jc.jc',
            'name' => 'Jota Se',
            'direccion' => 'UCN',
            'telefono' => '666666',
            'ciudad' => 'Antofagasta',
            'password' => bcrypt('jc'),
            'rol' => 'Alumno',
            'cursando' => true
        ]);

        DB::table('users')->Insert([
            'rut' => '1',
            'email' => 'julio@julio.julio',
            'name' => 'Julio Julio',
            'direccion' => 'UCN',
            'telefono' => '662606',
            'ciudad' => 'Antofagasta',
            'password' => bcrypt('1'),
            'rol' => 'Administrador',
            'cursando' => false
        ]);

        DB::table('users')->Insert([
            'rut' => '2',
            'email' => 'julio@junio.julio',
            'name' => 'Julio',
            'direccion' => 'UCN',
            'telefono' => '662606',
            'ciudad' => 'Antofagasta',
            'password' => bcrypt('2'),
            'rol' => 'Alumno',
            'cursando' => false
        ]);

        DB::table('users')->Insert([
            'rut' => '111111111',
            'email' => 'hi@hi.hi',
            'name' => 'Jai',
            'direccion' => 'UCN',
            'telefono' => '555555',
            'ciudad' => 'Antofagasta',
            'password' => bcrypt('jai'),
            'rol' => 'Administrador',
            'cursando' => false
        ]);

        DB::table('users')->Insert([
            'rut' => '189188366',
            'email' => 'manuelzuletab@gmail.com',
            'name' => 'Jota Se',
            'direccion' => 'UCN',
            'telefono' => '666666',
            'ciudad' => 'Antofagasta',
            'password' => bcrypt('jc'),
            'rol' => 'Alumno',
            'cursando' => true
        ]);

        DB::table('users')->Insert([
            'rut' => '18502184k',
            'email' => 'jdm006@alumnos.ucn.cl',
            'name' => 'Julio Díaz',
            'direccion' => 'UCN',
            'telefono' => '88886981',
            'ciudad' => 'Antofagasta',
            'password' => bcrypt('123'),
            'rol' => 'Alumno',
            'cursando' => true
        ]);

        DB::table('users')->Insert([
            'rut' => '188974732',
            'email' => 'pjv001@alumnos.ucn.cl',
            'name' => 'Pablo Julio',
            'direccion' => 'UCN',
            'telefono' => '66260607',
            'ciudad' => 'Antofagasta',
            'password' => bcrypt('1598753'),
            'rol' => 'Alumno',
            'cursando' => true
        ]);

    }
}
