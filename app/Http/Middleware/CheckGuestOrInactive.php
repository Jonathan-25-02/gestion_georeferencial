<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckGuestOrInactive
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

        // Si el usuario está autenticado Y activo, redirigir a dashboard con mensaje
        if ($user && $user->is_active) {
            return redirect('/Inicio')->with('mensaje', 'Ya has iniciado sesión.');
        }

        // Si no está autenticado o no activo, dejar pasar
        return $next($request);
    }
}
