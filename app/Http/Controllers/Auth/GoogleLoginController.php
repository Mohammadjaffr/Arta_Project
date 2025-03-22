<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    public function __construct(private UserRepository $UserRepository)
    {
        //
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'فشل تسجيل الدخول باستخدام Google.');
        }

        $user = $this->UserRepository->findByEmail($googleUser->getEmail());

        if (!$user) {
            $user = $this->UserRepository->store([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'google_id' => $googleUser->getId(),
                'password' => Str::random(12),
            ]);
        }

        Auth::login($user);



        return redirect()->route('home')->with('success','تم تسجيل دخولك بنجاح');
    }
}
