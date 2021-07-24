<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Spatie\Translatable\HasTranslations;

class Thing extends Model
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
        'volume',
        'image',
        'position',
        'is_active',
        'object_category_id',
        'subcategory_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'is_active' => 'boolean',
    ];


    public function category()
    {
        return $this->belongsTo(ObjectCategory::class,"id","object_category_id");
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class,"id","subcategory_id");
    }
    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
//    public function category()
//    {
//        return $this->belongsTo(\App\ObjectCategory::class);
//    }
//
//    public function subcategory()
//    {
//        return $this->belongsTo(\App\Subcategory::class);
//    }

    /*public function getTitleAttribute()
    {
        return $this->getTranslations()["title"][App::getLocale()];
    }*/
}
