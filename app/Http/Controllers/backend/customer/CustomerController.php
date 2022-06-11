<?php

namespace App\Http\Controllers\backend\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
    	return view('backend/customer/dashboard/dashboard');
    }



    public function profile(){
    	return "this is customer profile";
    }



    public function setting(){
    	return "this is customer setting";
    }
}
