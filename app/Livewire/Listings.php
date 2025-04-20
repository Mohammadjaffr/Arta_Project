<?php

namespace App\Livewire;

use App\Models\Category;
use Carbon\Carbon;
use App\Models\Listing;
use Illuminate\Support\Facades\Auth;
use Laravel\Pail\ValueObjects\Origin\Http;
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
    public $selectedCategory = null;

    public $category_parent_id;
    public $category_child_id;

    public $view_stats = 'list';

    public $page=1;
    public $listing_more=true;
    public $all_listinges;

    public function list_all_listing()
    {
        $this->selectedCategory = null;
        $this->category_parent_id = null;
        $this->category_child_id = null;
        $this->region_parent_id = null;
        $this->region_child_id = null;
        $this->title = null;
        $this->sort = 'asc';
        $this->page = 1;
    }

    public function set_view_stats($mode)
    {
        $this->view_stats = $mode;

    }

    public function loadMore()
    {
        $this->page++;
    }

    public function getRegionFromIp()
    {
        if (app()->environment('local')) {
            return null; // أو إرجاع منطقة افتراضية
        }

        $ip = request()->ip();
        $response = Http::get("https://ipinfo.io/{$ip}?token=cf551691cec329");
        $data = $response->json();

        $regionName = $data['region'] ?? null;

        if ($regionName) {
            $region = Region::where('name', 'like', "%{$regionName}%")->first();
            return $region ? $region->id : null;
        }

        return null;
    }

    public function changeRegion($regionId)
    {
        $this->region_parent_id = $regionId;
        $this->region_child_id = null;
    }
    // تصفية حسب السعر
    public function sortByPrice($order)
    {
        $this->sort = $order;
    }

    // تصفية حسب الفئة
    public function filterByCategory($categoryId)
    {

        $this->selectedCategory = $categoryId;
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
        if (Auth::check()) {
            $query->where('user_id', '!=', Auth::id());
        }
        $children_categories = $this->selectedCategory
            ? Category::where('parent_id', $this->selectedCategory)->get()
            : null;

        if ($this->category_child_id and $this->selectedCategory) {

            $query->where('category_id', $this->category_child_id);
        }elseif ($this->selectedCategory) {
            $this->category_child_id=null;
            $category = Category::with('children')->find($this->category_parent_id);
            if ($category) {
                $categoryIds = $category->children()->pluck('id')->push($category->id);
                $allcategoryIds = Category::whereIn('parent_id', $categoryIds)->pluck('id');
                $categoryIds = $categoryIds->merge($allcategoryIds);
                $query->whereIn('category_id', $categoryIds);
            }
        }
//        end the list children_categories
        // تصفية حسب الفئة
        if ($this->selectedCategory) {
            $category = Category::with('children')->find($this->selectedCategory);
            if ($category) {
                $categoryIds = $category->children()->pluck('id')->push($category->id);
                $allCategoryIds = Category::whereIn('parent_id', $categoryIds)->pluck('id');
                $categoryIds = $categoryIds->merge($allCategoryIds);
                $query->whereIn('category_id', $categoryIds);
            }
        }

        // تصفية حسب المنطقة
        $children = $this->region_parent_id
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


        $listings = $query->with([
            'user:id,name',
            'category:id,name',
            'region:id,name',
            'images',
            'comments.user',
            'currency:id,code,name,abbr'
        ])->paginate(5 * $this->page);

        $this->listing_more =$listings->hasMorePages();

        // جلب المناطق الرئيسية
        $Parents = Region::whereNull('parent_id')->get();

        // جلب الفئات
        $categories = Category::whereNull('parent_id')->get();


        Carbon::setLocale('ar');
        return view('livewire.listings', compact('listings', 'Parents', 'children', 'categories','children_categories',));
    }
}
