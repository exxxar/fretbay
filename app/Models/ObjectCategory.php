<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ObjectCategory extends Model
{
    //

    use HasTranslations;

    public $translatable = ['title'];

    protected $fillable = [
        "title",
        "position",
        "is_active"
    ];

    public function objects()
    {
        return $this->hasMany(TypeOfObject::class, "object_category_id", "id");
    }
}
