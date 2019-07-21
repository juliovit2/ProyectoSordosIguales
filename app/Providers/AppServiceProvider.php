<?php

namespace App\Providers;

use App\tabla_colaborador_alianza;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
USE Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Blade::component('shared._card', 'card');
        Schema::defaultStringLength(191);
        if(Schema::hasTable('homestead')){//el nombre de la base de datos
            $colabs = tabla_colaborador_alianza::get();
            view()->share('colabs', $colabs);
        }
    }
}
