<?php

namespace App\Http\Controllers\frontend\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\admin\Product;
use App\Models\backend\admin\Coupon;
use Cart;
use session;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.pages.cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_qty = $request->input('product_qty');
        $product_id = $request->input('product_id');
        // dd($product_id);
        $product = Product::getProduct($product_id); 

        $product_name = $product[0]['name'];
        $price = $product[0]['sell_price'];

        $cart_array= [];

        foreach (Cart::instance('shopping')->content() as $item) {
            $cart_array[] = $item->id;
        }

        
        $result = Cart::instance('shopping')->add($product_id,$product_name,$product_qty,$price)->associate('App\Models\backend\admin\Product');

        if ($result) {

            $response['status'] = true;
            $response['product_id'] = $product_id;
            $response['total'] = Cart::instance('shopping')->subtotal();
            $response['cart_count'] = Cart::instance('shopping')->count();

            if ($request->ajax()) {
                $header = view('frontend/layouts/partials/header')->render();
                $response['header'] = $header;
            }

            return json_encode($response);
        }



        // return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addCoupon(Request $request)
    {
        $check = Coupon::where(['code'=>$request->post('code'),'status'=>'active'])->first();
        $total = 0;
        if ($check) {

            $total = Cart::instance('shopping')->subtotal();

           session()->put('coupon',[
            'id' => $check->id,
            'code' => $check->code,
            'value' => $check->discount($total),
           ]);
            
            $status = "success";
            $msg = "Coupon Code Applied ";

        }else{
            $status = 'error';
            $msg = "Coupon Code is Invalid !";

        }

        if ($request->ajax()) {
                $header = view('frontend/layouts/partials/header')->render();
                $cart_list = view('frontend/layouts/partials/cart_list')->render();
            }

        return response()->json(['status'=>$status,'msg'=>$msg,'header'=>$header,'cart_list'=>$cart_list]);
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
    public function update(Request $request)
    {
        // dd($request->all());

        $this->validate($request,[
            'qty'=>'required|numeric'
        ]);

        $qty = $request->post('qty');
        $stock_qty = $request->post('stock_qty');
        $product_id = $request->post('product_id');
        // dd($stock_qty);
        if ($request->post('stock_qty') < $request->post('qty')) {
            $response['status'] = false;
            $response['message'] = "we currently don`t have substantial stock";
        }elseif ($qty<1) {
            $response['status'] = false;
            $response['message'] = "Must Be added one item";
        }else{
            $response['total'] = Cart::subtotal();
            $response['cart_count'] = Cart::count();

            $response['status'] = true;
            Cart::instance('shopping')->update($product_id,$qty);
            $response['message'] = "Quantity update succesfully ! ";
        }

        if ($request->ajax()) {
                $header = view('frontend/layouts/partials/header')->render();
                $cart_list = view('frontend/layouts/partials/cart_list')->render();
                $response['header'] = $header;
                $response['cart_list'] = $cart_list;
            }

        return json_encode($response);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
        $product_id = $request->post('product_id');
        Cart::instance('shopping')->remove($product_id);

        $response['status'] = true;
        $response['total'] = Cart::subtotal();
        $response['cart_count'] = Cart::count();

        if ($request->ajax()) {
                $header = view('frontend/layouts/partials/header')->render();
                $response['header'] = $header;
                $cart_list = view('frontend/layouts/partials/cart_list')->render();
                $response['cart_list'] = $cart_list;
            }

        return json_encode($response);
    }
}
