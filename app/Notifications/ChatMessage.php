<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ChatMessage extends Notification
{
    use Queueable;
    private $message_id;
    private $user_name;
    private $message;
    /**
     * Create a new notification instance.
     */
    public function __construct($message_id, $user_name,$message)
    {
        $this->message_id = $message_id;
        $this->user_name = $user_name;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }


    public function toArray(object $notifiable): array
    {
        return [
            'message_id'=>$this->message_id,
            'user_name'=>$this->user_name,
            'message'=>$this->message,
        ];
    }
}
