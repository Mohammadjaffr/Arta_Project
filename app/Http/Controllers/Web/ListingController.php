<?php

namespace App\Http\Controllers\web;

use App\Livewire\Listings;
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

    public function __construct(private ListingRepository $ListingRepository,private CategoryRepository $CategoryRepository, private RegionRepository $RegionRepository,private CurrencyRepository $CurrencyRepository)

    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = $this->CategoryRepository->getParents();
        $regions = $this->RegionRepository->getParents();
        $currencies = $this->CurrencyRepository->index();
        return view('add_new',compact('categories','regions','currencies'));

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
    public function store( Request $request)
    {

        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $listings=$this->ListingRepository->getById($id);
        return view('show_info',compact('listings'));
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
