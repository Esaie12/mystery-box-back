<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RedirectMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Redirection seulement pour /home
        if ($request->is('home')) {
            if (!Auth::check()) {
                return redirect()->route('login')->with('error', "Vous n'êtes pas connecté");
            }

            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin_dashboard');
            }

            if (Auth::user()->role === 'customer') {
                return redirect()->route('my_account');
            }
        }

        return $next($request);
    }
}
