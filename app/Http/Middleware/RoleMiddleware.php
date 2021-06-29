<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::check()){

            $user = User::with(["roles"])->where("id",Auth::user()->id)->first();

            if(!$user->hasRole($role)) {
                return redirect()->route('errors.404');
            }
            return $next($request);
        }else{
            return redirect()->route('login');
        }

    }
}
