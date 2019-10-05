<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class UserNotification extends Notification
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }


}