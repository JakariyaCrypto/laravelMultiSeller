<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
class LoginController extends Controller
{
    //login form view

    public function loginForm(){
    	return view('auth/admin/login');
    }


    // admin login
    public function adminLogin(Request $request){
        $request->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'Email is not found our record !'
        ]
        );

        $check = $request->only('email','password');
		if(Auth::guard('admin')->attempt($check)){
			return redirect()->route('admin.dashboard')->with('success','Login Successfully');
		}else{
			return redirect()->route('admin.login.form')->with('warning','E-mail & Password are Wrong !');
		}

	}


public function destroy(Request $request)
{
    Auth::guard('admin')->logout();
   
    return redirect()->route('frontend');
}


}
