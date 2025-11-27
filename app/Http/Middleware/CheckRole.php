<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // 1. Si no está logueado, redirigir al inicio
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // 2. Si el rol del usuario NO coincide con el requerido, prohibir acceso
        if (Auth::user()->role !== $role) {
            abort(403, 'No tienes permiso para ver esta sección.');
        }

        return $next($request);
    }
}
