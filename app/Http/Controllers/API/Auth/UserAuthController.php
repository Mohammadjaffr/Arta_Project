<?php

namespace App\Http\Controllers\api\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Classes\ApiResponseClass;
//use Illuminate\Container\Attributes\Auth;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Socialite\Facades\Socialite;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Validator;

class UserAuthController extends Controller
{
    /**
     * Create a new class instance.
     */
    public function __construct(private UserRepository $UserRepository)
    {
        //
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8','confirmed'],
            'whatsapp_number'=>['nullable','string','max:16','regex:/^[0-9]+$/'],
            'contact_number'=>['nullable','string','max:16','regex:/^[0-9]+$/']
        ]);
        if ($validator->fails())
            return ApiResponseClass::sendValidationError($validator->errors()
        );
        $userData=$this->UserRepository->store($request->all());
        return ApiResponseClass::sendResponse($userData,'User created successfully');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login' => ['required','string'],
            'password' => ['required','string']
        ]);
        if ($validator->fails())
            return ApiResponseClass::sendValidationError($validator->errors()
        );
        $login = $request['login'];
        $password = $request['password'];

        $user = User::where('email', $login)->orWhere('username', $login)->first();
        if ($user && Hash::check($password, $user->password)){
            Auth::login($user);
            $token = $user->createToken($user->username . '-AuthToken')->plainTextToken;
            $permissions = $user->allPermissions()->pluck('display_name', 'name')->toArray();
            $result= $result=['token' => $token, 'user' => $user, 'permissions' => $permissions];
            return ApiResponseClass::sendResponse($result, 'User logged in successfully');
        }
         return ApiResponseClass::sendError('Unauthorized', ['error' => 'Invalid credentials'], 401);

    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        $googleUser = Socialite::driver('google')->user();
        $user = $this->UserRepository->findByEmail($googleUser->getEmail());
        if (!$user) {
            $user = $this->UserRepository->store([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'google_id' => $googleUser->getId(),
                'password'=>Str::random(12)
            ]);
        }
        Auth::login($user);
        $token = $user->createToken($user->username . '-AuthToken')->plainTextToken;
        $result= $result=['token' => $token, 'user' => $user];
        return ApiResponseClass::sendResponse($result, 'User logged in successfully');

    }
    public function logout(Request $request)
    {
        PersonalAccessToken::findToken($request->bearerToken())->delete();
        return ApiResponseClass::sendResponse(null, 'Logged out successfully');
    }
}
