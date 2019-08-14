<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'message',

        'user_id',
        'conversation_id',
    ];

    protected $hidden = [
        'created_at',
        'deleted_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user() {
        return $this->belongsToMany('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function conversation() {
        return $this->belongsToMany('App\Conversation');
    }
}
