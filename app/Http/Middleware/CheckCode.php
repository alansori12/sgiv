<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckCode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $code)
    {
        if($request->user()->kd_login == $code){
            return $next($request);
        }

        return redirect('/login1');
    }
}
