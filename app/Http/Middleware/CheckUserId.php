<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $urlUserId = $request->route('userId');
        $authUserId = auth()->id();

        if (!$authUserId) {
            // User is not authenticated, redirect to login
            return redirect('/login');
        }

        if ($urlUserId != $authUserId) {
            // Different user ID, redirect to login
            return redirect('/login');
        }

        return $next($request);
    }
}
