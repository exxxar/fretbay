<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Spatie\Translatable\HasTranslations;

class CategoryProperty extends Model
{
    use HasTranslations;

    public $translatable = ['title'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'type',
        'icon',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];


    public function getTitleAttribute()
    {
        return $this->getTranslations()["title"][App::getLocale()];
    }


    public function category()
    {
        return $this->belongsToMany(CategoryProperty::class,'category_has_category_properties','category_property_id','id');
    }
}
