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
    ];
}
