<?php

namespace App\Listeners;

use App\Enums\NotificationType;
use App\Events\NotificationEvent;
use App\Events\NotificationEventBroadcast;
use App\Mail\NotifyMail;
use App\Models\Notification;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Kutia\Larafirebase\Facades\Larafirebase;


class NotificationListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle(NotificationEvent $event)
    {
        if (is_null($event))
            return;

        Notification::create([
            "user_id" => $event->user_id,
            "title" => $event->title,
            "description" => $event->description,
            "type" => $event->type,
            "object_id" => $event->object_id,
            "object_type" => $event->object_type,
        ]);

        $tmp_ids = [];

        if (!is_null($event->user_id))
            array_push($tmp_ids, $event->user_id);

        if (!is_null(Auth::user()))
            array_push($tmp_ids, Auth::user()->id);

        $users = User::whereIn("id", $tmp_ids)
            ->get();
      /*  try {

            if (count($users) > 0)
                foreach ($users as $u)
                    Mail::to($u->email)->send(new NotifyMail(printf("%s %s %s",
                        $event->title,
                        $event->description,
                        $event->user_id
                    )));
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }*/

        $FcmToken = User::whereNotNull('fcm_token')
            ->whereIn("id", $tmp_ids)
            ->pluck('fcm_token')->all();

        if (count($FcmToken) === 0)
            return;

        Larafirebase::withTitle($event->title ?? 'test')
            ->withBody($event->description ?? "test")
            ->withImage('https://allotrans.com/assets/img/1920x1080/img5.jpg')
            ->withClickAction('/listing/' . $event->object_id)
            ->withPriority('high')
            ->sendNotification($FcmToken);

        event(new NotificationEventBroadcast($event));


    }
}
