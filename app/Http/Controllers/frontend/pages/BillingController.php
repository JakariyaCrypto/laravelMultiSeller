<?php

namespace App\Http\Controllers\frontend\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConformMail;
use App\Models\frontend\customer\Order;
use App\Models\OrderedProduct;
use DB;
use Session;
use Cart;
use Str;
use Auth;
class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
  
        $user = DB::table('users')->where(['id'=> Auth::guard()->user()->id])->get();

           return view('frontend.pages.checkout',compact('user'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function freeShipping(Request $request)
    {

        $sub_total = $request->post('sub_total');
        // dd($subt_total);
        $shipping_charge = $request->post('shipping_charge') + $sub_total;
        if($shipping_charge){
            $status = 'success';
        }
        

        return response()->json(['status'=>'success','shipping_total'=>$shipping_charge]);

    }


    public function standartShipping(Request $request){

        $sub_total = $request->post('sub_total');
        // dd($subt_total);
        $shipping_charge = $request->post('shipping_charge') + $sub_total;

        if($shipping_charge){
            $status = 'success';
        }
        
        return response()->json(['status'=>'success','shipping_total'=>$shipping_charge]);
        

    }

    public function expressShipping(Request $request){

        $sub_total = $request->post('sub_total');
        $shipping_charge = $request->post('shipping_charge') + $sub_total;

        if($shipping_charge){
            $status = 'success';
        }
        
        return response()->json(['status'=>'success','shipping_total'=>$shipping_charge]);
        

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function orderStore(Request $request)
    {

        // require validation
        $this->validate($request,[
            'name'=> 'required|string',
            'email'=> 'required',
            'address1'=> 'required',
            'country'=> 'required',
            'city'=> 'required',
            'zip_code'=> 'required|numeric',
            'phone'=> 'required|numeric',
            'sname'=> 'required',
            'semail'=> 'required',
            'saddress1'=> 'required',
            'scity'=> 'required',
            'scountry'=> 'required',
            'szip_code'=> 'required',
            'szip_code'=> 'required',
            'payment_method'=> 'required',
            'shipping_charge'=> 'required',
        ]);

        
         
        // check coupon value
        if (session()->has('coupon')) {
               $couponVal = session()->get('coupon')['value'];
           }else{
            $couponVal = 0;
           }  

        //check payment method
        if ($request->post('payment_method') == 'COD') {
                 $paymentStatus = 'Unpaid';
        }else{
            $paymentStatus = 'Paid';
            dd($paymentStatus);
        }  
        
        $order_rand_id = Str::upper('ORD-'.Str::random(8));
        $date = \Illuminate\Support\Carbon::now();

       // store order info
       $order = New Order();
       $order->customer_id = Auth::guard()->user()->id;
       $order->order_id = $order_rand_id;
       $order->coupon_value = $couponVal;
       $order->shipping_charge = $request->post('shipping_charge');
       $order->sub_total = $request->post('sub_total');
       $order->payment_method = $request->post('payment_method');
       $order->payment_status =  $paymentStatus;
       $order->order_status = 'pendding';
       $order->created_at = $date;
       $order->save();

        $orderId = $order->id;
        session()->put('order_id',$orderId);
        session()->put('order_rand_id',$order_rand_id);
        

        if ($orderId) {

            $products = Cart::instance('shopping')->content();
            
            foreach($products as $product){   
                $orderItem = New OrderedProduct();
                $orderItem->customer_id = Auth::guard()->user()->id;           
                $orderItem->order_id = $orderId;           
                $orderItem->product_id =  $product->id;           
                $orderItem->qty = $product->qty;
                $orderItem->save();         
            }
            
            $billing = [
                'order_id' => $orderId,
                'name' => $request->post('name'),
                'email' => $request->post('email'),
                'address1' => $request->post('address1'),
                'address2' => $request->post('address2'),
                'country' => $request->post('country'),
                'city' => $request->post('city'),
                'zip_code' => $request->post('zip_code'),
                'phone' => $request->post('phone'),
                'comment' => $request->post('comment'),

            ];

            $insertBilling = DB::table('billings')->insert($billing); 

            $insertBilling = DB::table('users')
                ->where(['id'=>Auth::guard()->user()->id])
                ->update([
                    'address'=>$request->post('address1'),
                    'address2'=>$request->post('address2'),
                    'country'=>$request->post('country'),
                    'city'=>$request->post('city'),
                    'zip_code'=>$request->post('zip_code'),
                    'mobile'=>$request->post('phone'),
                ]);            


            $shipping = [
                'order_id' => $orderId,
                'sname' => $request->post('sname'),
                'semail' => $request->post('semail'),
                'saddress1' => $request->post('saddress1'),
                'saddress2' => $request->post('saddress2'),
                'scountry' => $request->post('scountry'),
                'scity' => $request->post('scity'),
                'szip_code' => $request->post('szip_code'),
                'sphone' => $request->post('sphone'),
            ];

            $insertshipping = DB::table('shippings')->insert($shipping);            

            if ($insertshipping) {
                Cart::destroy();
            }

            // call order confirmation function
             $this->sendOrderConfirmationMail($order);
             // dd('mail is sent');
            return redirect()->route('order.success');

        }
        




    // dd($order);
        
    }



    // order confirmation mail
    public function sendOrderConfirmationMail($order){
        $email = Auth::guard()->user()->email;
        Mail::to($email)->send( New OrderConformMail($order));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function orderSuccess()
    {
        return view('frontend/pages/order_success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
