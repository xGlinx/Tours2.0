<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
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
    protected $redirectTo = "";

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
            'name' =>          ['required', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'last-name' =>     ['required', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'dni' =>           ['numeric', 'min:20000000', 'max:99999999'],
            'direction' =>     ['string', 'max:255'],
            'phone' =>         ['numeric', 'min:900000000', 'max:999999999'],
            'email' =>         ['required', 'string', 'email', 'max:255', 'unique:users'],
            'date-birthday' => ['required', 'date'],
            'password' =>      ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' =>           $data['name'],
            'last-name' =>      $data['last-name'],
            'dni' =>            $data['dni'],
            'direction' =>      $data['direction'],
            'phone' =>          $data['phone'],
            'email' =>          $data['email'],
            'date-birthday' =>   $data['date-birthday'],
            'password' =>       Hash::make($data['password']),
        ]);
    }
}
