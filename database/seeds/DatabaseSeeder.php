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
        $this->truncateTables(['tabla_usuario']);// añadir el resto de las tablas a ejecutarles su seeder correspondiente

        $this->call(UsuarioSeeder::class);// llamar a los seeders correspondientes faltantes
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
