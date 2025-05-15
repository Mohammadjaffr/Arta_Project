<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Livewire\Attributes\On;

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
        $commentsQuery = Comment::where('listing_id', $this->listingId)
        ->orderBy('created_at', 'desc');
        $totalComments = $commentsQuery->count();
        $comments = $commentsQuery->take($this->commentsToShow)->get();
        return view('livewire.show-comment', [
            'comments' => $comments,
            'showLoadMore' => $this->commentsToShow < $totalComments,
        ]);
    }
}
