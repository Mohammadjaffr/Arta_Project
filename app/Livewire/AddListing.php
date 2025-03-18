<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Listing;
use App\Models\region;
use App\Repositories\CategoryRepository;
use App\Repositories\CurrencyRepository;
use App\Repositories\ListingRepository;
use App\Repositories\RegionRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use function Livewire\store;

class AddListing extends Component
{
    use WithFileUploads;

    // Public properties for form fields
    public $status;
    public $title;
    public $description;
    public $price;
    public $currency_id;

    public $region_id;
    public $primary_image;
    public $images = [];

    public $category_parent_id;
    public $category_child_id;
    public $category_id;

    public $region_parent_id;
    public $region_child_id;


    // Private properties for repositories
    private $categoryRepository;
    private  $regionRepository;
    private  $currencyRepository;
    private  $listingRepository;

    // Validation rules
    protected function rules()
    {
        return [
            'status' => ['required', Rule::in(['جديد', 'مستعمل', 'شبه جديد'])],
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'currency_id' => 'required|exists:currencies,id',
            'category_id' => 'required|exists:categories,id',
            'region_id' => 'required|exists:regions,id',
//            'primary_image' => 'nullable|image|max:2048', // 2MB Max
//            'images' => 'nullable|array|max:5', // Maximum 5 additional images
//            'images.*' => 'nullable|image|max:2048', // 2MB Max per image
        ];
    }

    // Custom validation messages
    protected array $messages = [
        'status.required' => 'حالة الإعلان مطلوبة.',
        'status.in' => 'حالة الإعلان يجب أن تكون واحدة من: جديد, مستعمل, شبه جديد.',
        'title.required' => 'عنوان الإعلان مطلوب.',
        'title.max' => 'عنوان الإعلان يجب ألا يتجاوز 255 حرفًا.',
        'description.required' => 'وصف الإعلان مطلوب.',
        'price.required' => 'السعر مطلوب.',
        'price.numeric' => 'السعر يجب أن يكون رقمًا.',
        'currency_id.required' => 'العملة مطلوبة.',
        'currency_id.exists' => 'العملة المحددة غير صالحة.',
        'category_id.required' => 'الفئة مطلوبة.',
        'category_id.exists' => 'الفئة المحددة غير صالحة.',
        'region_id.required' => 'المنطقة مطلوبة.',
        'region_id.exists' => 'المنطقة المحددة غير صالحة.',
//        'primary_image.image' => 'يجب أن تكون الصورة الرئيسية ملف صورة.',
//        'primary_image.max' => 'يجب ألا تتجاوز الصورة الرئيسية 2 ميجابايت.',
//        'images.*.image' => 'يجب أن تكون جميع الصور ملفات صور.',
//        'images.*.max' => 'يجب ألا تتجاوز كل صورة 2 ميجابايت.',
    ];
    public function __construct(){
        $this->categoryRepository = new CategoryRepository();
        $this->regionRepository = new RegionRepository();
        $this->currencyRepository = new currencyRepository();
        $this->listingRepository = new ListingRepository();
    }
    // Dependency injection in the mount method
    public function mount(
    ) {
        $this->categoryRepository = new CategoryRepository();
        $this->regionRepository = new RegionRepository();
        $this->currencyRepository = new currencyRepository();
        $this->listingRepository = new ListingRepository();
    }


    // Handle form submission
    public function createListing()
    {
//        $this->validate();
        // Store the listing
        $listing = $this->listingRepository->store([
            'status' => $this->status,
            'title' => $this->title,
            'user_id' => Auth::id(),
            'category_id' => $this->category_child_id ?: $this->category_parent_id,
            'currency_id' => $this->currency_id,
            'region_id' => $this->region_child_id ?: $this->region_parent_id,
            'description' => $this->description,
            'price' => $this->price,
            'primary_image' => $this->primary_image,
        ]);

        // Save additional images if they exist
        if (!empty($this->images)) {
            $this->listingRepository->saveImages($this->images, $listing->id);
        }

        // Flash a success message
        session()->flash('message', 'تم نشر الإعلان بنجاح!');

        // Reset the form fields
        $this->reset([
            'status', 'title', 'description', 'price',
            'currency_id', 'category_id', 'region_id',
            'primary_image', 'images',
        ]);

        // Redirect to the desired page
        return redirect()->to('/listing');
    }

    // Render the component
    public function render()
    {
        $query = Listing::query();

        $children_categories = $this->category_parent_id
            ? Category::where('parent_id', $this->category_parent_id)->get()
            : null;

        if ($this->category_child_id and $this->category_parent_id) {

            $query->where('category_id', $this->category_child_id);
        }elseif ($this->category_parent_id) {
            $this->category_child_id=null;
            $category = Category::with('children')->find($this->category_parent_id);
            if ($category) {
                $categoryIds = $category->children()->pluck('id')->push($category->id);
                $allcategoryIds = Category::whereIn('parent_id', $categoryIds)->pluck('id');
                $categoryIds = $categoryIds->merge($allcategoryIds);
                $query->whereIn('category_id', $categoryIds);
            }
        }
        $parent_category = Category::whereNull('parent_id')->get();

        // start Fetch data child_regions
        $children_regions = $this->region_parent_id
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
        $parent_regions = Region::whereNull('parent_id')->get();
        //end the fetch data child_regions
        // Fetch data for the form
        $currencies = $this->currencyRepository->index();

        // Pass data to the view
        return view('livewire.add-listing', compact('parent_category', 'parent_regions', 'currencies','children_categories','children_regions'));
    }
}
