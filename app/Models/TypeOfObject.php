<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class TypeOfObject extends Model
{
    use HasTranslations;

    public $translatable = ['title'];


    protected $fillable = [
        "title",
        "img",
        "volume",
        "weight",
        "object_category_id",
        "position",
        "is_active"
    ];


    public function category()
    {
        return $this->hasOne(ObjectCategory::class, "id", "object_category_id");
    }
}
