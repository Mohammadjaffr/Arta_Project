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
        $cat=$this->CategoryRepository->getParents();
        $ra=$this->RegionRepository->getParents();

        return view('home',[
            'cat'=>$cat,
            'ra'=>$ra,
        ]);
    }
    public function account(){
        return view('livewire.account');

    }
    public function edit_name(){
        return view('livewire.edit_name');
    }
    public function edit_email(){
        return view('livewire.edit_email');
    }
    public function edit_password(){
        return view('livewire.edit_password');
    }
    public function edit_number(){
        return view('livewire.edit_number');
    }
    public function show_info($id){
        $listings=$this->ListingRepository->getById($id);
        return view('livewire.show_info',compact('listings'));
    }
    public function account_show(){
        return view('livewire.account_show');
    }
}
