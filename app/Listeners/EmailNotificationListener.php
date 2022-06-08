<?php

namespace App\Listeners;

use App\Notifications\EmailNotificationSender;
use Illuminate\Support\Facades\Notification;

class EmailNotificationListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle($event)
    {
        $notification = $event->notification;

        if ($notification->channel === 'email') {
            Notification::send($notification->client, new EmailNotificationSender($notification));
        }
    }
}
