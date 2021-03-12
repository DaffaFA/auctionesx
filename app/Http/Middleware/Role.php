<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? ['masyarakat', 'petugas'] : $guards;

        foreach ($guards as $guard) {
            if (! Auth::check($guard) ) {
                $this->redirectUser($request);
            } 
        }
        return $next($request);

    }

    private function redirectUser(Request $request) 
    {
        if ( $request->routeIs('admin::*') ) {
            return redirect()->route('admin::login');
        } else {
            return redirect()->route('login');
        }
    }
}
