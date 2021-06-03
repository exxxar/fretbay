<?php

namespace App;

use App\Casts\TitleLang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
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


    public function getTitleAttribute()
    {
        return $this->getTranslations()["title"][App::getLocale()];
    }



    public function subcategories()
    {
        return $this->hasMany(\App\Subcategory::class);
    }

    public function things()
    {
        return $this->hasMany(\App\Thing::class);
    }

    public function properties()
    {
        return $this->belongsToMany(\App\CategoryProperty::class,
            'category_has_category_properties')
            ->withPivot('required');
    }
}
