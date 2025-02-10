<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\listing;
use App\Repositories\CommentRepository;
use App\Repositories\ListingRepository;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddComment extends Component
{

    public $content;
    public $listingId;
    private ListingRepository $listingRepository;
    private CommentRepository $CommentRepository;

    public function __construct()
    {
        $this->CommentRepository = new CommentRepository();
        $this->listingRepository = new listingRepository();
    }
    public function mount($listingId,ListingRepository $listingRepository)
    {
        $this->listingId = $listingId;
        $this->listingRepository = $listingRepository;
    }

    public function addComment()
    {
        if (empty($this->content)) {
            session()->flash('error', 'يرجى كتابة تعليق قبل الإرسال.');
            return ;
        }
        $data=[  
            'user_id' => Auth::id(),
            'listing_id' => $this->listingId,
            'content' => $this->content,
        ];
        $this->CommentRepository->store($data);

        $this->reset('content');

        // رسالة نجاح
        session()->flash('addComment', 'تم إضافة التعليق بنجاح.');
        
        $this->dispatch('close-modal');
        $this->dispatch('refresh-comment');
    }

    public function render()
    {   $listing = $this->listingRepository->getById($this->listingId);
        return view('livewire.add-comment', compact('listing'));
    }
}
