<?php

namespace App\Livewire;

use App\Models\listing;
use App\Repositories\CategoryRepository;
use App\Repositories\CurrencyRepository;
use App\Repositories\ListingRepository;
use App\Repositories\RegionRepository;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class AddListing extends Component
{
//    #[Rule('required|min:30|max:30')]
    public $status;
//    #[Rule('required')]
    public $title;
//    #[Rule('required')]
    public $description;
//    #[Rule('required')]
    public $price;

    public $currency_id;

    public $category_id;

    public $region_id;

    public $primary_image;

    public $child;

    private CategoryRepository $CategoryRepository;
    private RegionRepository $RegionRepository;

    private CurrencyRepository $CurrencyRepository;

    public function  mount(CategoryRepository $CategoryRepository, RegionRepository $RegionRepository, CurrencyRepository $CurrencyRepository)
    {
        $this->CategoryRepository = $CategoryRepository;
        $this->RegionRepository = $RegionRepository;
        $this->CurrencyRepository = $CurrencyRepository;
    }
    protected $rules = [
        'status' => 'required|in:new,used,semi-new',
    ];
    public function createListing()
    {
        $this->validate();
        listing::query()->create([
            'status' => $this->status,
            'title' => $this->title,
            'user_id' => Auth::id(),
            'category_id' => $this->category_id,
            'currency_id' => $this->currency_id,
            'region_id' => $this->region_id,
            'description' => $this->description,
            'price' => $this->price,
            'primary_image' => $this->primary_image ?? null,
        ]);
        $this->reset(['status', 'category_id', 'currency_id', 'region_id', 'title', 'description', 'price', 'primary_image']);
        // إرسال رسالة نجاح
        session()->flash('message', 'تم نشر الإعلان بنجاح!');
        return redirect()->to('/livewire.add-listing');
    }


    public function render()
    {
        $categories = $this->CategoryRepository->getParents();

        $Regions = $this->RegionRepository->getParents();
        $currencies= $this->CurrencyRepository->index();
        return view('livewire.add-listing', compact( 'categories','currencies','Regions','catchs'));
    }
}
