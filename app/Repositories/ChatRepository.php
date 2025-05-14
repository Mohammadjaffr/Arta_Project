<?php
namespace App\Repositories;

use App\Interfaces\RepositoriesInterface;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class ChatRepository implements RepositoriesInterface
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        return Message::with(['sender:id,name', 'receiver:id,name'])->paginate(10);
    }

    public function getById($id): Message
    {
        return Message::with(['sender:id,name', 'receiver:id,name'])->findOrFail($id);
    }

    public function store(array $data): Message
    {
        return Message::create($data);
    }

    public function update(array $data, $id): Message
    {
        $message = Message::findOrFail($id);
        $message->update($data);
        return $message;
    }

    public function delete($id): bool
    {
        return Message::where('id', $id)->delete() > 0;
    }


    public function getChatMessages($receiverId)
    {
         return Message::with(['sender:id,name', 'receiver:id,name'])->where('receiver_id', $receiverId)->get();

    }




}
