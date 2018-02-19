<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(Auth::User()){
            if(!$request->user()->hasRole($role)){
                return redirect()->route('error');
            }
        }else{
            return redirect()->route('/');
        }
        return $next($request);
    }
}
