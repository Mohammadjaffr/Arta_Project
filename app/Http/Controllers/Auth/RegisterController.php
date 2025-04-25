<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Repositories\UserRepository;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/OTP_Register_Email';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(private UserRepository $UserRepository)
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth-form');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'
            ],
            'whatsapp_number' => ['required', 'string', 'max:16', 'regex:/^[0-9]+$/'],
            'contact_number' => ['required', 'string', 'max:16', 'regex:/^[0-9]+$/']
        ], [
            'name.required' => 'حقل الاسم مطلوب',
            'name.string' => 'يجب أن يكون الاسم نصًا',
            'name.max' => 'يجب ألا يتجاوز الاسم 255 حرفًا',
            'email.required' => 'حقل البريد الإلكتروني مطلوب',
            'email.email' => 'يجب إدخال بريد إلكتروني صالح',
            'email.unique' => 'هذا البريد الإلكتروني مستخدم بالفعل',
            'password.required' => 'حقل كلمة المرور مطلوب',
            'password.min' => 'يجب أن تحتوي كلمة المرور على 8 أحرف على الأقل',
            'password.confirmed' => 'تأكيد كلمة المرور غير متطابق',
            'password.regex' => 'يجب أن تحتوي كلمة المرور على حرف كبير، حرف صغير، رقم، وحرف خاص',
            'whatsapp_number.required' => 'حقل رقم الواتساب مطلوب',
            'whatsapp_number.regex' => 'يجب أن يحتوي رقم الواتساب على أرقام فقط',
            'whatsapp_number.max' => 'يجب ألا يتجاوز رقم الواتساب 16 رقما',
            'contact_number.required' => 'حقل رقم الاتصال مطلوب',
            'contact_number.regex' => 'يجب أن يحتوي رقم الاتصال على أرقام فقط',
            'contact_number.max' => 'يجب ألا يتجاوز رقم الاتصال 16 رقما',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return $this->UserRepository->store([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'whatsapp_number' => $data['whatsapp_number'],
            'contact_number' => $data['contact_number']
        ]);
    }
    protected function registered($request, $user)
    {
        return redirect($this->redirectPath())
            ->with('success', 'تم تسجيل حسابك بنجاح! يمكنك الآن تسجيل الدخول.');
    }
}
