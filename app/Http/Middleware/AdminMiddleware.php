<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // allow through when an authenticated admin is signed in
        if ($request->user() && $request->user()->is_admin) {
            return $next($request);
        }

        // send logged-in non-admins to the dashboard, guests to the login page
        if ($request->user()) {
            return redirect()->route('dashboard');
        }

        return redirect()->route('login');
    }
}
