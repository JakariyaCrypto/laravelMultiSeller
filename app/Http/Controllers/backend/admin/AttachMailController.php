<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

use Mail;
class AttachMailController extends Controller
{
    public function index()
    {
    	return view('backend/admin/mail/mail_form');
    }

    public function storeAndSend(Request $request)
    {
    	// return $request->post('title');

    	$file = $request->file('file');
    	$fileExt = $file->getClientOriginalExtension();
    	$rand = rand(111111111,99999999);
    	$fileName = 'file'.$rand.time().'.'.$fileExt;
    	$file->move('upload/mail/',$fileName);
    	$store = 'upload/mail/'.$fileName;


    	 $data["title"] = $request->post('title');
        $data["from"] = "demo.com";
        $data["body"] = "This is Demo Mail Attechment Pdf File";
    	// print_r($data);exit;


        $attechfiles = $store;

        Mail::send('backend.admin.mail.mail_template', $data, function($message)use($data, $attechfiles) {
            $message->to($data["title"])
                        ->subject($data["title"]);
           $message->attach($attechfiles);
        });

        return redirect()->route('main.index')->with('message','Mail sent successfully Check Email.');



    }


           
}
