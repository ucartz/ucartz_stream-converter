<?php

namespace RadioStream\Http\Controllers\Auth;

use RadioStream\User;
use RadioStream\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'mobile' => ['required', 'numeric'],
            'address' => ['required', 'string'],
            'country' => ['required', 'string'],
            //'photo' => ['required','mimes:jpeg,jpg,png,gif','max:10000'],//mimes:jpeg,jpg,png,gif|required|max:10000
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \RadioStream\User
     */
    protected function create(array $data)
    {
        $user_count = User::all()->count();
        //if(empty($alluser))
        if($user_count == 0){
            $role = "admin";
            $status = 1;
        }else{
            $role = "user";
            $status = 0;
        }
        $url= '';

        if(Input :: hasfile('photo')){
            $file = Input::file('photo');
            $filename = time(). '-' . $file->getClientOriginalName();
            $file = $file->move(public_path().'/uploads/users/', $filename);
            $url=  URL::to("/").'/uploads/users/'.$filename;
        }else{
            $url= '';
        }
        //$photo = $url;

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $role,
            'mobile' => $data['mobile'],
            'address' => $data['address'],
            'country' => $data['country'],
            'photo'    => $url,//$data['country'],
            'status'    => $status,
        ]);
    }
}
