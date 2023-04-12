<?php

namespace App\Http\Controllers\frontend\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
 use Barryvdh\DomPDF\Facade\PDF;
 use App\Models\User;
 use App\Models\frontend\customer\VerifyCustomer;
 use App\Mail\CutomerVerifyMail;
 use Hash;
 use Auth;
use session;
use Validator;
use Mail;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function orderView($id)
    {
        $result['customer_order'] = DB::table('orders')
            ->where(['customer_id'=>$id])
            ->get();

            foreach ($result['customer_order'] as $list) {
                $result['customer_order_products'][$list->id] = DB::table('ordered_products')
                    ->leftJoin('products','products.id','=','ordered_products.product_id')
                    ->where(['order_id'=>$list->id,'customer_id'=>$list->customer_id])
                    ->select('ordered_products.*','products.name','products.photo')
                    ->get();
            }

           // echo "<pre>";
// print_r($result['customer_order']);die();
        return view('frontend/pages/all-order',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function orderDetail($id)
    {
        $orderView = DB::table('orders')->where(['id'=>$id])->get();
        if (count($orderView) > 0) {
            return view('frontend/pages/order-detail',compact('orderView'));
        }else{
            return view('errors/404');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profileView(Request $request)
    {
        
        $profile = DB::table('orders')
            ->leftJoin('billings','billings.order_id','=','orders.id')
            ->select('billings.*','orders.id','orders.customer_id')
            ->where(['orders.customer_id'=>$request->customer_id])
            ->limit(1)
            ->get();
            if (count($profile) > 0) {
                session()->put('profile_check',$profile);
                
                $total_pending = DB::table('orders')->where(['customer_id'=>$profile[0]->customer_id,'order_status'=>'pendding'])->get();
                $total_success = DB::table('orders')->where(['customer_id'=>$profile[0]->customer_id,'order_status'=>'success'])->get();
                $total_count = DB::table('orders')->where(['customer_id'=>$profile[0]->customer_id])->get();


                session()->put('country',$profile[0]->country);
                session()->put('city',$profile[0]->city);
                session()->put('address',$profile[0]->address1);
                session()->put('total_count',$total_count);
                session()->put('total_success',$total_success);
                session()->put('total_pending',$total_pending);

                return response()->json(['status'=>true]);
            }else{


                session()->put('total_count',0);
                session()->put('total_success',0);
                session()->put('total_pending',0);
            }
            

            // dd(count(session()->get('total')));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function orderedPdf($id)
    {
        $orderView = DB::table('orders')->where(['id'=>$id])->get();
        if (count($orderView) > 0) {
            $orderPdf = PDF::loadView('frontend/pages/ordered-pdf',compact('orderView'));
            return $orderPdf->download('order_invoice.pdf');
            // return view('frontend/pages/order-demo',compact('orderView'));
        }else{
            return view('errors/404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function orderTrack(Request $request)
    {
        $orderView = DB::table('orders')
            ->where(['order_id'=>$request->order_id,'customer_id'=>session()->get('customer_id')])
            ->get();
        // dd($orderView);

        if (count($orderView) > 0) {
            return view('frontend/pages/order-track',compact('orderView'));
        }else{
            return view('errors/404');
        }

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



    // customer registration
    public function customerRegistration(Request $request)
    {
         $valid = Validator::make($request->all(),[
            'name'=> 'required',
            'email'=> 'required|unique:users,email',
            'password' => 'min:5|required|confirmed',
            'password_confirmation' => 'required|min:6|same:password'
        ]);
        // dd($request->all());
        if (!$valid->passes()) {
            return response()->json([
                'status'=>'errors',
                'errors'=>$valid->errors()->toArray(),
            ]);
        }else{
            
            $user = New User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->token = rand(11111,99999);
            $user->password = Hash::make($request->password);
            $save = $user->save();

            if ($save) {
                $this->verifyMail($user);
                return response()->json(['status'=>'success','msg'=>'Send An Activtion link and Verify Code in your E-mail']);
            }else{
                return response()->json(['status'=>'warning','msg'=>'Something Wrong']);
            }
        }
    }


    //verification mail
    public function verifyMail($customer){
        // dd($user->email);
        Mail::to($customer->email)->send( New CutomerVerifyMail($customer));
    }
    

    // verify form
    public function verifyForm($token){
        return view('frontend.pages.customer-verify',compact('token'));
    }
    // customer Verfication 
    public function verify(Request $request){
        $tokenUpdate = VerifyCustomer::where(['token'=>$request->token])->update(['token'=>'verify']);
        if ($tokenUpdate) {
            return redirect()->route('customer.auth')->with('success','Email Successfully Verification!');
        }
    }
    // customer login
    public function customerLogin(Request $request)
    {
        $this->validate($request,[
            'email' => 'email|required|exists:users,email',
            'password' => 'required|min:5|max:30'
        ]);


        if(Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password,'token'=>$request->token])){
            return redirect()->route('frontend');

        }elseif(Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password]) == false){

             return redirect()->route('customer.auth')->with('warning','Email & Password is not match !');
        }
        else{
            return redirect()->route('customer.auth')->with('warning','Please Verify Your Email !');
        }


    }



    // customer logout
    public function customerLogout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('frontend');
    }


}
