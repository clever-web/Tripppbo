<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class loginToNova
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->is('nova/*')) {
            if ($request->user() && $request->user()->isAdmin === true) {
                return $next($request);
            } else {
                abort(404);
            }
        } else {
            return $next($request);
        }
    }
}
