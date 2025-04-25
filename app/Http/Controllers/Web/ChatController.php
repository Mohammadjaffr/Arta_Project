<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Notifications\ChatMessage;
use Illuminate\Http\Request;
use App\Events\MessageSent;
use App\Events\UserTyping;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class ChatController extends Controller
{

    public $count =0;
    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        $count_message = Message::where('receiver_id', auth()->id())->whereNull('read_at')->count();
        return view('users_chat', compact('users', 'count_message'));
    }



    public function chat($receiverId)
    {
        $receiver = User::find($receiverId);

        if (!$receiver) {
            return redirect()->route('chat.index')->withErrors('User not found.');
        }

        // استرداد الرسائل
        $messages = Message::where(function ($query) use ($receiverId) {
            $query->where('sender_id', Auth::id())->where('receiver_id', $receiverId);
        })->orWhere(function ($query) use ($receiverId) {
            $query->where('sender_id', $receiverId)->where('receiver_id', Auth::id());
        })->get();

        // بدء المعاملة
        DB::transaction(function () use ($receiverId) {
            // تحديث حالة الرسائل كمقروءة
            Message::where('receiver_id', Auth::id())
                ->where('sender_id', $receiverId)
                ->where('read_at', null) // تأكد من عدم تحديث الرسائل المقروءة مسبقًا
                ->update(['read_at' => now()]);

            // تحديث الإشعارات كمقروءة
             DB::table('notifications')
                ->where('data->user_id', $receiverId) // تأكد من أن لديك المفتاح المناسب
                ->where('notifiable_id', Auth::id()) // المستخدم الذي تم إشعاره
                ->whereNull('read_at') // تأكد من عدم تحديث الإشعارات المقروءة مسبقًا
                ->update(['read_at' => now()]);

            // التحقق
        });
       $user= User::where('id', '!=', auth()->id())->first();
        return view('chat', compact('receiver', 'messages','user'));
    }

    public function sendMessage(Request $request, $receiverId)
    {
        // save message to DB
        $message = Message::create([
            'sender_id'     => Auth::id(),
            'receiver_id'   => $receiverId,
            'message'       => $request->message,
        ]);
        $users = User::find($message->receiver_id);
        $user_sender = $message->sender->id;
        $user_name = $message->sender->name;
        Notification::send($users, new ChatMessage($message->id,$user_name,$message->message,$user_sender));
        // Fire the message event
        event(new MessageSent($message));

        return response()->json(['status' => 'Message sent!']);
    }

    public function typing()
    {
        // Fire the typing event
        event(new UserTyping(auth()->id()));
        return response()->json(['status' => 'typing broadcasted!']);
    }

    public function setOnline()
    {
        Cache::put('user-is-online-' . Auth::id(), true, now()->addMinutes(5));
        return response()->json(['status' => 'Online']);
    }

    public function setOffline()
    {
        Cache::forget('user-is-online-' . Auth::id());
        return response()->json(['status' => 'Offline']);
    }

        public function show_users_notifications()
    {
        return view('users_notifications');
    }


}
