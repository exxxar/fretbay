<?php

namespace App\Events;

use App\Enums\NotificationObjectType;
use App\Enums\NotificationType;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NotificationEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $title;
    public $description;
    public $type;
    public $user_id;
    public $object_id;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($title,$description = "",
                                $type = NotificationType::Info,
                                $user_id = null,
                                $object_id = null,
                                $object_type = NotificationObjectType::Empty
    )
    {
        $this->title = $title;
        $this->description = $description;
        $this->type = $type;
        $this->user_id = $user_id;
        $this->object_id = $object_id;
        $this->object_type = $object_type;
    }


}
