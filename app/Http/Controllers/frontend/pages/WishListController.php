<?php

namespace App\Http\Controllers\frontend\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\admin\Product;
use Cart;
class WishListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('frontend/pages/wish_list');
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
        $product_id = $request->post('product_id');
        $product_qty = $request->post('qty');

        $product = Product::getProduct($product_id);
        $price = $product[0]['sell_price'];


        $wish_array= [];

        foreach (Cart::instance('wishlist')->content() as $item) {
            $wish_array[] = $item->id;
        }

        if (in_array($product_id, $wish_array)) {
            $response['present'] = true;
            $response['message'] = "Item is already taken wish list";
        }else{

            $result = Cart::instance('wishlist')->add($product_id,$product[0]['name'],$product_qty,$price)->associate('App\Models\backend\admin\Product');

            if ($result) {
                $response['status'] = true;
                $response['message'] = "Item has been save wish list";
                $response['wish_count'] = Cart::instance('wishlist')->count();
            }

        }

        // if ($request->ajax()) {
        //     $header = view('frontend/layouts/partials/header')->render();
        //     $response['header'] = $header;
        // }

         return json_encode($response);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function move(Request $request)
    {
        // return dd($request->all());
        $data = Cart::instance('wishlist')->get($request->input('rowId'));

        $product_id = $data->id;
        $product_name = $data->name;
        $product_qty = 1;
        $price = $data->price;

        $result = Cart::instance('shopping')->add($product_id,$product_name,$product_qty,$price)->associate('App\Models\backend\admin\Product');
        // dd($result);
        Cart::instance('wishlist')->remove($request->input('rowId'));

        
        return redirect()->route('wish.index')->with('success','Product Successfully Move to Cart');

        
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
    public function destroy(Request $request)
    {
        // dd($request->all());
        $product_id = $request->post('row_id');
        
        Cart::instance('wishlist')->remove($product_id);

        $response['status'] = true;
        $response['total'] = Cart::subtotal();
        $response['cart_count'] = Cart::count();

        if ($request->ajax()) {
                $header = view('frontend/layouts/partials/header')->render();
                $response['header'] = $header;
                $wish_list = view('frontend/layouts/partials/wishlist')->render();
                $response['wish_list'] = $wish_list;
            }

        return json_encode($response);
    }
}
