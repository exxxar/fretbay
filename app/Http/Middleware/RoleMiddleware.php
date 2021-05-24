<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     * @param $request
     * @param Closure $next
     * @param $role
     * @param null $permission
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $permission = null)
    {
        if(\Auth::check()){
            if(!auth()->user()->hasRole($role)) {
                return route('login');
            }
            if($permission !== null && !auth()->user()->can($permission)) {
                return route('login');
            }
            return $next($request);
        }else{
            return route('login');
        }
       
    }
}
