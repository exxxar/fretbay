<?php

namespace App\Models;

use App\Traits\HasTranslations;
use App\User;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{


    protected $fillable = [
        "message",
        "user_id",
        "post_id",
        "blog_comment_id",
        "is_active",
    ];

    public $with = ["user","user.profile","comments"];

    public function user(){
        return $this->hasOne(User::class,"id","user_id");
    }

    public function comments(){
        return $this->hasMany(BlogComment::class, "blog_comment_id","id");
    }




}
