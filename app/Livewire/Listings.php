<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Repositories\CommentRepository;
use App\Repositories\ListingRepository;
use App\Repositories\UserRepository;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithPagination;

class Listings extends Component
{
    use WithPagination;
    private ListingRepository $ListingRepository;
    private CommentRepository $CommentRepository;
    public function  mount(ListingRepository $ListingRepository, CommentRepository $CommentRepository)
    {
        $this->ListingRepository = $ListingRepository;
        $this->CommentRepository = $CommentRepository;
        Carbon::setLocale('ar');
    }
    public function placeholder()
    {
        return view('components.listings-placeholder');
    }

    public function render()
    {
        $listings=$this->ListingRepository->index();
        return view('livewire.listings',compact('listings'));
    }
}
