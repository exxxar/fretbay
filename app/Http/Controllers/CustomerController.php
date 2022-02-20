<?php

namespace App\Http\Controllers;

use App\Enums\NotificationType;
use App\Events\NotificationEvent;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use function Symfony\Component\String\s;


class CustomerController extends Controller
{
    //
    public function update(Request $request)
    {
        $user = User::with(["profile"])->where("id", Auth::id())->first();

        if ($request->hasFile('avatar')) {
            //  Let's do everything here
            if ($request->file('avatar')->isValid()) {
                $validated = $request->validate([
                    'avatar' => 'mimes:jpeg,png|max:1014',
                ]);
                $extension = $request->avatar->extension();
                $request->avatar->storeAs('/public',$request->file('avatar')->getClientOriginalName().".".$extension);
                $url = Storage::url($request->file('avatar')->getClientOriginalName().".".$extension);

                $user->avatar = $url;
                $user->save();

            }
        }


        $user->email = $request->email ?? $user->email;
        $user->profile->update($request->all());

        Log::info(print_r($user->profile,true));


        event(new NotificationEvent(
            "#account-" . $user->id,
            "Update user accounts",
            NotificationType::Info,
            Auth::user()->id));


        return redirect('/customer/profile#profile')->withErrors(["success"]);

    }



}
