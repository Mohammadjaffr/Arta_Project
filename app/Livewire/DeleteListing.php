<?php

namespace App\Livewire;

use App\Models\listing;
use App\Repositories\ListingRepository;
use Livewire\Component;

class DeleteListing extends Component
{

    public function delete( $id)
    {
      Listings::find($id)->delete();
    }
    public function render()
    {
        $listings = Listing::all();
        return view('livewire.delete-listing', compact(['listings']));
    }
}
