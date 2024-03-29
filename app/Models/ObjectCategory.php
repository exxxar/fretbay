<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
//use Spatie\Translatable\HasTranslations;
use App\Traits\HasTranslations;

class ObjectCategory extends Model
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

    protected $appends = [
        'subcategories_count', 'things_count',  'properties_count'
    ];

   /* public function getTitleAttribute()
    {

        return $this->getTranslations()["title"][App::getLocale()];
    }*/
    public function listings()
    {
        return $this->hasMany(Listing::class);
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class,"object_category_id","id");
    }

    public function things()
    {
        return $this->hasMany(Thing::class ,'object_category_id', 'id');
    }

    public function properties()
    {
        return $this->belongsToMany(CategoryProperty::class,
            'category_has_category_properties')
            ->withPivot('required');
    }

    public function getSubcategoriesCountAttribute()
    {
        return $this->subcategories()->count();
    }

    public function getThingsCountAttribute()
    {
        return $this->things()->count();
    }

    public function getPropertiesCountAttribute()
    {
        return $this->properties()->count();
    }


}
