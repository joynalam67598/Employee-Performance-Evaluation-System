<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;


class ManagerEmployeeSharedAuthMiddleware
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

        if(Session::has('userId') && Session::has('userName') && Session::has('userType')=='manager')
        {
            return $next($request);
        }
        elseif(Session::has('userId') && Session::has('userName') && Session::has('userType')=='employee')
        {
            return $next($request);
        }
        else
        {
            return redirect('/login/user');
        }

    }
}
