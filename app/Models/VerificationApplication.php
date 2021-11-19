<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VerificationApplication extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'document_number',
        'type',
        'documents',
        'images',
        'comment',
        'additional_properties',
        'is_approved',
        'profile_id',
        'issue_date',
        'expire_date',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type' => 'integer',
        //'documents' => 'array',
        //'images' => 'array',
        //'additional_properties' => 'array',
        'issue_date'=>"datetime",
        'expire_date'=>"datetime",
    ];
}
