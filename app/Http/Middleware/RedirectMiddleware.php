<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class RedirectMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(! Auth::check()){
            return redirect()->route('login')->with('error',"Vous n'etes pas connecté");
        }

        if(Auth::user()->role == "admin"){
            return redirect()->route('admin_dashboard');
        }elseif( Auth::user()->role == "customer" ){
            return redirect()->route('welcome');
        }
    }
}
