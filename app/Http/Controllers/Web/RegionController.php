<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\RegionRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegionController extends Controller
{
    /**
     * Create a new class instance.
     */
    public function __construct(private RegionRepository $RegionRepository)
    {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regions_show=$this->RegionRepository->index();
        $regions=$this->RegionRepository->getParents();
        return view('add_new',compact('regions','regions_show'));    }

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
        $validator = Validator::make($request->all(), [
            'name' => ['required','string'],
            'parent_id' => ['nullable',Rule::exists('Regions','id')]
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
         $this->RegionRepository->store((array)$request);
        return redirect()->route('regions.index');

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
