<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Role;


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
     * Where to redirect users after registration.*
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.*
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request. *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => 'required|string|max:55',
            'email' => 'required|string|email|max:155|unique:users',
            'address' => 'required|string|max:205',
            'zipcode' => 'required|string|max:25',
            'state' => 'required|string|max:2',
            'phone' => 'required|numeric',
            'password' => 'required|string|min:6|confirmed',
            'consent' => 'required',
        ]);
    }

    /*
     * Medium RoleAuth_201
     */
    protected function create(array $data)
    {
        try {
             $user = User::create([
                'name'     => $data['name'],
                'email'    => $data['email'],
                'address'    => $data['address'],
                'zipcode'    => $data['zipcode'],
                'state'    => $data['state'],
                'phone'    => $data['phone'],
                'password' => bcrypt($data['password']),
                'consent' => $data['consent'],
                'status' => '0',
                'ip' => \Request::ip(),
            ]);
          //throw new Exception($e);
        } catch (Exception $e) {
            //\Debugbar::info($user);
            \Debugbar::addException('Another message', $e);
        }

        // Attached roles for all new user
        $user ->roles() ->attach(Role::where('name', 'student')->first());

        return $user;
    }
}


