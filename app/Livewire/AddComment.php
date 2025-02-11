<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\listing;
use App\Repositories\CommentRepository;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddComment extends Component
{

    public $content;
    public $listingId;
    private CommentRepository $CommentRepository;

    public function __construct()
    {
        $this->CommentRepository = new CommentRepository();
    }
    public function mount($listingId)
    {
        $this->listingId = $listingId;
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
    {  
        return view('livewire.add-comment');
    }
}
