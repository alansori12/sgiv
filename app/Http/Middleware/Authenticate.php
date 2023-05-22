<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if($request->routeIs('mahasiswa.*')){
                return route('mahasiswa1.login');    
            }elseif($request->routeIs('dosen.*')){
                return route('dosen1.login');    
            }
            return route('admin1.login');
        }
    }
}
