<?php

namespace App\Http\Controllers\frontend\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\admin\Category;
use App\Models\backend\admin\Product;
use App\Models\backend\admin\Currency;
use App\Models\User;
use Auth;
use Session;
use Validator;
use Crypt;
use DB;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        return view('frontend/pages/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function CategoryProduct(Request $request,$slug)
    {
        
        $categories = Category::with('products')->where('slug',$slug)->get();
        $sort = "";
        $cat_id = "";

        if ($request->sort != null) {
                $sort = $request->sort;
        }



        if ($categories == null) {
            return view('errors/404');
            
        }else{
            if ($sort == 'price_asc') {
                $products = Product::where(['status'=>'active','price'=>$categories[0]->price])->orderBy('price','DESC')->paginate(20);
            }elseif ($sort == 'date') {
                $products = Product::where(['status'=>'active','category_id'=>$categories[0]->id])->orderBy('id','ASC')->paginate(20);
            }elseif (isset($request->cat_id)) {
                $cat_ids = $request->cat_id;
                $route = "category/product";
               $products = Product::whereIn('category_id',explode(',', $cat_ids))
                    ->orderBy('id','ASC')
                    ->paginate(20);
                    // dd($cat_ids);
                    // echo "<pre>";
                    // print_r($products);
                     response()->json($products);

                    return view('frontend/pages/filter-product',compact('products'));

            }

            else{


                $products = Product::where(['status'=>'active'])->orderBy('id','ASC')->paginate(20);
                $route = "category/product";
                return view('frontend/pages/category-product',compact(['categories','route','products']));

            }

                
        }

        
        

    }


    public function shopProduct(Request $request)
    {
        if ($request->ajax() && isset($request->cat_id)) {
                $cat_ids = $request->cat_id;
               $products = DB::table('products')->whereIn('category_id',explode(',', $cat_ids))
                    ->orderBy('id','ASC')
                    ->paginate(20);
                    // dd($cat_ids);
                    // echo "<pre>";
                    // print_r($products);

                    return view('frontend.pages.filter-product', compact('products'));
                    return response()->json($products);
                    

            }else{
                $products = DB::table('products')->where(['status'=>'active'])->orderBy('id','ASC')->paginate(20);

                return view('frontend.pages.shop', compact('products'));
            }

        
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SingleProduct($slug)
    {
        $product = Product::with('relativeProduct')->where('slug',$slug)->get();
        
        // echo "<pre>";
        // print_r($product);
        // exit;
        if ($product) {
            return view('frontend/pages/single-product',compact('product'));
        }else{
            return view('errors/404');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    


// currency change
    public function currencyChange(Request $request)
    {
        // dd($request->all());
        $currency = Currency::where('id',$request->currency_id)->first();

        if ($currency) {
            session()->put('currency_name',$currency->name);
            session()->put('currency_code',$currency->code);
            session()->put('currency_symbol',$currency->symbol);
            session()->put('currency_rate',$currency->exchange_rate);

            $status = 'success';

            return response()->json(['status'=>$status]);
        }else{
            return view('errors/404');
        }
        


    }

}
