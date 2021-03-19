<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class TypeOfTransport extends Model
{
    use SoftDeletes, HasTranslations;

    public $translatable = ['title'];

    protected $fillable = [
        "title",
        "img",
        "position",
        "is_active"
    ];

    protected $casts = [
        "is_active" => "boolean"
    ];
}
