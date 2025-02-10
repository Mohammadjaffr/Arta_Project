<?php

namespace App\Livewire;

use Livewire\Component;
use App\Repositories\ListingRepository;
use Livewire\Attributes\On;

class ShowComment extends Component
{
    public $listingId;
    private ListingRepository $listingRepository;
    public function __construct()
    {
        $this->listingRepository= new listingRepository();
    }

    public function mount($listingId,ListingRepository $listingRepository)
    {
        $this->listingId = $listingId;
        $this->listingRepository = $listingRepository;
    }
    #[On('refresh-comment')]
    public function render()
    {
        $listing = $this->listingRepository->getById($this->listingId);
        return view('livewire.show-comment' , compact('listing'));
    }
}
