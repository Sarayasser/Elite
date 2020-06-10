<?php

namespace App\Http\Middleware;

use Closure;

class CheckBan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()->is_banned == 1) {
            return redirect('/login');
        }
        return $next($request);
    }
}
