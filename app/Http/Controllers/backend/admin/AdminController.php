<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
class AdminController extends Controller
{
	
    public function index()
    {
    	$result['customer_order'] = DB::table('orders')
            ->orderBY('id','desc')
            ->get();
        return view('backend/admin/dashboard/dashboard',$result);
    }


    //order  detail
    public function adminOrderDetail($id)
    {
    	$orderView = DB::table('orders')->where(['id'=>$id])->get();
        if (count($orderView) > 0) {
            return view('backend/admin/order/order-detail',compact('orderView'));
        }else{
            return "order not found";
        }
    }


   ///order status change
    public function changeOrderStatus(Request $request){

    	if (!empty($request->order_status)) {

    		if ($request->order_status == 'pendding') {
    		$paymentStatus = 'unpaid';
	    	}else{
	    		$paymentStatus = 'paid';
	    	}

	    	$update = DB::table('orders')
	    			->where('id',$request->order_id)
	    			->update([
	    				'order_status' => $request->order_status,
	    				'payment_status' => $paymentStatus,
	    			]);

	    	if ($update) {
	    		return redirect()->back()->with('success','Order Status Successfully Changed');
	    	}
    		
    	}else{
    		return redirect()->back()->with('warning','Something Wrong Try Again');
    	}

    	
    	// dd($request->all());
    }

//order destroy
    public function orderDestroy(Request $request){
    	$orders = DB::table('orders')->where('id',$request->order_id)->get();
    	// dd($orders);
    	if ($orders) {
    		foreach ($orders as $order) {
    			// dd($order->id);
    			DB::table('ordered_products')->where('order_id',$order->id)->delete();
    			
    		}

    		return redirect()->back()->with('success','Order Successfully Deleted');
    	}
    	// dd($request->all());
    }


}
