<?php

namespace App\Models;

use Awobaz\Compoships\Compoships;
use Symfony\Component\HttpKernel\Tests\DependencyInjection\ArgumentWithoutTypeController;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements JWTSubject
{
    use SoftDeletes, Notifiable, Compoships;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'email',
        'birth_date',

        'location',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',

        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $dates = [
        'deleted_at'
    ];

    protected $geofields = [
        'location',
    ];

    protected $distance = [
        'distance',
    ];

    protected $appends = [
        'is_seen',
    ];

    //Cinsiyet
    const GENDER_MALE   = 'male';
    const GENDER_FEMALE = 'female';

    const GENDERS = [
        self::GENDER_MALE,
        self::GENDER_FEMALE,
    ];

    /*
    * ATTRIBUTE
    */
    public function getLocationAttribute($value)
    {
        if (!isset($this->attributes['location'])) {
            return null;
        }

        $value = $this->attributes['location'];

        // Coordinate Check
        if (!preg_match('/POINT\((?<latitude>\-?\d+(\.\d+)?)[\s,](?<longitude>-?\d+(\.\d+)?)\)/', $value, $matches)) {
            return null;
        }

        $location = new \stdClass();
        $location->latitude = (float)$matches['latitude'];
        $location->longitude = (float)$matches['longitude'];

        return $location;
    }

    public function setLocationAttribute($value)
    {
        $this->attributes['location'] = DB::raw("POINT($value)");
    }

    public function getDistanceAttribute($value)
    {
        if (!isset($this->attributes['distance'])) {
            return null;
        }
        return $this->attributes['distance'];
    }
//
//    public function getIsSeenAttribute()
//    {
//        return $this->messages->is_seen;
//    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * @return HasMany
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * @return HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function conversations()
    {
        return $this->hasMany(Conversation::class, 'user_one_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, ['user_one_id'], ['user_two_id']);
    }

    /**
     * @return HasMany
     */
    public function DrawUserWinner()
    {
        return $this->hasMany(DrawUserWinner::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function drawUsers()
    {
        return $this->hasMany(DrawUser::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function festivals()
    {
        return $this->hasMany(Festival::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function devices()
    {
        return $this->hasMany(Device::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function notifications()
    {
        return $this->morphMany(Notification::class, 'notifiable')->orderBy('created_at', 'desc');
    }

    public function routeNotificationForFcm()
    {
        return $this->devices->whereIn('platform', ['android', 'ios'])->pluck('token')->toArray();
    }

    /**
     * @return mixed
     */
    public function getJWTIdentifier() {
        return $this->getKey();
    }

    /**
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }


}
