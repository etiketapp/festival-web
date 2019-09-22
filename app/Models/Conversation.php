<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Conversation extends Model
{
    protected $fillable = [
        'user_one_id',
        'user_two_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'latest_message'
    ];

    public function getLatestMessageAttribute()
    {
        if(Auth::user()) {
            return $this->messages()->first();
        }

        return false;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class)->orderBy('date', 'desc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user_one() {
        return $this->belongsTo(User::class);
    }

    public function user_two() {
        return $this->belongsTo(User::class);
    }

}
