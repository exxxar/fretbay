<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use SoftDeletes, HasTranslations;

    public $translatable = ['title'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'min_price',
        'additional_menu_title',
        'image',
        'position',
        'is_active',
        'mode'
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

    public function things()
    {
        return $this->hasMany(\App\Thing::class);
    }

    public function categoryProperties()
    {
        return $this->hasMany(\App\CategoryProperty::class);
    }
}
