<?php

namespace App\Models;


use App\Enums\NotificationObjectType;
use App\Enums\NotificationType;
use App\User;
use BenSampo\Enum\Traits\CastsEnums;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    use CastsEnums;

    protected $fillable = [
        "user_id",
        "type",
        "title",
        "description",
        "object_type",
        "object_id",
    ];

    protected $casts = [
        'type' => NotificationType::class,
        'object_type' => NotificationObjectType::class,
    ];

    public function user()
    {
        return $this->hasOne(User::class, "id", "user_id");
    }

    public function object()
    {
        switch ($this->obect_type) {
            default:
            case NotificationObjectType::Empty:
                return null;
            case NotificationObjectType::Message:
                return $this->hasOne(Message::class, "id", "object_id");
            case NotificationObjectType::Listing:
                return $this->hasOne(Listing::class, "id", "object_id");
            case NotificationObjectType::Quote:
                return $this->hasOne(Quote::class, "id", "object_id");
            case NotificationObjectType::Review:
                return $this->hasOne(Review::class, "id", "object_id");
            case NotificationObjectType::Customer:
            case NotificationObjectType::Transporter:
                return $this->hasOne(User::class, "id", "object_id");
            case NotificationObjectType::Order:
                return $this->hasOne(Order::class, "id", "object_id");
        }
    }


}
