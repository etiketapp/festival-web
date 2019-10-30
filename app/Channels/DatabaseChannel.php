<?php

namespace App\Channels;

use App\Notifications\DrawNotification;
use Illuminate\Notifications\Notification;

class DatabaseChannel extends \Illuminate\Notifications\Channels\DatabaseChannel
{
    protected function buildPayload($notifiable, Notification $notification)
    {
        if ($notification instanceof DrawNotification) {
            $draw = $notification->getDraw()->id;
        } else {
            $draw = null;
        }
        return [
            'id' => $notification->id,
            'type' => get_class($notification),
            'data' => $this->getData($notifiable, $notification),
            'read_at' => null,
            'user_id' => $notification->getDraw()->id ?? null
        ];
    }
}