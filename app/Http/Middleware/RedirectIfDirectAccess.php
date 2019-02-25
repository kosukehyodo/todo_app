<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfDirectAccess
{
    /**
     * url直打ち対策
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->session()->has('direct')) {
            return redirect('/');
        }

        return $next($request);
    }
}
