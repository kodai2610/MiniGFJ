<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;    
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use App\Models\Prefecture;

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo() {
        session()->flash('msg_signup', '✔︎ 登録しました');
        return RouteServiceProvider::HOME;
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:users');
    }

    // Guardの認証方法を指定
    protected function guard()
    {
        return Auth::guard('users');
    }

    // 新規登録画面
    public function showRegistrationForm()
    {   
        $prefectures = Prefecture::all();
        return view('user.auth.register', compact('prefectures'));
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
            'ruby' => ['required', 'string', 'max:255'],
            'tell' => ['required',],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'birth_day' => ['required'],
            'gender' => ['required'],
            'prefecture_id' => ['required'],
            'city_id' => ['required'],
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
            'ruby' => $data['ruby'],
            'birth_day' => $data['birth_day'],
            'gender' => $data['gender'],
            'prefecture_id' => $data['prefecture_id'],
            'city_id' => $data['city_id'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'tell' => $data['tell']
        ]);
    }
}
