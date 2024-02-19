<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'phone' => ['required', 'string', 'min:9', 'max:9', 'regex:/^7[73810][0-9]{7}$/'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'bio' => ['nullable', 'string', 'max:500'],
            'terms' => ['accepted'],
        ],
        [
            'name.required' => 'قم بأدخال الأسم',
            'name.string' => 'الأسم يجب أن يكون نصا',
            'name.max' => 'الأسم المدخل طويل جدا قم بادخال اسم ب256 حرف كحد أقصى',
            'email.required' => 'قم بادخال الأيميل',
            'email.string' => 'يجب أن يكون نص ليس أرقام',
            'email.email' => 'هذا ليست صياغة إيميل صحيحة',
            'email.max' => 'البريد الإلكتروني طويل جدًا، يجب أن يحتوي على 255 حرفًا كحد أقصى',
            'phone.required' => 'قم بإدخال رقم الهاتف',
            'phone.string' => 'يجب أن يكون رقم الهاتف نصاً',
            'phone.min' => 'رقم الهاتف يجب أن يكون على الأقل 9 أرقام',
            'phone.max' => 'رقم الهاتف يجب أن لا يتجاوز 9 أرقام',
            'phone.regex' => 'الرجاء إدخال رقم هاتف سعودي صحيح',
            'password.required' => 'الرجاء إدخال كلمة مرور',
            'password.string' => 'يجب أن تكون كلمة المرور نصًا',
            'password.min' => 'يجب أن تحتوي كلمة المرور على الأقل 8 أحرف',
            'password.confirmed' => 'تأكيد كلمة المرور غير متطابق',
            'bio.string' => 'يجب أن يكون السيرة الذاتية نصًا',
            'bio.max' => 'السيرة الذاتية يجب ألا تتجاوز 500 حرف',
            'terms.required' => 'يجب قبول الشروط والأحكام',
            'terms.accepted' => 'يجب قبول الشروط والأحكام',
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'bio' => $data['bio'] ?? null,
        ]);
    }
}
