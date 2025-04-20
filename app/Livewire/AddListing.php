<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Listing;
use App\Models\Region;
use App\Repositories\CategoryRepository;
use App\Repositories\CurrencyRepository;
use App\Repositories\ListingRepository;
use App\Repositories\RegionRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddListing extends Component
{
    use WithFileUploads;

    // Form fields
    public $status;
    public $title;
    public $description;
    public $price;
    public $currency_id;
    public $primary_image;
    public $images = [];
    public $category_parent_id;
    public $category_child_id;
    public $region_parent_id;
    public $region_child_id;

    // Repositories
    private CategoryRepository $categoryRepository;
    private RegionRepository $regionRepository;
    private CurrencyRepository $currencyRepository;
    private ListingRepository $listingRepository;

    protected function rules(): array
    {
        return [
            'status' => ['required', Rule::in(['جديد', 'مستعمل', 'شبه جديد'])],
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'currency_id' => 'required|exists:currencies,id',
            'category_parent_id' => 'required|exists:categories,id',
            'category_child_id' => 'required|exists:categories,id',
            'region_parent_id' => 'required|exists:regions,id',
            'region_child_id' => 'required|exists:regions,id',
            'primary_image' => 'required|image|max:2048',
            'images' => 'nullable|array|max:4',
            'images.*' => 'nullable|image|max:2048',
        ];
    }

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
        'primary_image.required' => 'الصوره الرئيسية مطلوبة.',
        'category_parent_id.required' => 'الفئة الرئيسية مطلوبة.',
        'category_child_id.required' => 'الفئة الفرعية مطلوبة.',
        'category_parent_id.exists' => 'الفئة المحددة الرئيسية غير صالحة.',
        'category_child_id.exists' => 'الفئة المحددةالفرعية غير صالحة.',
        'region_parent_id.required' => 'المنطقة الرئيسية مطلوبة.',
        'region_child_id.required' => 'المنطقة الفرعية مطلوبة.',
        'region_parent_id.exists' => 'المنطقة المحددة الرئيسية غير صالحة.',
        'region_child_id.exists' => 'المنطقة المحددة الفرعية غير صالحة.',
        'primary_image.image' => 'يجب أن تكون الصورة الرئيسية ملف صورة.',
        'primary_image.max' => 'يجب ألا تتجاوز الصورة الرئيسية 2 ميجابايت.',
        'images.*.image' => 'يجب أن تكون جميع الصور ملفات صور.',
        'images.*.max' => 'يجب ألا تتجاوز كل صورة 2 ميجابايت.',

    ];
    public function __construct(){
        $this->categoryRepository = new CategoryRepository();
        $this->regionRepository = new RegionRepository();
        $this->currencyRepository = new currencyRepository();
        $this->listingRepository = new ListingRepository();
    }

    public function mount(
        CategoryRepository $categoryRepository,
        RegionRepository $regionRepository,
        CurrencyRepository $currencyRepository,
        ListingRepository $listingRepository
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->regionRepository = $regionRepository;
        $this->currencyRepository = $currencyRepository;
        $this->listingRepository = $listingRepository;
    }

    public function createListing()
    {
        $this->validate();

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

        if (!empty($this->images)) {
            $this->listingRepository->saveImages($this->images, $listing->id);
        }

        session()->flash('success', 'تم نشر الإعلان بنجاح!');
        $this->resetFormFields();

        return redirect()->to('/listing');
    }

    private function resetFormFields(): void
    {
        $this->reset([
            'status', 'title', 'description', 'price',
            'currency_id', 'category_parent_id', 'category_child_id',
            'region_parent_id', 'region_child_id', 'primary_image', 'images',
        ]);
    }

    public function render()
    {
        return view('livewire.add-listing', [
            'parent_category' => Category::whereNull('parent_id')->get(),
            'parent_regions' => Region::whereNull('parent_id')->get(),
            'currencies' => $this->currencyRepository->index(),
            'children_categories' => $this->category_parent_id
                ? Category::where('parent_id', $this->category_parent_id)->get()
                : null,
            'children_regions' => $this->region_parent_id
                ? Region::where('parent_id', $this->region_parent_id)->get()
                : null,
        ]);
    }
}
