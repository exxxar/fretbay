<?php

namespace App\Http\Controllers;

use App\Mail\MailingMail;
use App\Mail\NotifyMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MailingController extends Controller
{

    public function sendMails(Request $request)
    {
        $request->validate([
            "title" => "required",
            "message" => "required",
            "for" => "required"
        ]);

        if ($request->for == "all")
            $users = User::all();

        if ($request->for == "verified")
            $users = User::whereNotNull("email_verified_at")->get();

        if ($request->for == "notverified")
            $users = User::whereNull("email_verified_at")->get();


        try {
            if (count($users) > 0)
                foreach ($users as $u) {
                    sleep(5);
                    Mail::to($u->email)->send(new MailingMail(
                        $request->title ?? "-",
                        $request->message ?? "-"
                    ));
                }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }

        return response()->noContent();
    }
    //
}
