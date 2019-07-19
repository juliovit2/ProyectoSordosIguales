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
            'rut' => '1',
            'email' => 'testAdmin@test.com',
            'name' => 'Test Admin User',
            'direccion' => 'UCN 123',
            'telefono' => '66260600',
            'ciudad' => 'Antofagasta',
            'password' => bcrypt('1'),
            'rol' => 'Administrador',
            'cursando' => false
        ]);

        DB::table('users')->Insert([
            'rut' => '2',
            'email' => 'testUser@test.com',
            'name' => 'Test User',
            'direccion' => 'UCN 123',
            'telefono' => '66260611',
            'ciudad' => 'Antofagasta',
            'password' => bcrypt('2'),
            'rol' => 'Alumno',
            'cursando' => false
        ]);

        DB::table('users')->Insert([
            'rut' => '189188366',
            'email' => 'manuelzuletab@gmail.com',
            'name' => 'Manuel Zuleta',
            'direccion' => 'UCN 1232',
            'telefono' => '88776655',
            'ciudad' => 'Antofagasta',
            'password' => bcrypt('mz'),
            'rol' => 'Alumno',
            'cursando' => true
        ]);

        DB::table('users')->Insert([
            'rut' => '18502184k',
            'email' => 'jdm006@alumnos.ucn.cl',
            'name' => 'Julio Díaz',
            'direccion' => 'UCN 6095',
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
            'direccion' => 'UCN 654',
            'telefono' => '66260607',
            'ciudad' => 'Antofagasta',
            'password' => bcrypt('1598753'),
            'rol' => 'Alumno',
            'cursando' => true
        ]);

        DB::table('users')->Insert([
            'rut' => '190584550',
            'email' => 'juancarlos@ucn.cl',
            'name' => 'Juan C. Maury',
            'direccion' => 'UCN 1234',
            'telefono' => '66666666',
            'ciudad' => 'Antofagasta',
            'password' => 'jc',
            'rol' => 'Alumno',
            'cursando' => true
        ]);
    }
}
