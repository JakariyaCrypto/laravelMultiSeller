<?php

namespace App\Http\Controllers\backend\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
    	return view('backend/vendor/dashboard/dashboard');
    }



    public function profile(){
    	return "this is vendor profile";
    }



    public function setting(){
    	return "this is vendor setting";
    }
}
