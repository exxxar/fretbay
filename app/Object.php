<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Object extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'volume',
        'image',
        'position',
        'is_active',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'volume' => 'double',
        'is_active' => 'boolean',
    ];


    public function category()
    {
        return $this->belongsTo(\App\Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(\App\Subcategory::class);
    }
}
