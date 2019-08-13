<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = [
        'user_one',
        'user_two',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
