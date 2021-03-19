<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Vehicle extends Model
{
    //

    use HasTranslations;

    public $translatable = ['title'];

    protected $fillable = [
        "title",
        "position",
        "is_active"
    ];
}
