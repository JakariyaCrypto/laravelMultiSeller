<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\admin\Size;
use DB;
use Str;
class SizeController extends Controller
{
   public function index(){


	   	$result['sizes'] = Size::latest()->get();
	   	return view('backend/admin/size/size-index',$result);

   }

  public function create()
    {
        return view('backend/admin/size/create-size');
    }


    public function store(Request $request){
      $this->validate($request,[
        'size' => 'required|string|max:250|unique:sizes,size'
      ]);

      $slug = Str::slug($request->input('size'));

      $model = Size::create([
        'size' => $request->size,
      ]);

      if ($model) {
        return redirect()->route('size.index')->with('success','Size Added successfull !');
      }else{
        return redirect()->route('size.index')->with('warning','Somethin Wrong !');
      }
    }

    public function edit($id){
      $edit = Size::find($id);
      return view('backend/admin/size/size-edit',compact('edit'));
    }


    public function update(Request $request,$id)
      {
        $this->validate($request,[
        'size' => 'required|string|max:250|unique:sizes,size,'.$id,
      ]);
        $model = Size::find($id);

        $slug = Str::slug($request->input('size'));
        if ($model) {
          $model->update([
            'size' => $request->size,
          ]);

        return redirect()->route('size.index')->with('success','Size Updated successfull !');
        
        }else{
          return redirect()->route('size.index')->with('warning','Somethin Wrong !');
        }
      }

   public function sizeStatus(Request $request){
   	  if($request->mode == 'true')
        {
           DB::table('sizes')->where(['id'=>$request->id])->update(['status'=>'active']);
          
        }else{
             DB::table('sizes')->where(['id'=>$request->id])->update(['status'=>'inactive']);
             
        }

        return response()->json(['msg'=>'status successfullly Inactive','status'=>true]);

   }


   public function destroy(Request $request)
    {

        $del = Size::find($request->size_id);

        if ($del) {
            $del->delete();
            return redirect()->route('size.index')->with('warning','Size Deleted Successfull');
        }else{
            return redirect()->with('warning','Something Wrong.Try again');
        }
    }



}
