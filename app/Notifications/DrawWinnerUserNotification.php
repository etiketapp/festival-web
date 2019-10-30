<?php

namespace App\Notifications;

use App\Channels\DatabaseChannel;
use App\Models\Draw;
use App\Models\User;
use NotificationChannels\Apn\ApnMessage;
use NotificationChannels\Fcm\FcmChannel;
use NotificationChannels\Fcm\FcmMessage;
use NotificationChannels\Fcm\FcmNotification;
use PhpOffice\PhpSpreadsheet\Calculation\Database;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class DrawWinnerUserNotification extends UserNotification
{
    use Queueable;

    private $draw;
    private $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Draw $draw, User $user)
    {
        parent::__construct($user);
        $this->draw = $draw;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [FcmChannel::class, DatabaseChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'text'      => $this->draw->title . ' Kazananı ' . $this->user->full_name
        ];
    }

    /**
     * @param $notifiable
     * @return FcmMessage
     */
    public function toFcm($notifiable)
    {
        $fcmNotification = FcmNotification::create()
            ->setTitle($this->draw->title . ' Kazananı 🥑')
            ->setSound("default")
            ->setBadge("1")
            ->setBody(trans('notifications.draw.text', [
                'user'          => $this->user->full_name,
                'draw'          => $this->draw->title,
            ]));

        return FcmMessage::create()
            ->setPriority(FcmMessage::PRIORITY_HIGH)
            ->setTimeToLive(86400)
            ->setNotification($fcmNotification);
    }
}
