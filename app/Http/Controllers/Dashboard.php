<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
class Dashboard extends Controller
{
    function index(){
        
        return view("layouts.main");
    }

    function userProfile(Request $request){
        $username = $request->session()->get('username');
        $userData = User::where('username', $username)->first();
        return view("userProfile", compact('userData'));
    }
}
