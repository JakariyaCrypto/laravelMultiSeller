<?php

namespace App\Http\Controllers\backend\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    //seller login form

    public function LoginForm(){
    	return view('auth/seller/login');
    }


    //seller login
    public function sellerLogin(Request $request){
        $request->validate([
            'email'=>'required|email|exists:sellers,email',
            'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'Email is not found our record !'
        ]
        );

        $check = $request->only('email','password');
    	if (Auth::guard('seller')->attempt(['email'=>$request->email,'password'=>$request->password])) {
    		return redirect()->route('seller.dashboard')->with('success','Login Successfull !');
    	}else{
    		return redirect()->back()->with('warning','E-mail & Password are Wrong !');
    	}
    }


    // seller logout
    public function logout(){
        Auth::guard('seller')->logout();
        return redirect()->route('frontend');
    }
}
