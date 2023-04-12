<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\PDF;
use File;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['customer_order'] = DB::table('orders')
            ->orderBY('id','desc')
            ->get();
        return view('backend/admin/order/orders',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $delete = DB::table('orders')->where('id',$request->order_id)->delete();
        if ($delete) {
            foreach ($orders as $order) {
                // dd($order->id);
                DB::table('ordered_products')->where('order_id',$order->id)->delete();
                
            }

            return redirect()->back()->with('success','Order Successfully Deleted');
        }
        // dd($request->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function todayOrder()
    {
        $today = \Illuminate\Support\Carbon::now()->format('d-m-y');

        $result['today_orders'] = DB::table('orders')
            ->orderBY('id','desc')
            ->where('created_at',$today)
            ->get();
        // dd($result['today_orders']);
        return view('backend/admin/order/today-order',$result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downloadOrderAdmin($id)
    {
         $orderView = DB::table('orders')->where(['id'=>$id])->get();
        // dd($orderView);
        if (count($orderView) > 0) {
            $orderPdf = PDF::loadView('backend/admin/order/order-pdf',compact('orderView'));
            return $orderPdf->download(rand(111,999).'-'.$orderView[0]->order_id.'.pdf');
            // return view('frontend/pages/order-demo',compact('orderView'));
        }
    }
}
