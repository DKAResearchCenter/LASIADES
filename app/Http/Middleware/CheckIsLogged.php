<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIsLogged  {

    public function handle(Request $request, Closure $next)
    {

        if (!$request->session()->exists('auth_login')) {
            return redirect('/auth');
        }

        return $next($request);
    }

}
