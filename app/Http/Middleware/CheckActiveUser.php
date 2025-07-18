<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckActiveUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Si no está autenticado o no está activo, redirige a login con mensaje
        if (!$user || !$user->is_active) {
            // Opcional: cerrar sesión por seguridad
            if ($user) {
                Auth::logout();
            }
            return redirect('/register')->with('mensaje', 'Debes iniciar sesión y activar tu cuenta.');
        }

        // Si todo está bien, continuar con la petición
        return $next($request);
    }
}
