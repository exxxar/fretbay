<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'text',
        'type',//Раздел, для которого отзыв
        "is_visible",//флаг модерации
        'user_id',
        'review_id'
    ];

    protected $casts = [
        'type' => "integer",//Раздел, для которого отзыв
        "is_visible" => "boolean",//флаг модерации
        'user_id' => "integer",
        'review_id' => "integer"
    ];

    public function user()
    {
        return $this->hasOne(User::class, "id", "user_id");
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, "review_id", "id");
    }
}
