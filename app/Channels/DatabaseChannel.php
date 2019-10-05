<?php

namespace App\Channels;

use App\Notifications\UserNotification;
use Illuminate\Notifications\Notification;

class DatabaseChannel extends \Illuminate\Notifications\Channels\DatabaseChannel
{
    protected function buildPayload($notifiable, Notification $notification)
    {
        if ($notification instanceof UserNotification) {
            $user = $notification->getUser()->id;
        } else {
            $user = null;
        }
        return [
            'id' => $notification->id,
            'type' => get_class($notification),
            'data' => $this->getData($notifiable, $notification),
            'read_at' => null,
            'user_id' => $notification->getUser()->id ?? null
        ];
    }
}