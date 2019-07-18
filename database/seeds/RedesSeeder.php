<?php

use Illuminate\Database\Seeder;

class RedesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tabla_mapas')->Insert([
            'nombre' => 'Región de Arica y Parinacota',
            'texto' => ' Nos pueden encontrar en : ',
        ]);

        DB::table('tabla_mapas')->Insert([
            'nombre' => 'Región de Tarapacá',
            'texto' => ' Nos pueden encontrar en : ',
        ]);

        DB::table('tabla_mapas')->Insert([
            'nombre' => 'Región de Antofagasta',
            'texto' => ' Nos pueden encontrar en : ',
        ]);

        DB::table('tabla_mapas')->Insert([
            'nombre' => 'Región de Atacama',
            'texto' => ' Nos pueden encontrar en : ',
        ]);

        DB::table('tabla_mapas')->Insert([
            'nombre' => 'Región de Coquimbo',
            'texto' => ' Nos pueden encontrar en : ',
        ]);

        DB::table('tabla_mapas')->Insert([
            'nombre' => 'Región de Valparaiso',
            'texto' => ' Nos pueden encontrar en : ',
        ]);

        DB::table('tabla_mapas')->Insert([
            'nombre' => 'Región Metropolitana',
            'texto' => ' Nos pueden encontrar en : ',
        ]);

        DB::table('tabla_mapas')->Insert([
            'nombre' => 'Región Libertador de Ohiggins',
            'texto' => ' Nos pueden encontrar en : ',
        ]);

        DB::table('tabla_mapas')->Insert([
            'nombre' => 'Región del Maule',
            'texto' => ' Nos pueden encontrar en : ',
        ]);

        DB::table('tabla_mapas')->Insert([
            'nombre' => 'Región de Biobío',
            'texto' => ' Nos pueden encontrar en : ',
        ]);

        DB::table('tabla_mapas')->Insert([
            'nombre' => 'Región de Araucanía',
            'texto' => ' Nos pueden encontrar en : ',
        ]);

        DB::table('tabla_mapas')->Insert([
            'nombre' => 'Región de Los Ríos',
            'texto' => ' Nos pueden encontrar en : ',
        ]);

        DB::table('tabla_mapas')->Insert([
            'nombre' => 'Región de Los Lagos',
            'texto' => ' Nos pueden encontrar en : ',
        ]);

        DB::table('tabla_mapas')->Insert([
            'nombre' => 'Región de Aysén',
            'texto' => ' Nos pueden encontrar en : ',
        ]);

        DB::table('tabla_mapas')->Insert([
            'nombre' => 'Región de Magallanes y Antártica Chilena',
            'texto' => ' Nos pueden encontrar en : ',
        ]);
    }
}
