<?php

namespace App\Models;

use Illuminate\Notifications\DatabaseNotification;

class Notification extends DatabaseNotification
{
    protected $hidden = [
        'type',

        'notifiable_id',
        'notifiable_type',

        'updated_at',

        'user_id',
        'draw_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function draw()
    {
        return $this->belongsTo(Draw::class);
    }
}
