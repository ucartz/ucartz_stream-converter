<?php

namespace RadioStream\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use RadioStream\User;
use RadioStream\SoftwareManagement;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $role = Auth::user()->role;
        if($role =="admin"){
            $all_users = User::paginate(10);
            return view('user-management.userList',['all_users' => $all_users]);
        }else{
            return redirect('/');
        }
    }
    public function addUser(){
        //$users = User::where('userId','=',$user_id)->first();
        return view('user-management.addUser');//,['users'=>$users]);
    }
    public function insertUser(Request $request){
        $user = new User();//::find($user_id);
        $validator = Validator::make($request->all(), [ 
                
                'name' => 'required|string|max:255',
                'email' => 'required|string|max:255|email|unique:users',
                'password' => 'required|string|min:6|confirmed', 
                'mobile' => 'required|numeric',
                'address' => 'required|string',
                'country' => 'required|string',
                'photo' => 'sometimes|mimes:jpeg,jpg,png,gif,webp|max:100000',
                'status' => 'required',
            ]);
        $errors = $validator->errors();
           if ($validator->fails()) { 
                return redirect()->back()->withErrors($errors);           
            }else{
                $input = $request->all(); 
                if(Input :: hasfile('photo')){
                    $file = Input::file('photo');
                    $filename = time(). '-' . $file->getClientOriginalName();
                    $file = $file->move(public_path().'/uploads/users/', $filename);
                    $url=  URL::to("/").'/uploads/users/'.$filename;
                }else{
                    $url= '';
                }

                 $user['name']= $input['name'];
                $user['email']= $input['email'];
                $user['password']= Hash::make($input['password']);
                $user['role']= 'user';
                $user['mobile']= $input['mobile'];
                $user['address']= $input['address'];
                $user['country']= $input['country'];
                $user['photo']= $url;
                $user['status']= $input['status'];
                $updated_user = $user->save();
                if($updated_user){
                    $role = Auth::user()->role;
                    if($role =="admin"){
                        return redirect()->route('user-management');
                        return redirect('user-management')->with('response','User added successfully');  
                    }else{
                        return redirect()->route('/');
                    }
                   
                }else{
                    return redirect('user-management')->with('response','Failed to add a User');  
                    
                }
            }
    }
    public function viewUser($user_id){
        $users = User::where('userId','=',$user_id)->first();
        return view('user-management.viewUser',[
                                    'users'=>$users
                                    ]);
    }
    public function editUser($user_id){
        $auth_user_id = Auth::user()->userId;
        $role = Auth::user()->role;
        $users = User::where('userId','=',$user_id)->first();
        return view('user-management.editUser',[
                                    'users'=>$users,
                                    'auth_user_id'=>$auth_user_id,
                                    'user_id'=>$user_id,
                                    'role'=>$role 
                                    ]);
    }
    public function updateUser($user_id, Request $request)
    {
        $auth_user_id = Auth::user()->userId;
        //$user = User::where('userId','=',$user_id)->first();
        $user = User::find($user_id);
        $user_count = User::all()->count();
         $role = Auth::user()->role;
        //if($user['photo'] == ""){
        if($auth_user_id == $user_id){
            $passwordCheck = $request->input('password') != null;
            if($passwordCheck){
                $validator = Validator::make($request->all(), [ 
                    
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|max:255|email|unique:users,email,'.$user_id.',userId',
                    'password' => 'required|string|min:6|confirmed', 
                    'mobile' => 'required|numeric',
                    'address' => 'required|string',
                    'country' => 'required|string',
                    'photo' => 'sometimes|mimes:jpeg,jpg,png,gif,webp|max:100000',
                ]);
            }else{
                $validator = Validator::make($request->all(), [ 
                    
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|max:255|email|unique:users,email,'.$user_id.',userId',
                   // 'password' => 'required|string|min:6|confirmed', 
                    'mobile' => 'required|numeric',
                    'address' => 'required|string',
                    'country' => 'required|string',
                    'photo' => 'sometimes|mimes:jpeg,jpg,png,gif,webp|max:100000',
                ]);
            }
            
        }else{
            $validator = Validator::make($request->all(), [ 
                    
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|max:255|email|unique:users,email,'.$user_id.',userId',
                   // 'password' => 'required|string|min:6|confirmed', 
                    'mobile' => 'required|numeric',
                    'address' => 'required|string',
                    'country' => 'required|string',
                    'photo' => 'sometimes|mimes:jpeg,jpg,png,gif,webp|max:100000',
                ]);
        }
        $errors = $validator->errors();
           if ($validator->fails()) { 
                return redirect()->back()->withErrors($errors);           
            }else{
                $input = $request->all(); 
                if(Input :: hasfile('photo')){
                    $file = Input::file('photo');
                    $filename = time(). '-' . $file->getClientOriginalName();
                    $file = $file->move(public_path().'/uploads/users/', $filename);
                    $url=  URL::to("/").'/public/uploads/users/'.$filename;
                }else{
                    if($user['photo'] == ""){
                        $url= '';
                    }else{
                        $url= $user['photo'];
                    }
                }

                 $user['name']= $input['name'];
                $user['email']= $input['email'];
                if($auth_user_id == $user_id){
                    if($passwordCheck){
                        $user['password']= Hash::make($input['password']);
                    }
                }
                //$user['password']= Hash::make($input['password']);
                /*if($role == 'admin' &&  $auth_user_id == $user_id){
                    $user['role'] = "admin";
                }else{
                    $user['role'] = "user";
                }*/
                $user['mobile']= $input['mobile'];
                $user['address']= $input['address'];
                $user['country']= $input['country'];
                $user['photo']= $url;
                $user['status']= $input['status'];
                $updated_user = $user->save();
                if($updated_user){
                   
                    if($role =="admin"){
                        return redirect('user-management')->with('response','User profile updated successfully');  
                    }else{
                        return redirect()->route('home')->with('response','User profile updated successfully');
                    }
                   
                }else{
                    return redirect('user-management')->with('response','Failed to update User Profile');  
                    
                }
            }
        /* */
    }
    
    public function deleteUser($user_id){
        User::where('userId', $user_id)
            ->delete();
        return redirect('user-management')->with('response','User deleted successfully');  
    }

    
    public function systemRequirement(){
        return view('system_requirement');
    }

    public function testAllowUrlFopen(){
        if( ini_get('allow_url_fopen') ) 
        {
             return redirect('system-requirement')->with('response','allow_url_fopen is ON in your server.');    
        } else{
            return redirect('system-requirement')->with('response','allow_url_fopen is OFF in your server.');    
        }
    }
    public function testCurl(){
        $has_cURL = function_exists("curl_init");
        if($has_cURL!=1 || empty(curl_version())){
            return redirect('system-requirement')->with('response','CURL is not enabled in your server');  
        }else{
            return redirect('system-requirement')->with('response','CURL is enabled in your server.');  
        }
        
    }
    public function softwareManagement(){
        return view('software_management');
    }
    public function saveSoftwareInfo(Request $request){
        $sofware_info = new SoftwareManagement();//::find($user_id);

        $all_sofware_info = SoftwareManagement::where('status','=','1')->get();
        $validator = Validator::make($request->all(), [ 
                
                'softwarename' => 'required|string|max:255',
                'logo' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            ]);
        $errors = $validator->errors();
           if ($validator->fails()) { 
                return redirect()->back()->withErrors($errors);           
            }else{
                $input = $request->all(); 
                if(Input :: hasfile('logo')){
                    $file = Input::file('logo');
                    $filename = time(). '-' . $file->getClientOriginalName();
                    $file = $file->move(public_path().'/uploads/logo/', $filename);
                    $url=  URL::to("/").'/uploads/logo/'.$filename;
                }else{
                    $url= '';
                }

                 $sofware_info['softwarename']= $input['softwarename'];
                
                $sofware_info['logo']= $url;
                $sofware_info['status']= 1;
                
                foreach ($all_sofware_info as $key => $each_sofware_info) {
                   $each_sofware_info['status'] = 0;
                    $each_sofware_info->save();
                }
                $updated_user = $sofware_info->save();
                if($updated_user){
                    $role = Auth::user()->role;
                    if($role =="admin"){
                        //return redirect()->route('user-management');
                        return redirect('software-management')->with('response','Software Name and Logo  added successfully');  
                    }else{
                        return redirect()->route('/');
                    }
                   
                }else{
                    return redirect('software-management')->with('response','Failed to add a software info');  
                    
                }
            }
    }

    public function about(){
        return view('software-setup.about');
    }
    public function help(){
        return view('software-setup.help');
    }

}
