<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\web\CategoryController;

use App\Http\Controllers\Web\ChatController;
use App\Http\Controllers\web\ListingController;
use App\Http\Controllers\web\RegionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleLoginController;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/add', function () {
    return view('add_new');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/account', [App\Http\Controllers\HomeController::class, 'account'])->name('account');
Route::get('/edit_account/{id}', [App\Http\Controllers\HomeController::class, 'edit_account'])->name('edit_account');
Route::put('/update/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('update');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/chat', [App\Http\Controllers\HomeController::class, 'chat'])->name('chat');

Route::get('/account_show', [App\Http\Controllers\HomeController::class, 'account_show'])->name('account_show');
Route::resource('/category' ,CategoryController::class);
Route::resource('/listing' ,ListingController::class);
Route::resource('/region' ,RegionController::class);
Route::post('/change_password', [App\Http\Controllers\HomeController::class, 'change_password'])->name('change_password');
////////////////////////////////
Route::post('/resendOTP', [App\Http\Controllers\HomeController::class, 'resendOTP'])->name('resendOTP');
Route::post('/verifyOtpAndLogin', [App\Http\Controllers\HomeController::class, 'verifyOtpAndLogin'])->name('verifyOtpAndLogin');
Route::get('/OTP', [App\Http\Controllers\HomeController::class, 'OTP'])->name('OTP');
////////////////////////////////////////////////
///

Route::post('/resendOTP_Register', [App\Http\Controllers\HomeController::class, 'resendOTP_Register'])->name('resendOTP_Register');
Route::post('/VerifyOtpAndRegisterLogin', [App\Http\Controllers\HomeController::class, 'VerifyOtpAndRegisterLogin'])->name('VerifyOtpAndRegisterLogin');
Route::get('/OTP_Register_Email', [App\Http\Controllers\HomeController::class, 'OTP_Register_Email'])->name('OTP_Register_Email');
Route::get('/VerifyOtpRegister', [App\Http\Controllers\HomeController::class, 'VerifyOtpRegister'])->name('VerifyOtpRegister');
//////////////////////

Route::get('/change_password_login', [App\Http\Controllers\HomeController::class, 'change_password_login'])->name('change_password_login');
Route::get('/change_password',function (){
    return view('livewire.change_password');
});
// GOOGLE  //
Route::get('/auth/google/redirect', function (){
    // return Socialite::driver('google')->stateless()->redirect();
});
//Route::get('/auth/google', [GoogleLoginController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleLoginController::class, 'handleGoogleCallback']);
// realtime for chat //
Route::middleware('auth')->group(function (){
    Route::get('/users', [ChatController::class, 'index'])->name('users');
    Route::get('/chat/{receiverId}', [ChatController::class, 'chat'])->name('chat');
    Route::post('/chat/{receiverId}/send', [ChatController::class, 'sendMessage']);
    Route::post('/chat/typing', [ChatController::class, 'typing']);
    Route::post('/online', [ChatController::class, 'setOnline']);
    Route::post('/offline', [ChatController::class, 'setOffline']);
    Route::get('/chats', [ChatController::class, 'index'])->name('chat.index');
    Route::get('/show_users_notifications', [ChatController::class, 'show_users_notifications'])->name('show_users_notifications');
});


