<?php

namespace App;

use App\Models\Profile;
use App\Models\Review;
use App\Traits\HasRolesAndPermissions;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable, HasRolesAndPermissions, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'profile_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function isAdmin()
    {
        return $this->is_admin === 1;
    }

    public function profile()
    {
        return $this->hasOne(Profile::class, "id", "profile_id");
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, "user_id", "id");
    }

    public static function self()
    {
        return User::with(["profile", "profile.vehicles", "profile.verifications", "roles", "reviews"])->where("id", Auth::user()->id)->first();
    }

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }


}
