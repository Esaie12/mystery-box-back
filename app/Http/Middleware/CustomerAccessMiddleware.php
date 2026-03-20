<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CustomerAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Si l'utilisateur n'est pas authentifié
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Permettre aux customers ET aux admins d'accéder
        $allowedRoles = ['customer', 'admin'];

        if (!in_array(Auth::user()->role, $allowedRoles)) {
            abort(403, 'Accès non autorisé');
        }

        return $next($request);
    }
}
