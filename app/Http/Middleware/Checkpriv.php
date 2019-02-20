<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
// use Sentry;
class Checkpriv
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if (Auth::user()->superadmin == 1) {
              return $next($request);
            }else {
              return redirect('admin/');
            }
        }
        return $next($request);
    }
}
