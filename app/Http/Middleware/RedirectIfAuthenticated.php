<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

            switch ($guard) {
                case 'web_admins':
                    $path = 'AdminDetail';
                    break;
                
                default:
                    $path = 'CustomerDetail';
                    break;
            }
            return redirect($path);
        }

        return $next($request);
    }
}
