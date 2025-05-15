<?php

namespace App\Http\Controllers\api\Auth;

use App\Mail\OtpMail;
use App\Models\User;
use App\Services\OtpService;
use Illuminate\Support\Facades\Mail;
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
    public function __construct(private UserRepository $UserRepository,private OtpService $otpService)
    {
        //
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8','confirmed'],
            'whatsapp_number'=>['nullable','string','min:9','max:15','regex:/^[0-9]+$/'],
            'contact_number'=>['nullable','string','min:9','max:15','regex:/^[0-9]+$/'],
        ],[
            'name.required' => 'الاسم مطلوب.',
            'email.required' => 'يجب إدخال البريد الإلكتروني',
            'email.email' => 'يجب إدخال بريد إلكتروني صالح',
            'email.unique' => 'البريد الإلكتروني مسجل مسبقًا.',
            'password.required' => 'كلمة المرور مطلوبة.',
            'password.min' => 'كلمة المرور يجب أن تحتوي على 6 أحرف على الأقل.',
            'password.confirmed' => 'تأكيد كلمة المرور غير متطابق.',
            'whatsapp_number.required' => 'رقم واتساب مطلوب.',
            'contact_number.required' => 'رقم الاتصال مطلوب.',
            'whatsapp_number.regex' => 'يجب أن يحتوي رقم واتساب على أرقام فقط.',
            'contact_number.regex' => 'يجب أن يحتوي رقم الاتصال على أرقام فقط.',
            'whatsapp_number.min' => 'يجب أن يكون رقم واتساب على الأقل :min أرقام.',
            'contact_number.min' => 'يجب أن يكون رقم الاتصال على الأقل :min أرقام.',
            'whatsapp_number.max' => 'يجب أن لا يتجاوز رقم واتساب :max رقماً.',
            'contact_number.max' => 'يجب أن لا يتجاوز رقم الاتصال :max رقماً.',
        ]);
        if ($validator->fails())
            return ApiResponseClass::sendValidationError($validator->errors()
        );
        $userData=$this->UserRepository->store($request->all());
        $otp=$this->otpService->generateOTP($userData->email,'account_creation');
        Mail::to($userData->email)->send(new OtpMail($otp));

        return ApiResponseClass::sendResponse($userData,'تم إرسال رمز التحقق الى البريد الإلكتروني :'. $userData->email);
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
         $result = ['token' => $token, 'user' => $user];
        return ApiResponseClass::sendResponse($result, 'User logged in successfully');

    }
    public function logout(Request $request)
    {
        PersonalAccessToken::findToken($request->bearerToken())->delete();
        return ApiResponseClass::sendResponse(null, 'Logged out successfully');
    }
}
