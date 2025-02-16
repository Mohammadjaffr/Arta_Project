<?php

namespace App\Livewire;

use App\Models\listing;
use App\Repositories\ListingRepository;
use Livewire\Component;

class DeleteListing extends Component
{
    public $listingId;
    public function delete($listingId)
    {
        Listing::query()->find($listingId)->delete();
        session()->flash('message', 'Listing deleted successfully.');
        return redirect()->to('/account_show');
    }
    public function render()
    {
        $listing = Listing::query()->find($this->listingId);
        return view('livewire.delete-listing', compact('listing'));
    }
}
