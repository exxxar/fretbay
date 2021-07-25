<?php

namespace App\Listeners;

use App\Enums\NotificationType;
use App\Events\NotificationEvent;
use App\Events\NotificationEventBroadcast;
use App\Mail\NotifyMail;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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

        Log::info("NOTIFICATION!!! 1");

        Notification::create([
            "user_id" => $event->user_id,
            "title" => $event->title,
            "description" => $event->description,
            "type" => $event->type
        ]);

        Log::info("NOTIFICATION!!! 2");

        event(new NotificationEventBroadcast($event));
        if ($event->type == NotificationType::System) {
            try {
                Mail::to($event->email)->send(new NotifyMail(printf("%s %s %s",
                    $event->title,
                    $event->description,
                    $event->user_id
                )));
            } catch (\Exception $e) {

            }
        }
    }
}
