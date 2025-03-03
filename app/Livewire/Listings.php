<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Listing;
use Livewire\Component;
use App\Models\Region;
use Livewire\Attributes\Url;

class Listings extends Component
{
    #[Url()]
    public $title;
    public $region_parent_id;
    public $region_child_id;
    public $sort = 'asc';
    public $category = null; // خاصية لتخزين الفئة المحددة

    // تصفية حسب الفئة
    public function filterByCategory($category)
    {
        $this->category = $category;
    }

    // تصفية حسب السعر
    public function sortByPrice($order)
    {
        $this->sort = $order;
    }

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

        // تصفية حسب الفئة
        if ($this->category) {
            $query->whereHas('category', function ($q) {
                $q->where('name', $this->category);
            });
        }

        // تصفية حسب المنطقة
        $childrens = $this->region_parent_id
            ? Region::where('parent_id', $this->region_parent_id)->get()
            : null;

        if ($this->region_child_id && $this->region_parent_id) {
            $query->where('region_id', $this->region_child_id);
        } elseif ($this->region_parent_id) {
            $this->region_child_id = null;
            $region = Region::with('children')->find($this->region_parent_id);
            if ($region) {
                $regionIds = $region->children()->pluck('id')->push($region->id);
                $allRegionIds = Region::whereIn('parent_id', $regionIds)->pluck('id');
                $regionIds = $regionIds->merge($allRegionIds);
                $query->whereIn('region_id', $regionIds);
            }
        }

        // تصفية حسب العنوان
        if ($this->title) {
            $query->where('title', 'like', "%{$this->title}%");
        }

        // ترتيب حسب السعر
        if ($this->sort === 'asc') {
            $query->orderBy('price', 'asc');
        } elseif ($this->sort === 'desc') {
            $query->orderBy('price', 'desc');
        }

        // جلب البيانات مع العلاقات
        $listings = $query->with([
            'user:id,name',
            'category:id,name',
            'region:id,name',
            'images',
            'comments.user',
            'currency:id,code,name,abbr'
        ])->paginate(10);

        // جلب المناطق الرئيسية
        $Parents = Region::whereNull('parent_id')->get();

        Carbon::setLocale('ar');
        return view('livewire.listings', compact('listings', 'Parents', 'childrens'));
    }
}
