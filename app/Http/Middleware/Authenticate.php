<?php

namespace App\Http\Middleware;

use App\Models\Profile;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;


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

        $user = $request->user();

        if (!is_null($user)) {

//            if ($user->hasRole("transporter"))
//                return redirect()->route("transporter-account");
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


        return route('login');

    }
}
