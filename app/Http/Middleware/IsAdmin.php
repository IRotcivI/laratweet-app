<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
       $user = Auth::user();

        if ($user && strpos($user->role, 'admin') !== false) {
            return $next($request); 
        }

        Auth::logout();
        return redirect()->route('login')->with(['error' => 'Accès refusé. Seuls les administrateurs peuvent accéder à cette page.']);
    }
}
