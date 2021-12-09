<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class ModifiedContent extends Model
{
    //

    use HasTranslations;

    public $translatable = ['content'];

    protected $fillable = [
        "slug",
        "page_id",
        "content",
    ];
}
