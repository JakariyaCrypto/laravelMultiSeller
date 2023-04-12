<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\admin\Color;
use DB;
use Str;
class ColorController extends Controller
{
    public function index(){


	   	$result['colors'] = Color::latest()->get();
	   	return view('backend/admin/color/color-index',$result);

   }

  public function create()
    {
        return view('backend/admin/color/color-create');
    }


    public function store(Request $request){
      $this->validate($request,[
        'color' => 'required|string|max:250|unique:colors,color',
      ]);
      $model = Color::create([
        'color' => $request->color,
      ]);

      if ($model) {
        return redirect()->route('color.index')->with('success','Color Added successfull !');
      }else{
        return redirect()->route('color.index')->with('warning','Somethin Wrong !');
      }
    }

    public function edit($id){

      $edit = Color::find($id);
      return view('backend/admin/color/edit-color',compact('edit'));
      
    }


    public function update(Request $request,$id)
      {
        $request->validate([
          'color' => 'required|string|max:250|unique:colors,color,'.$id,
        ]);

        $model = Color::find($id);

        if ($model) {
          $model->update([
            'color' => $request->color,
          ]);

        return redirect()->route('color.index')->with('success','Color Updated successfull !');
        
        }else{
          return redirect()->route('color.index')->with('warning','Somethin Wrong !');
        }
      }

   public function colorStatus(Request $request){
   	  if($request->mode == 'true')
        {
           DB::table('colors')->where(['id'=>$request->id])->update(['status'=>'active']);
          
        }else{
             DB::table('colors')->where(['id'=>$request->id])->update(['status'=>'inactive']);
             
        }

        return response()->json(['msg'=>'status successfullly Inactive','status'=>true]);

   }


   public function destroy(Request $request)
    {

        $del = Color::find($request->color_id);

        if ($del) {
            $del->delete();
            return redirect()->route('color.index')->with('warning','Color Deleted Successfull');
        }else{
            return redirect()->with('warning','Something Wrong.Try again');
        }
    }

}
