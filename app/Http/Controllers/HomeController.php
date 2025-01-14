<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
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
}
