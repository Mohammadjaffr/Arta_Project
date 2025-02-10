<?php

use App\Http\Controllers\web\CategoryController;

use App\Http\Controllers\web\ListingController;
use App\Http\Controllers\web\RegionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/add', function () {
    return view('add_new');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/account', [App\Http\Controllers\HomeController::class, 'account'])->name('account');
Route::get('/edit_account', [App\Http\Controllers\HomeController::class, 'edit_account'])->name('edit_account');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/account_show', [App\Http\Controllers\HomeController::class, 'account_show'])->name('account_show');
Route::resource('/category' ,CategoryController::class);
Route::resource('/listing' ,ListingController::class);
Route::resource('/region' ,RegionController::class);



