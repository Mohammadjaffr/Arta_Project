<?php

namespace App\Http\Controllers;

use App\Mail\OtpMail;
use App\Models\image;
use App\Models\listing;
use App\Models\User;
use App\Repositories\CategoryRepository;
use App\Repositories\ListingRepository;
use App\Repositories\RegionRepository;
use App\Repositories\UserRepository;
use App\Services\OtpService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Torann\GeoIP\GeoIP;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        private CategoryRepository $CategoryRepository,
        private RegionRepository $RegionRepository,
        private ListingRepository $ListingRepository,
        private UserRepository $userRepository,
        private OtpService $otpService,
    )
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
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = uniqid('', true) . '.' . $extension;
            $filePath = $image->storeAs('user_images', $filename, 'public');
            $user->image = 'storage/' . $filePath;
        } else {
            $user->image = null;
        }
        $user->location()->updateOrCreate(
            ['user_id' => $user->id],
            ['latitude' => $request->latitude, 'longitude' => $request->longitude]
        );
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
        try {

            $validator = Validator::make($request->all(), [
                'old_password' => 'required',
                'password' => 'required|min:8|confirmed',
            ], [
                'old_password.required' => 'كلمة المرور القديمة مطلوبة',
                'password.required' => 'كلمة المرور الجديدة مطلوبة',
                'password.min' => 'كلمة المرور يجب أن تكون على الأقل 8 أحرف',
                'password.confirmed' => 'تأكيد كلمة المرور غير متطابق',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $data = [
                'old_password' => $request->old_password,
                'password' => $request->password,
            ];

            $this->userRepository->changePassword($data, Auth::user());
            return redirect('/home')->with('success', 'تم تغيير كلمة المرور بنجاح');
        } catch (\Exception $e) {
            return redirect()->route('OTP')->with('error', 'فشل في تغيير المرور: ' . $e->getMessage());
        }
    }
    public function resendOTP(Request $request) {

        $validator = Validator::make($request->all(), [
                     'email' => ['required','email', Rule::exists('users', 'email'),
            ],
        ], [
            'email.required' => 'يجب إدخال البريد الإلكتروني',
            'email.email' => 'يجب إدخال بريد إلكتروني صحيح',
            'email.exists' => 'البريد الإلكتروني غير مسجل في النظام',
        ]);

        if ($validator->fails()) {
            return redirect()->route('OTP')->withErrors($validator);
        }

        try {
            $fields=$request->only(['email']);
            $otp = $this->otpService->generateOTP($fields['email']);
            Mail::to($fields['email'])->send(new OtpMail($otp));
            return redirect()->route('OTP')->with('success', 'تم إرسال رمز التحقق إلى بريدك الإلكتروني');        }
        catch (\Exception $e) {
            return redirect()->route('OTP')->with('error', 'فشل إرسال رمز التحقق: ' . $e->getMessage());
        }
    }
    public function resendOTP_Register(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => ['required','email', Rule::exists('users', 'email'),
            ],
        ], [
            'email.required' => 'يجب إدخال البريد الإلكتروني',
            'email.email' => 'يجب إدخال بريد إلكتروني صحيح',
            'email.exists' => 'البريد الإلكتروني غير مسجل في النظام',
        ]);

        if ($validator->fails()) {
            return redirect()->route('OTP_Register_Email')->withErrors($validator);
        }

        try {
            $fields=$request->only(['email']);
            $otp = $this->otpService->generateOTP($fields['email']);
            Mail::to($fields['email'])->send(new OtpMail($otp));
            return redirect()->route('VerifyOtpRegister')->with('success', 'تم إرسال رمز التحقق إلى بريدك الإلكتروني');        }
        catch (\Exception $e) {
            return redirect()->route('VerifyOtpRegister')->with('error', 'فشل إرسال رمز التحقق: ' . $e->getMessage());
        }
    }
    public function OTP()
    {
        return view('OTP');
    } public function VerifyOtpRegister()
    {
        return view('VerifyOtpRegister');
    }
    public function OTP_Register_Email()
    {
        return view('OTP_Register_Email');
    }
    public function change_password_login()
    {
        return view('change_password_login');
    }
    public function verifyOtpAndLogin(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => ['required','email'],
            'otp' => ['required','numeric'],
        ],[
            'email.required'=>'يجب كتابة البريد الإلكتروني',
            'email.email'=>'يجب ان يكون المدخل بريد الإلكتروني',
            'otp.required'=>'يجب كتابة رمز التحقق',
            'otp.numeric'=>'يجب ان يكون رمز التحقق رقما',
        ]);

        if ($validator->fails()) {
            return redirect()->route('OTP')->withErrors($validator);
        }

        $fields = $request->only(['email', 'otp']);

        // Verify the provided OTP using the OTP service
        if($this->otpService->verifyOTP($fields['email'], $fields['otp'])) {
            $user = $this->userRepository->findByEmail($fields['email']);

            // Update the user record to mark email as verified and set the last login time
            $this->userRepository->update(['email_verified' => true,'last_login' => now()
            ], $user->id);

            Auth::login($user);

            // Create a new authentication token for the user
            $token = $user->createToken($user->username . '-AuthToken')->plainTextToken;

            return redirect()->route('change_password_login')->with([
                'token' => $token,
                'user' => $user,
                'success' => 'تم تسجيل المستخدم بنجاح'
            ]);
        }

        // Return with error if OTP verification fails
        return redirect()->route('OTP')->withErrors([
            'otp' => 'رمز التحقق غير صالح او منتهي الصلاحية'
        ]);
    }
    public function VerifyOtpAndRegisterLogin(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => ['required','email'],
            'otp' => ['required','numeric'],
        ],[
            'email.required'=>'يجب كتابة البريد الإلكتروني',
            'email.email'=>'يجب ان يكون المدخل بريد الإلكتروني',
            'otp.required'=>'يجب كتابة رمز التحقق',
            'otp.numeric'=>'يجب ان يكون رمز التحقق رقما',
        ]);

        if ($validator->fails()) {
            return redirect()->route('VerifyOtpRegister')->withErrors($validator);
        }

        $fields = $request->only(['email', 'otp']);

        // Verify the provided OTP using the OTP service
        if($this->otpService->verifyOTP($fields['email'], $fields['otp'])) {
            $user = $this->userRepository->findByEmail($fields['email']);

            // Update the user record to mark email as verified and set the last login time
            $this->userRepository->update(['email_verified' => true,'last_login' => now()
            ], $user->id);

            Auth::login($user);

            // Create a new authentication token for the user
            $token = $user->createToken($user->username . '-AuthToken')->plainTextToken;

            return redirect()->route('home')->with([
                'token' => $token,
                'user' => $user,
                'success' => 'تم تسجيل المستخدم بنجاح'
            ]);
        }

        // Return with error if OTP verification fails
        return redirect()->route('OTP_Register_Email')->withErrors([
            'otp' => 'رمز التحقق غير صالح او منتهي الصلاحية'
        ]);
    }
}
