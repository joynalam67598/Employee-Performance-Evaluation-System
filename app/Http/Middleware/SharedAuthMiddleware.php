<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class SharedAuthMiddleware
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
        if(Auth::check())
        {
            return $next($request);
        }
        elseif(Session::has('userId') && Session::has('userName') && Session::has('userType')=='manager')
        {
            return $next($request);
        }
        else{
            return redirect('/login');
        }

    }
}
