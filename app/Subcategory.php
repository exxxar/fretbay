<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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
        return $this->hasMany(\App\Thing::class);
    }

    public function category()
    {
        return $this->belongsTo(\App\Category::class,"id","category_id");
    }
}
