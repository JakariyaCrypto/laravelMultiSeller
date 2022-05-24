<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\admin\mobileSMS;
use Nexmo;
class MobileSMSController extends Controller
{
    public function index()
    {
    	return view('backend/admin/mobileSMS/mobile_sms_form');
    }

    public function store(Request $request)
    {
    	// return $request->post('number');
    	$rand = rand(111111,999999);
    	// return $rand;
    	$data = [
    		'number'=> $request->number,
    		'code' => $rand,
    	];

    	$store = mobileSMS::create($data);

    	if ($store) {
    		$nexmo = app('Nexmo\Client');

			$nexmo->message()->send([
			    'to'   => '+880'.(int) $request->post('number'),
			    'from' => 'developer jakariya',
			    'text' => 'Your verify code:'.$rand,
			]);
			return redirect()->route('mobile.code');
    	}
    	

		


    }

    public function verifyCode()
    {
    	return view('backend/admin/mobileSMS/verify_code_form');
    }

    public function verify(Request $request)
    {
    	$check = mobileSMS::where('code',$request->code)->first();

    	if ($check) {
    		$check->code = "";
    		$check->save();
    		return redirect()->route('admin');
    	}else{
    		return redirect()->route('mobile.code')->with('message','verification code is invalid !');
    	}
    }

}
