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
    public $Parent_id;
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
        $Parents=Region::whereNull('parent_id')->get();;
        if(isset($this->Parent_id)){
            $region = Region::with('children')->find($this->Parent_id);
            if ($region) {
                $regionIds = $region->children()->pluck('id')->push($region->id);
                $allRegionIds = Region::whereIn('parent_id', $regionIds)->pluck('id');
                $regionIds = $regionIds->merge($allRegionIds);
                $query->whereIn('region_id', $regionIds);
            } 
        }
        $listings = $query->where('title','like',"%{$this->title}%")->with(['user:id,name','category:id,name','region:id,name','images','comments.user','currency:id,code,name,abbr'])->paginate(10);
        Carbon::setLocale('ar');
        return view('livewire.listings',compact('listings','Parents'));
    }
}
