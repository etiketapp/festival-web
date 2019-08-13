<?php

namespace App\Models;

use Symfony\Component\HttpKernel\Tests\DependencyInjection\ArgumentWithoutTypeController;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use SoftDeletes, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'email',
        'gender',
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
    public function wanteds()
    {
        return $this->hasMany(Wanted::class);
    }

    /**
     * @return HasMany
     */
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    /**
     * @return HasMany
     */
    public function sent()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    /**
     * @return HasMany
     */
    public function received()
    {
        return $this->hasMany(Message::class, 'receiver_id');
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

    public function draws()
    {
        return $this->belongsToMany(Draw::class, 'draws')->withPivot('join');
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
