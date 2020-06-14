<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

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
        if (auth()->user()->is_banned === 1) {
            $user = auth()->user();
            auth()->logout();
            return redirect()->route('login')
                ->withError('Your account has been suspended. Please contact administrator.');
        }
        return $next($request);
    }
}
