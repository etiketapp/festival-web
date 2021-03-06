<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * @property mixed title
 */
class Draw extends Model
{
    protected $fillable = [
        'title',
        'sub_title',
        'content',
        'last_date',
        'draw_time',
    ];


    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',

        'drawUsers'
    ];

    protected $appends = [
        'is_joined',
    ];

    public function getIsJoinedAttribute()
    {
        if($this->drawUsers()
            ->where('user_id', Auth::user('api')->id)
            ->where('draw_id', $this->id)
            ->first())
            return true;
        return false;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function DrawUserWinner()
    {
        return $this->hasOne(DrawUserWinner::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function drawUsers()
    {
        return $this->hasMany(DrawUser::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function galleries()
    {
        return $this->hasMany(DrawGallery::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

}

