<?php

namespace App\Models;

use Awobaz\Compoships\Compoships;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use Compoships;

    protected $fillable = [
        'message',
        'date',

        'user_one_id',
        'user_two_id',
        'conversation_id',
    ];

    protected $dates = [
        'date'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user_one() {
        return $this->belongsTo(User::class, 'user_one_id');
    }

    public function user_two() {
        return $this->belongsTo(User::class, 'user_two_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function conversation() {
        return $this->belongsTo(Conversation::class);
    }
}
