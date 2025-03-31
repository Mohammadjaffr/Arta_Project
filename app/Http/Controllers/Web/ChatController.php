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
        return view('users', compact('users', 'count_message'));
    }

    public function chat($receiverId)
    {
        $receiver = User::find($receiverId);

        $messages = Message::where(function ($query) use ($receiverId){
            $query->where('sender_id', Auth::id())->where('receiver_id', $receiverId);
        })->orWhere(function ($query) use ($receiverId) {
            $query->where('sender_id', $receiverId)->where('receiver_id', Auth::id());
        })->get();


        return view('chat', compact('receiver', 'messages'));
    }

    public function sendMessage(Request $request, $receiverId)
    {
        // save message to DB
        $message = Message::create([
            'sender_id'     => Auth::id(),
            'receiver_id'   => $receiverId,
            'message'       => $request->message,
        ]);
        $users = User::query()->where('id', '!=', Auth::id())->get();
        $user_name = $message->sender->name;
        Notification::send($users, new ChatMessage($message->id,$user_name,$message->message));
        // Fire the message event
        broadcast(new MessageSent($message))->toOthers();

        return response()->json(['status' => 'Message sent!']);
    }
    public function show($id)
    {
        Message::findOrFail($id);

        // For authenticated user's notifications
        auth()->user()->notifications()
            ->where('data->message_id', $id)
            ->update(['read_at' => now()]);

        return redirect('users');
    }
    public function typing()
    {
        // Fire the typing event
        broadcast(new UserTyping(Auth::id()))->toOthers();
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

}
