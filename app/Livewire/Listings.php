<?php

namespace App\Livewire;

use App\Repositories\ListingRepository;
use App\Repositories\UserRepository;
use Livewire\Component;
use Carbon\Carbon;

class Listings extends Component
{
    private ListingRepository $ListingRepository;
    public function  mount(ListingRepository $ListingRepository)
    {
        $this->ListingRepository = $ListingRepository;
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
