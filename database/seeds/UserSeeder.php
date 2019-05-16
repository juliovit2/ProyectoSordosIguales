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
            'email' => 'jc@jc.jc',
            'name' => 'Jota Se',
            'password' => 'jc'
        ]);

        DB::table('users')->Insert([
            'email' => 'julio@julio.julio',
            'name' => 'Julio Julio',
            'password' => 'julio'
        ]);

        DB::table('users')->Insert([
            'email' => 'hi@hi.hi',
            'name' => 'Jai',
            'password' => 'jai'
        ]);

        DB::table('users')->Insert([
            'email' => 'manuelzuletab@gmail.com',
            'name' => 'Jota Se',
            'password' => 'jc'
        ]);
    }
}
