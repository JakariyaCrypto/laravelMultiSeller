<?php

namespace App\Http\Controllers\frontend\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\admin\ProductAttribute;
use App\Models\backend\admin\Product;
use App\Models\frontend\Review;
use Cart;
class SingleProduct extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SingleProduct($slug)
    {
        $product = Product::with('relativeProduct')->where('slug',$slug)->get();
        
        //get rating
        $ratings = Review::where('product_id',$product[0]->id)->get();
        
        if ($product) {
            return view('frontend/pages/single-product',compact(['product','ratings']));
        }else{
            return view('errors/404');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addCard(Request $request)
    {

        $product_qty = $request->input('qty');
        $product_id = $request->input('product_id');

        $size_id = $request->input('size_id');
        $color_id = $request->input('color_id');

        $product = Product::getProduct($product_id);
        $attrSize = ProductAttribute::where(['id'=>$size_id,'product_id'=>$product_id])->get();
        $attrColor = ProductAttribute::where(['id'=>$color_id,'product_id'=>$product_id])->get();
        // dd($attrColor[0]->stock);
        // check stock
        if (count($attrColor)>0 && $attrColor[0]->qty < $product_qty) {
            // dd('false');
            $response['status'] = 'color_stock';
            $response['message'] = "we currently don`t have substantial stock by selected color";
        }elseif (count($attrSize) && $attrSize[0]->qty < $product_qty) {
        $response['status'] = 'size_stock';
           $response['message'] = "we currently don`t have substantial stock by selected size";
        }elseif ($product[0]['qty'] < $product_qty) {
            $response['status'] = 'product_stock';
            $response['message'] = "we currently don`t have substantial ";
        }else{
            $product_name = $product[0]['name'];
            $price = $product[0]['sell_price'];
            // $colorName = $attrColor[0]['color'];
            // $sizeName = $attrSize[0]['size'];
            // $product_name = $product[0]['qty'];

            $cart_array= [];
            $response['status'] = true;
            foreach (Cart::instance('shopping')->content() as $item) {
                $cart_array[] = $item->id;
            }

            
            Cart::instance('shopping')->add($product_id,$product_name,$product_qty,$price)->associate('App\Models\backend\admin\Product');

        }

        return json_encode($response);

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function orderNow(Request $request)
    {
        $product_qty = $request->input('qty');
        $product_id = $request->input('product_id');
        $size_id = $request->input('size_id');
        $color_id = $request->input('color_id');

        $product = Product::getProduct($product_id);
        $attrSize = ProductAttribute::where(['id'=>$size_id,'product_id'=>$product_id])->get();
        $attrColor = ProductAttribute::where(['id'=>$color_id,'product_id'=>$product_id])->get();
        // dd($attrColor[0]->stock);
        // check stock
        if (count($attrColor)>0 && $attrColor[0]->qty < $product_qty) {
            // dd('false');
            $response['status'] = 'color_stock';
            $response['message'] = "we currently don`t have substantial stock by selected color";
        }elseif (count($attrSize) && $attrSize[0]->qty < $product_qty) {
        $response['status'] = 'size_stock';
           $response['message'] = "we currently don`t have substantial stock by selected size";
        }elseif ($product[0]['qty'] < $product_qty) {
            $response['status'] = 'product_stock';
            $response['message'] = "we currently don`t have substantial ";
        }else{
            $product_name = $product[0]['name'];
            $price = $product[0]['sell_price'];
            // $colorName = $attrColor[0]['color'];
            // $sizeName = $attrSize[0]['size'];
            // $product_name = $product[0]['qty'];

            $cart_array= [];
            $response['status'] = true;
            foreach (Cart::instance('shopping')->content() as $item) {
                $cart_array[] = $item->id;
            }

            
            Cart::instance('shopping')->add($product_id,$product_name,$product_qty,$price)->associate('App\Models\backend\admin\Product');

        }

        return json_encode($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function wishlist(Request $request)
    {
        $product_qty = $request->input('qty');
        $product_id = $request->input('product_id');
        $size_id = $request->input('size_id');
        $color_id = $request->input('color_id');

        $product = Product::getProduct($product_id);
        $attrSize = ProductAttribute::where(['id'=>$size_id,'product_id'=>$product_id])->get();
        $attrColor = ProductAttribute::where(['id'=>$color_id,'product_id'=>$product_id])->get();
        // dd($attrColor[0]->stock);
        // check stock
        if (count($attrColor)>0 && $attrColor[0]->qty < $product_qty) {
            // dd('false');
            $response['status'] = 'color_stock';
            $response['message'] = "we currently don`t have substantial stock by selected color";
        }elseif (count($attrSize) && $attrSize[0]->qty < $product_qty) {
        $response['status'] = 'size_stock';
           $response['message'] = "we currently don`t have substantial stock by selected size";
        }elseif ($product[0]['qty'] < $product_qty) {
            $response['status'] = 'product_stock';
            $response['message'] = "we currently don`t have substantial ";
        }else{
            $product_name = $product[0]['name'];
            $price = $product[0]['sell_price'];
            // $colorName = $attrColor[0]['color'];
            // $sizeName = $attrSize[0]['size'];
            // $product_name = $product[0]['qty'];

            $cart_array= [];
            $response['status'] = true;
            foreach (Cart::instance('wishlist')->content() as $item) {
                $cart_array[] = $item->id;
            }

            
            Cart::instance('wishlist')->add($product_id,$product_name,$product_qty,$price)->associate('App\Models\backend\admin\Product');

        }

        return json_encode($response);

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
