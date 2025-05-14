<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Listing;
use App\Models\Region;

class NearbyListings extends Component
{
    protected $listeners = [
        'found-location' => 'findListings',
        'location-error' => 'handleLocationError'
    ];

    public function handleLocationError()
    {
        $this->isLoading = false;
    }
    public $showButton = true;
    public $listings = [];
    public $currentRegion;
    public $distance = 10;
    public $isLoading = false;

    public function requestLocation()
    {
        $this->isLoading = true;
        $this->dispatchBrowserEvent('request-user-location');
    }

    public function findListings($lat, $lng)
    {
        $this->isLoading = false;

        // البحث عن المنطقة الأقرب
        $region = Region::selectRaw("*,
            (6371 * acos(cos(radians(?)) * cos(radians(latitude)) *
            cos(radians(longitude) - radians(?)) + sin(radians(?)) *
            sin(radians(latitude)))) AS distance",
            [$lat, $lng, $lat])
            ->orderBy('distance')
            ->first();

        if ($region) {
            $this->currentRegion = $region;

            // جلب الإعلانات في نفس المنطقة
            $this->listings = Listing::with(['user', 'category', 'region'])
                ->where('region_id', $region->id)
                ->latest()
                ->get();
        }
    }

    public function render()
    {
        return view('livewire.nearby-listings');
    }
}
