<?php

namespace App\Http\Controllers\backend\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
    	return view('backend/seller/dashboard');
    }
}
