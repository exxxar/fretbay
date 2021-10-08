<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    //
    protected $fillable = [
        'locale_name',
        'name',
        'is_active'
    ];
    protected $casts = [
        'id' => 'integer',
        'is_active' => 'boolean'
    ];
}
