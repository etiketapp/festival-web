<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Notifications\Notification;

class DrawNotification extends Notification
{
    private $draw;

    public function __construct(Draw $draw)
    {
        $this->draw = $draw;
    }

    public function getDraw()
    {
        return $this->draw;
    }


}