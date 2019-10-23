<?php

namespace App\Http\Middleware;

use Closure;

class IsManager
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
        if (auth()->user()->role == 1) {
            return $next($request);
        }elseif (auth()->user()->role == 0) {
            return redirect('client');
        }
            
        return redirect('home')->with('error', 'You are not allowed to this page');
    }
}
