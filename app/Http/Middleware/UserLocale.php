<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class UserLocale
{
    public function handle($request, Closure $next)
    {
        // Comprobar si el usuario está autenticado
        if (Auth::check()) {
            // Obtener el idioma preferido del usuario desde su perfil
            $userLocale = Auth::user()->language;
            // Si el usuario tiene un idioma preferido definido, establecerlo como locale
            if ($userLocale) {
                App::setLocale($userLocale);

            }
        }

        // Continuar con la solicitud
        return $next($request);
    }
}
