<?php

namespace App\Models;

use App\Enums\NotificationType;
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
    ];

    protected $casts = [
        'type' => NotificationType::class,
    ];

    public function user()
    {
        return $this->hasOne(User::class, "id", "user_id");
    }


}
