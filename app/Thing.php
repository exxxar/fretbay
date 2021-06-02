<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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
        'category_id',
        'subcategory_id'
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
        return $this->belongsTo(\App\Category::class,"id","category_id");
    }
    public function subcategory()
    {
        return $this->belongsTo(\App\SubCategory::class,"id","subcategory_id");
    }
//    public function category()
//    {
//        return $this->belongsTo(\App\Category::class);
//    }
//
//    public function subcategory()
//    {
//        return $this->belongsTo(\App\Subcategory::class);
//    }
}
