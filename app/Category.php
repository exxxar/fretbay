<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'min_price',
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
        'min_price' => 'double',
        'is_active' => 'boolean',
    ];


    public function subcategories()
    {
        return $this->hasMany(\App\Subcategory::class);
    }

    public function objects()
    {
        return $this->hasMany(\App\Object::class);
    }

    public function categoryProperties()
    {
        return $this->hasMany(\App\CategoryProperty::class);
    }
}
