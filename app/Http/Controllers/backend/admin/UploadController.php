<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\admin\FileUpload;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    public function index(){
    	return view('backend/admin/file_pond/create');
    }


    public function store(Request $request){

    	if ($filesUp=$request->file('file')) {
    		
    		foreach($filesUp as $file){
                // generate unique file and folder name
                $fileExt = $file->getClientOriginalName();
                $fileName = time().rand(111111,999999).$fileExt;
                $folder = uniqid() . '-' . now()->timestamp;
                $file->move('upload/files/',$fileName);
                $storeFile = 'upload/files/'.$fileName;
               // store db to temporary
                $store = FileUpload::create([
                    'user_id' => Auth::id(),
                    'file'=> $storeFile,
                    'folder'=> $folder
                   ]);
               
            }

    		if ($store) {
                return "success";
            }


    	}

    }



}
