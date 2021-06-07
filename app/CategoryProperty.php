<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProperty extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'type',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];


    public function category()
    {
        return $this->belongsTo(\App\Category::class);
    }
}
