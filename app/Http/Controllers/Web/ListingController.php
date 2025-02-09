<?php

namespace App\Http\Controllers\web;

use App\Models\listing;
use App\Repositories\CategoryRepository;
use App\Repositories\CurrencyRepository;
use App\Repositories\RegionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ListingRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
   /**
     * Create a new class instance.
    */
    public function __construct(private ListingRepository $ListingRepository,private CategoryRepository $CategoryRepository, private RegionRepository $RegionRepository,private CurrencyRepository $CurrencyRepository
                    )

    {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->CategoryRepository->getParents();
        $Regions = $this->RegionRepository->getParents();
        $currencies = $this->CurrencyRepository->index();
        return view('add_new', compact('categories','Regions','currencies'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'status' => 'required|string',
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'currency_id' => 'required|exists:currencies,id',
            'region_id' => 'required|exists:regions,id',
            'description' => 'required|string',
            'price' => 'required|numeric',
//            'primary_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'status.required' => 'حقل الحالة مطلوب.',
            'status.string' => 'حقل الحالة يجب أن يكون نصًا.',

            'title.required' => 'حقل العنوان مطلوب.',
            'title.string' => 'حقل العنوان يجب أن يكون نصًا.',
            'title.max' => 'حقل العنوان يجب ألا يتجاوز 255 حرفًا.',

            'category_id.required' => 'حقل التصنيف مطلوب.',
            'category_id.exists' => 'التصنيف المحدد غير صالح.',

            'currency_id.required' => 'حقل العملة مطلوب.',
            'currency_id.exists' => 'العملة المحددة غير صالحة.',

            'region_id.required' => 'حقل المنطقة مطلوب.',
            'region_id.exists' => 'المنطقة المحددة غير صالحة.',

            'description.required' => 'حقل الوصف مطلوب.',
            'description.string' => 'حقل الوصف يجب أن يكون نصًا.',

            'price.required' => 'حقل السعر مطلوب.',
            'price.numeric' => 'حقل السعر يجب أن يكون رقمًا.',

//            'primary_image.image' => 'يجب أن يكون الملف المرفق صورة.',
//            'primary_image.mimes' => 'يجب أن تكون الصورة من نوع: jpeg, png, jpg, gif.',
//            'primary_image.max' => 'يجب ألا يتجاوز حجم الصورة 2048 كيلوبايت.',
        ]);

        listing::create([
            'status' => $validatedData['status'],
            'title' => $validatedData['title'],
            'user_id' => Auth::id(),
            'category_id' => $validatedData['category_id'],
            'currency_id' => $validatedData['currency_id'],
            'region_id' => $validatedData['region_id'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'primary_image' => $request->primary_image ?? null,
//            'primary_image' => $request->hasFile('primary_image') ? $request->file('primary_image')->store('storage/primary_image/images', 'public') : null,
        ]);

        session()->flash('Add', 'تم اضافة الاعلان بنجاح');
        return redirect('/listing');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
