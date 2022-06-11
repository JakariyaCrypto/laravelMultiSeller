<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
// crate custom function
    protected function redirectTo()
    {
        if(Auth()->user()->role == 'admin'){
            return route('admin.dashboard');
        }elseif (Auth()->user()->role == 'vendor') {
            return route('vendor.dashboard');
        }elseif (Auth()->user()->role == 'customer') {
            return route('customer.dashboard');
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function credentials($request)
    // {
    //     return ['email'=>$request->email,'password'=>$request->password,'role'=>'admin','status'=>'active'];
    // }

    // custom login function overwrite the main login function
    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //check user
        if (auth()->attempt(array('email'=>$input['email'],'password'=> $input['password']))) {
            
            if (Auth()->user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            }elseif (Auth()->user()->role == 'vendor') {
                return redirect()->route('vendor.dashboard');
            }elseif (Auth()->user()->role == 'customer') {
                return redirect()->route('customer.dashboard');
            }

        }else{
            return redirect()->route('login')->with('error','E-mail & Password are Wrong !');
        }
    }

}
