<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillable = [
        'provider',
        'provider_id',
        'access_token',
        'access_token_secret',
        'refresh_token',

        'user_id',
    ];

    protected $hidden = [
        'id',
        'user_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}