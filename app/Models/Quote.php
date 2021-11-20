<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quote extends Model
{
    /*use SoftDeletes;*/

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'price',
        'valid_until_date',
        'additional_info',
        'type_of_transport',
        'quote_validity',
        'formula',
        'status',
        'currency',
        'listing_id',
        'user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'price' => 'double',
        'type_of_transport' => 'integer',
        'quote_validity' => 'integer',
        'status' => 'integer',
        'formula' => 'array',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'valid_until_date',
    ];

    protected $appends = ["is_valid"];

    /*  public function listing()
      {
          return $this->belongsTo(Listing::class);
      }*/

    public function getIsValidAttribute()
    {
        return $this->valid_until_date >= Carbon::now();
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
