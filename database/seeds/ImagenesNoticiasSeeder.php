<?php


use App\tabla_noticia;
use Illuminate\Database\Seeder;

class ImagenesNoticiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\tabla_imagenes_noticia::class, 10)->create();
    }
}
