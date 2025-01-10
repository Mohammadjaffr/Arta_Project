<?php

use App\Http\Controllers\web\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/add', function () {
    return view('add_new');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/account', [App\Http\Controllers\HomeController::class, 'account'])->name('account');
Route::get('/edit_password', [App\Http\Controllers\HomeController::class, 'edit_password'])->name('edit_password');
Route::get('/edit_number', [App\Http\Controllers\HomeController::class, 'edit_number'])->name('edit_number');
Route::get('/edit_email', [App\Http\Controllers\HomeController::class, 'edit_email'])->name('edit_email');
Route::get('/edit_password', [App\Http\Controllers\HomeController::class, 'edit_password'])->name('edit_password');
Route::get('/edit_name', [App\Http\Controllers\HomeController::class, 'edit_name'])->name('edit_name');
Route::resource('/category' ,CategoryController::class);



