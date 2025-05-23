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
        $this->validate([
            'content'=>['required','string']
        ]);
         if (empty($this->content)) {
             $this->reset('content');
             session()->flash('error', 'يرجى كتابة تعليق قبل الإرسال.');
             return redirect()->to('/listing/' . $this->listingId);
         }
        $data=[
            'user_id' => Auth::id(),
            'listing_id' => $this->listingId,
            'content' => $this->content,
        ];
        $this->CommentRepository->store($data);

        $this->reset('content');

        // رسالة نجاح
        $this->reset('content');
        session()->flash('success', 'تم إضافة التعليق بنجاح.');
//        $this->dispatch('close-modal');
//        $this->dispatch('refresh-comment');
        return redirect()->to('/listing/' . $this->listingId);


    }

    public function render()
    {
        return view('livewire.add-comment');
    }
}
