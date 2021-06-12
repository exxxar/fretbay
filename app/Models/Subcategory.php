<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Spatie\Translatable\HasTranslations;

class Subcategory extends Model
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
        'image',
        'position',
        'is_active',
        'category_id',
        'volume',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'is_active' => 'boolean',
        'volume' => 'double',
    ];


    public function things()
    {
        return $this->hasMany(Thing::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class,"id","category_id");
    }
    public function getTitleAttribute()
    {
        return $this->getTranslations()["title"][App::getLocale()];
    }
}
