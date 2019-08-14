<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = [
        'user_one',
        'user_two',
    ];

    protected $hidden = [
        'created_at',
        'deleted_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user() {
        return $this->belongsToMany(User::class);
    }
}
