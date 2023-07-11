<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Validator;
use Illuminate\Support\Facades\Hash;
class Users extends Controller
{

    // authantication users

    function index(){
        return view("login");
    }
    function login_page(){
        return view("login");
    }
    function logout_page(){
        if(session()->has('username')){
            session()->pull('username');
        }
        return redirect('login_page');
    }
    function registration(){
        return view("registration");
    }

    function user_login(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');

        $user = DB::table('users')->where('username', $username)->first();

        if(!empty($user)){
          $user_pass = $user->password;
            if (Hash::check($password , $user_pass)) {
                $request->session()->put('username', $user->username);
                $request->session()->put('fullname', $user->fullname);

                return redirect('dashboard');
            }else{
                $errors = ['Invalid password'];
                return redirect()->back()->withErrors($errors);
            }
        }else{
            $errors = ['Invalid User'];
            return redirect()->back()->withErrors($errors);
        }
    }

    function user_register(Request $request){
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|alpha',
            'password' => 'required|min:8|max:16',
            'mobile_no' => 'required|numeric|digits:10',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $user = new User();
            $user->fullname = $request->input('fullname');
            $user->email = $request->input('email');
            $user->username = $request->input('username');
            $user->password = Hash::make($request->input('password'));
            $user->mobile_no =  $request->input('mobile_no');
            $user->save();
            Session::flash('success', 'User Registration has been  successfully.');
            return redirect()->back();
        }

    }

    // User section

    function adduser(){
        return view("adduser");
    }
    function edituser(Request $request,$id){
        $userData = User::find($id);
        return view("edituser", compact('userData'));
    }

    function insert_newuser(Request $request){

         $validator = Validator::make($request->all(), [
            'fullname' => 'required|alpha',
            'password' => 'required|min:8|max:16',
            'mobile_no' => 'required|numeric|digits:10',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $user = new User();
            $user->fullname = $request->input('fullname');
            $user->email = $request->input('email');
            $user->username = $request->input('username');
            $user->mobile_no = $request->input('mobile_no');
            $user->address = $request->input('address');
            $user->city =  $request->input('city');
            $user->password = Hash::make($request->input('password'));
            $user->state =  $request->input('state');
            $user->country =  $request->input('country');
            $user->save();
            Session::flash('success', 'User Insert has been  successfully.');
            return redirect('userlist');
        }
    }

    function update_user(Request $request,$id){

        $validator = Validator::make($request->all(), [
           'username' => 'required',
           'mobile_no' => 'required|numeric|digits:10',
       ]);

       if ($validator->fails()) {
           return redirect()->back()
                       ->withErrors($validator)
                       ->withInput();
       }else{
           $user = User::find($id);
           $user->fullname = $request->input('fullname');
           $user->email = $request->input('email');
           $user->username = $request->input('username');
           $user->mobile_no = $request->input('mobile_no');
           $user->address = $request->input('address');
           $user->city =  $request->input('city');
           $user->state =  $request->input('state');
           $user->country =  $request->input('country');
           $user->update();

           return redirect('userlist')->with('success','User updated successfully');
       }
   }

    function userlist(){
        $users = User::all()->where('is_deleted','N');

        return view("userlist", compact('users'));
    }

    function deleteuser(Request $request, $id){
        $userData = User::find($id);
        $userData->is_deleted = 'Y';
        $userData->save();
        return redirect('userlist')->with('success','User deleted successfully');
    }

}
