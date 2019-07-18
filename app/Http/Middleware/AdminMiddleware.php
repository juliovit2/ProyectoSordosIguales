<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
        $usuarioActual = \Auth::user();
        if($usuarioActual->rol=='Administrador'){
            return $next($request);
        }else{

            return redirect('/usuarios/');
        }


    }
}
