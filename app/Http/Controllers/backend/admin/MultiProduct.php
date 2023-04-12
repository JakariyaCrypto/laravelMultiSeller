<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\admin\TempImage;
use Illuminate\Support\Facades\Auth;
use DB;
use File;
class MultiProduct extends Controller
{
    public function dropZoneView(){
    	return view('backend/admin/file_pond/dropzone');
    }


    public function TempImgStore(Request $request){

    	$userId = Auth::id();
    	$image = $request->file('file');
	    $imageName = $image->getClientOriginalName();

    	$check = DB::table('temp_images')->where(['file' => $imageName])->get();

    	if (count($check) >= 1) {
    		return response()->json(['status'=>true,'msg'=>'image is exit.Try unique image']);
    	}else{
    		
	        $image->move('upload/temp/',$imageName);
	        
	        $imageUpload = new TempImage();
	        $imageUpload->file = $imageName;
	        $imageUpload->user_id = $userId;
	        $imageUpload->save();
	        return response()->json(['success'=>$imageName]);
    	}
    	

    }


	public function TempImgDestroy(Request $request){

		$userId = Auth::id();

        $filename =  $request->get('filename');
        $path=public_path().'/upload/temp/'.$filename;
        
        if (file_exists($path)) {
            unlink($path);
        }

        TempImage::where(['file'=>$filename,'user_id'=>$userId])->delete();
        

        return $filename;  
    }

}
