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


        $url = 'https://fcm.googleapis.com/fcm/send';
        $FcmToken = User::whereNotNull('fcm_token')
            ->pluck('fcm_token')->all();

        /*where("id", $event->user_id)*/

        $serverKey = 'AAAAhhNUwlw:APA91bF6PpA5J641e58K2JkqZav7-L779VlvTja7lZwZAXN3ugN6GzxZcTm8yG2_4DSZdnrmd54Ze0sblMSJZg075lV8HitxoieQLmUHcQQ-PppkwKMZpH6rlf7GWhpBa4gwJdI1z1D8';

        $data = [
            "registration_ids" => $FcmToken,
            "notification" => [
                "title" => $event->title ?? "Message",
                "body" => $event->description,
            ]
        ];
        $encodedData = json_encode($data);

        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);

        // Execute post
        $result = curl_exec($ch);

        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        // Close connection
        curl_close($ch);

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
