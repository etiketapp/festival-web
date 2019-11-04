<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Conversation extends Model
{
    protected $fillable = [
        'user_one_id',
        'user_two_id',
        'is_seen',
        'unread_messages',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'latest_message',
        'unreaded_message_count'
    ];


    protected $casts = [
        'is_seen'   => 'boolean',
    ];


    public function getLatestMessageAttribute()
    {
        if(Auth::user()) {
            $this->messages()->orderBy('id', 'asc');
            return $this->messages()->first();
        }

        return false;
    }

    public function getUnreadedMessageCountAttribute()
    {
        return $this->messages()
            ->where('user_one_id', '!=',  \Auth::user()->id)
            ->where('is_readed', 0)
            ->count();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class)->orderBy('id', 'asc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user_one() {
        return $this->belongsTo(User::class, 'user_one_id');
    }

    public function user_two() {
        return $this->belongsTo(User::class, 'user_two_id');
    }

}
