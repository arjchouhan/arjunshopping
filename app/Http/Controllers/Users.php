<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Users extends Controller
{
    function registration(){
        return view("registration");
    }

    function user_login(Request $request){
        dd($request);
    }

    function user_register(Request $request){
       
        $fullname = $request->input('fullname');
        $email = $request->input('email');
        $username = $request->input('username');
        $password = $request->input('password');
        $data=array('fullname'=>$fullname,"email"=>$email,"username"=>$username,"password"=>$password);
        DB::table('users')->insert($data);
        echo "Record inserted successfully.<br/>";

    }
}
