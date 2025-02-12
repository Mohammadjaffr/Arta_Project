<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Comment;

class ShowComment extends Component
{
    public $listingId;
    public $commentsToShow = 4;
    public function mount($listingId)
    {
        $this->listingId = $listingId;
    }
    public function loadMoreComments()
    {
        $this->commentsToShow += 3;
    }

    #[On('refresh-comment')]
    public function render()
    {
        $totalComments= Comment::where('listing_id',$this->listingId)->count();
        $comments = Comment::where('listing_id', $this->listingId)
        ->orderBy('created_at', 'desc')
        ->take($this->commentsToShow)
        ->get();
        return view('livewire.show-comment', [
            'comments' => $comments,
            'showLoadMore' => $this->commentsToShow < $totalComments,
        ]);
    }
}
