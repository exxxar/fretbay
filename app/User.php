<?php

namespace App;

use App\Models\Listing;
use App\Models\Message;
use App\Models\Profile;
use App\Models\Quote;
use App\Models\Review;
use App\Models\Favorite;
use App\Traits\HasRolesAndPermissions;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable, SoftDeletes;

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

    protected $appends = [
        'computed_rating'
    ];

    public function isAdmin()
    {
        return $this->is_admin === 1;
    }

    public function profile()
    {

        /* if (is_null($this->profile_id)) {

             $profile = new Profile();

             Log::info($this->name);
             Log::info($this->email);
             $this->name = $this->name ?? "New User";
             $this->profile_id = $profile->id;
             $this->save();
         }*/
        return $this->hasOne(Profile::class, "id", "profile_id");
    }

    /*
        public function reviews()
        {
            return $this->hasMany(Review::class, "user_id", "id");
        }*/


    public static function self()
    {
        return User::with(["profile", "profile.vehicles", "profile.verifications", "roles", "listings", "profile.documents", "favorites"])->where("id", Auth::user()->id)->first();
    }

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class, "user_id", "id");
    }

    public function quotes()
    {
        return $this->hasMany(Quote::class, "user_id", "id");
    }

    public function outgoingMessages()
    {
        return $this->hasMany(Message::class, "sender_id", "id");
    }

    public function incomingMessages()
    {
        return $this->hasMany(Message::class, "recipient_id", "id");
    }


    public function incomingReviews()
    {
        return $this->hasMany(Review::class, "transporter_id", "id");
    }

    public function outgoingReviews()
    {
        return $this->hasMany(Review::class, "user_id", "id");
    }

    public function getComputedRatingAttribute()
    {

        $tmp = $this->incomingReviews()->get();


        $rating = 0;

        $sum = 0;
        $sum_0 = 0;
        $sum_1 = 0;
        $sum_2 = 0;

        foreach ($tmp as $r) {
            $sum++;
            switch ($r->type) {
                case 0:
                    $sum_0++;
                    break;
                case 1:
                    $sum_1++;
                    break;
                case 2:
                    $sum_2++;
                    break;
            }
        }


        if ($sum > 0) {

            if (($sum_0 / $sum) * 100 >= 75)
                $rating = 1;

            if (($sum_0 / $sum) * 100 >= 50 && ($sum_0 / $sum) * 100 < 75)
                $rating = 2;

            if ((($sum_0 / $sum) * 100 >= 25 && ($sum_0 / $sum) < 50) * 100)
                $rating = 3;

            if (($sum_2 / $sum) * 100 >= 50 && ($sum_2 / $sum) * 100 < 75)
                $rating = 4;

            if (($sum_2 / $sum) * 100 >= 75)
                $rating = 5;

        }


        return $rating;
    }

}
