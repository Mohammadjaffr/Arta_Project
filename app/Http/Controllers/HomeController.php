<?php

namespace App\Http\Controllers;

use App\Models\image;
use App\Models\listing;
use App\Models\User;
use App\Repositories\CategoryRepository;
use App\Repositories\ListingRepository;
use App\Repositories\RegionRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(private CategoryRepository $CategoryRepository,private RegionRepository $RegionRepository,private ListingRepository $ListingRepository,private UserRepository $userRepository)
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
    public function edit_account($id){
        $users= User::query()->find($id);
        return view('livewire.edit_account',compact('users'));
    }
    public function update(Request $request,string $id)
    {
        // Prepare the data for update
        $user = User::query()->find($request->id);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username= $request->username;
        $user->contact_number= $request->contact_number;
        $user->whatsapp_number =$request->whatsapp_number;
        $user->password=$request->password;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = uniqid('', true) . '.' . $extension;
            $filePath = $image->storeAs('user_images', $filename, 'public');
            $user->image = 'storage/' . $filePath;
        } else {
            $user->image = null;
        }
        $user->socialMediaAccounts()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'twitter' => $request->twitter,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,
                'snapchat' => $request->snapchat,
            ]
        );
        $user->save();
        return redirect()->route('edit_account', ['id' => $user->id])->with('success', 'تم تحديث الحساب بنجاح');

    }

    public function show_info($id){

        $listings=$this->ListingRepository->getById($id);
        return view('livewire.show_info',compact('listings'));
    }
    public function account_show(){
        $listings= Listing::query()->get();
        return view('livewire.account_show',compact('listings'));
    } public function contact(){
        return view('livewire.contact');
    }
     public function about(){
        return view('livewire.about');
    }
    public function change_password(Request $request)
    {
        $data= [
            'old_password'=>$request->old_password,
            'password'=>$request->password,
        ];
        $this->userRepository->changePassword($data,Auth::user());
        return redirect('/home');
    }
}
