<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\listing;
use Livewire\Component;
use App\Models\Region;
use Livewire\Attributes\Url;
class Listings extends Component
{
    #[Url()]
    public $title;
    public $region_parent_id;

    public $region_child_id;
    public function mount()
    {
        Carbon::setLocale('ar');
    }

    public function placeholder()
    {
        return view('components.listings-placeholder');
    }
    
    public function render()
    {
        $query = Listing::query();

        $childrens = $this->region_parent_id
        ? Region::where('parent_id', $this->region_parent_id)->get()
        : null;

        if ($this->region_child_id and $this->region_parent_id) {
            
            $query->where('region_id', $this->region_child_id);
        }elseif ($this->region_parent_id) {
            $this->region_child_id=null;
            $region = Region::with('children')->find($this->region_parent_id);
            if ($region) {
                $regionIds = $region->children()->pluck('id')->push($region->id);
                $allRegionIds = Region::whereIn('parent_id', $regionIds)->pluck('id');
                $regionIds = $regionIds->merge($allRegionIds);
                $query->whereIn('region_id', $regionIds);
            }
        }
        if ($this->title) {
            $query->where('title', 'like', "%{$this->title}%");
        }
        $listings = $query->with([
            'user:id,name',
            'category:id,name',
            'region:id,name',
            'images',
            'comments.user',
            'currency:id,code,name,abbr'
        ])->paginate(10);

        $Parents = Region::whereNull('parent_id')->get();
        
        Carbon::setLocale('ar');
        return view('livewire.listings',compact('listings','Parents','childrens'));
    }
}
