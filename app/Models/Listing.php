<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listing extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'articles',
        'place_of_loading',
        'place_of_delivery',
        'shipping_date_from',
        'shipping_date_to',
        'unshipping_date_from',
        'unshipping_date_to',
        'messages',
        'additional_info',
        'images',
        'status',
        'expiration_date'
        'summary_volume',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'articles' => 'array',
        'place_of_loading' => 'array',
        'place_of_delivery' => 'array',
        'messages' => 'array',
        'images' => 'array',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'shipping_date_from',
        'shipping_date_to',
        'unshipping_date_from',
        'unshipping_date_to',
    ];


    public function category()
    {
        return $this->hasOne(\App\Category::class);
    }

    public function quotes()
    {
        return $this->hasMany(\App\Quote::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
