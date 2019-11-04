<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DrawUser extends Model
{
    protected $fillable = [
        'draw_id',
        'user_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'draw_users_count',
        'is_draw_joined'
    ];

    public function getDrawUsersCountAttribute()
    {
        return $this->user()->count();
    }

    public function getIsDrawJoinedAttribute()
    {
        if($this->user)
            return true;
        return false;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function draw()
    {
        return $this->belongsTo(Draw::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
