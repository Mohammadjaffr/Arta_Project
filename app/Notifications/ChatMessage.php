<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class ChatMessage extends Notification
{
    use Queueable;
    private $message_id;
    private $user_name;
    private $message;
    private $user_id;
    /**
     * Create a new notification instance.
     */
    public function __construct($message_id, $user_name,$message,$user_id)
    {
        $this->message_id = $message_id;
        $this->user_name = $user_name;
        $this->message = $message;
        $this->user_id = $user_id;
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
    public function markAsRead($id)
    {
        $notification = Auth::user()->unreadNotifications()->where('id', $id)->first();

        if ($notification) {
            $notification->markAsRead();
        }

        return response()->json(['success' => true]);
    }

    public function toArray(object $notifiable): array
    {
        return [
            'message_id'=>$this->message_id,
            'user_name'=>$this->user_name,
            'message'=>$this->message,
            'user_id'=>$this->user_id
        ];
    }
}
