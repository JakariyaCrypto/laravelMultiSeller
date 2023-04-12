<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\admin\Coupon;
use DB;
class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){


        $result['coupons'] = Coupon::latest()->get();
        return view('backend/admin/coupon/coupon-index',$result);

   }

  public function create()
    {
        return view('backend/admin/coupon/coupon-create');
    }


    public function store(Request $request){
      $this->validate($request,[
        'code' => 'required',
        'type' => 'required|max:250',
        'value' => 'required|max:250'
      ]);

      $model = Coupon::create([
        'code' => $request->code,
        'type' => $request->type,
        'value' => $request->value,
      ]);

      if ($model) {
        return redirect()->route('coupon.index')->with('success','Coupon Added successfull !');
      }else{
        return redirect()->route('coupon.index')->with('warning','Somethin Wrong !');
      }
    }

    public function edit($id){

      $edit = Coupon::find($id);
      return view('backend/admin/coupon/edit-coupon',compact('edit'));
      
    }


    public function update(Request $request,$id)
      {
        $this->validate($request,[
            'code' => 'required',
            'type' => 'required|max:250',
            'value' => 'required|max:250',
          ]);


        $model = Coupon::find($id);

        if ($model) {
          $model->update([
            'code' => $request->code,
            'type' => $request->type,
            'value' => $request->value,
          ]);

        return redirect()->route('coupon.index')->with('success','Coupon Updated successfull !');
        
        }else{
          return redirect()->route('color.index')->with('warning','Somethin Wrong !');
        }
      }

   public function couponStatus(Request $request){
      if($request->mode == 'true')
        {
           DB::table('coupons')->where(['id'=>$request->id])->update(['status'=>'active']);
          
        }else{
             DB::table('coupons')->where(['id'=>$request->id])->update(['status'=>'inactive']);
             
        }

        return response()->json(['msg'=>'status successfullly Inactive','status'=>true]);

   }


   public function destroy(Request $request)
    {

        $del = Coupon::find($request->coupon_id);

        if ($del) {
            $del->delete();
            return redirect()->route('coupon.index')->with('warning','Coupon Deleted Successfull');
        }else{
            return redirect()->with('warning','Something Wrong.Try again');
        }
    }



}
