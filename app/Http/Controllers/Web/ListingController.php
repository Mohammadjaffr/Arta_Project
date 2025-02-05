<?php

namespace App\Http\Controllers\web;

use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ListingRepository;

class ListingController extends Controller
{
   /**
     * Create a new class instance.
    */
    public function __construct(private ListingRepository $ListingRepository,private CategoryRepository $CategoryRepository)
    {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->CategoryRepository->index();
        return view('add_new', compact('categories'));

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
        return $request;
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
