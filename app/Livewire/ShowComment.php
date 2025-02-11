<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Comment;

class ShowComment extends Component
{
    public $listingId;
    public function mount($listingId)
    {
        $this->listingId = $listingId;
    }
    #[On('refresh-comment')]
    public function render()
    {
        $Comments= Comment::where('listing_id',$this->listingId)->get();
        return view('livewire.show-comment' , compact('Comments'));
    }
}
