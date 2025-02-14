<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\ListingRepository;
use App\Repositories\RegionRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(private CategoryRepository $CategoryRepository,private RegionRepository $RegionRepository,private ListingRepository $ListingRepository)
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category=$this->CategoryRepository->getParents();
        $region=$this->RegionRepository->getParents();
        return view('home',[
            'categories'=>$category,
            'regions'=>$region,
        ]);
    }
    public function account(){
        return view('livewire.account');

    }
    public function edit_account(){
        return view('livewire.edit_account');
    }
    public function show_info($id){
        $listings=$this->ListingRepository->getById($id);
        return view('livewire.show_info',compact('listings'));
    }
    public function account_show(){
        $listings=$this->ListingRepository->index();
        return view('livewire.account_show',compact('listings'));
    } public function contact(){
        return view('livewire.contact');
    }
     public function about(){
        return view('livewire.about');
    }
}
