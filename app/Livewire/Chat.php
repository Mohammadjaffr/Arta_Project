<?php

namespace App\Livewire;

<<<<<<< Updated upstream
=======
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
>>>>>>> Stashed changes
use Livewire\Component;

class Chat extends Component
{
<<<<<<< Updated upstream
=======
    public $listingId;
    public $receiverId;
    public $message;
    public $messages = [];
    protected $listeners = ['messageSent' => 'loadMessages'];
    protected $rules = [
        'message' => 'required|string|max:1000',
    ];

    public function mount($listingId, $receiverId)
    {
        $this->listingId = $listingId;
        $this->receiverId = $receiverId;
        $this->loadMessages();
    }

    public function loadMessages()
    {
        $this->messages = Message::where('listing_id', $this->listingId)
            ->where(function ($query) {
                $query->where('sender_id', Auth::id())
                    ->orWhere('receiver_id', Auth::id());
            })
            ->orderBy('created_at', 'asc')
            ->get()
            ->toArray();
    }

    public function sendMessage()
    {
        $this->validate();

        Message::query()->create([
            'sender_id' => Auth::id(),
            'receiver_id' => $this->receiverId,
            'listing_id' => $this->listingId,
            'message' => $this->message,
        ]);

        $this->message = '';
        $this->loadMessages();

        $this->dispatch('messageSent');
    }

>>>>>>> Stashed changes
    public function render()
    {
        return view('livewire.chat');
    }
}
