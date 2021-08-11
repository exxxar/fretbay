<?php

namespace App\Http\Middleware;

use App\Models\Profile;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $user = Auth::user();

        if (!Auth::guard($guard)->check()) {
            return $next($request);
        }

        if ($user->hasRole("transporter")) {
            $profile = Profile::find($user->profile_id);
            if($profile->is_first_activation == false) {
                return redirect()->route("transporter-account");
            }
            return redirect()->route("desktop.profile-transporter-wizard-start");
        }

        if ($user->hasRole("admin"))
            return redirect()->route("admin.index");


        return redirect()->route("customer-account");
    }
}
