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

        'draw_id',
        'user_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function draw()
    {
        return $this->belongsTo(Draw::class);
    }
}
