<?php

namespace App\Http\Controllers\frontend\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\admin\Category;
use App\Models\backend\admin\SubCategory;
use App\Models\backend\admin\Brand;
use App\Models\backend\admin\Size;
use App\Models\backend\admin\Color;
use App\Models\backend\admin\Product;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shop(Request $request)
    {
        $modelProducts = Product::query();
        // get category slug by get url when form submited
       

        $products = $modelProducts;
        ///count product 
        $rowProducts = $products->paginate(20);
        // category url by product get
        if (!empty($_GET['category'])) {
            $slugs = explode(',', $_GET['category']);
            $catIds = Category::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();

            $products = $modelProducts->whereIn('category_id',$catIds);
            ///count product 
            $rowProducts = $products->paginate(20);
        // dd($rowProducts);
        }
        // brand url by product get
        if (!empty($_GET['brandBy'])) {
            $slugs = explode(',', $_GET['brandBy']);
            $brandIds = Brand::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();

            $products = $modelProducts->whereIn('brand_id',$brandIds);
            ///count product 
            $rowProducts = $products->paginate(20);
        }

        // size url by product get
        if (!empty($_GET['sizeBy'])) {
             $slugs = explode(',', $_GET['sizeBy']);
            $sizeIds = Size::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();

            $products = $modelProducts->whereIn('size_id',$sizeIds);
            ///count product 
            $rowProducts = $products->paginate(20);
            // dd($Products);
        }

        if (!empty($_GET['sortBy'])) {

            // dd($sortBy);
            if ($_GET['sortBy'] == 'price_desc') {
                $products = $products->where(['status'=>'active'])->orderBy('sell_price','DESC');
                // dd($products);
            }
            if ($_GET['sortBy'] == 'price_asc') {
                $products = $products->where(['status'=>'active'])->orderBy('sell_price','ASC');
            }

            
        }

        //price by filter
        if (!empty($_GET['price'])) {
            $price = explode('-', $_GET['price']);
            $products = $modelProducts->whereBetween('sell_price',$price)->orderBy('sell_price','ASC');
            ///count product 
            $rowProducts = $products->paginate(20);

        }


        else{
            $products = Product::where(['status'=>'active'])->orderBy('id','DESC');
            $rowProducts = $products->paginate(20);
        }


        // dd($count);
        $categories = Category::where('status','active')->with('products')->get();
        return view('frontend.pages.shop-product',compact(['categories','products','rowProducts']));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shopFilter(Request $request)
    {
        $data = $request->all();

        // dd($data);
        $catUrl = '';
        // categories by products GET URL send 
        if (!empty($data['category'])) {
            foreach ($data['category'] as $cat) {
                if (empty($catUrl)) {
                    $catUrl .= "&category=".$cat; 
                }else{
                    $catUrl .= ",".$cat; 
                }
            }
        }
        // brands by products GET URL send 
        $brandUrl = '';
        if (!empty($data['brand'])) {
            // dd($data['brand']);
            foreach ($data['brand'] as $brand) {
                if (empty($brandUrl)) {
                    $brandUrl .= '&brandBy='.$brand;
                }else{
                    $brandUrl .= ','.$brand;
                }
            }
        }
        // size by products GET URL send 
        $sizeUrl = '';
        if (!empty($data['size'])) {
            foreach ($data['size'] as $size) {
                if (empty($sizeUrl)) {
                    $sizeUrl .= '&sizeBy='.$size;
                }else{
                    $sizeUrl .= ','.$size;
                }
            }
        }
        //sort shop products GET URl send
        $sortUrl = '';
        if (!empty($data['sort_by'])) {
            $sortUrl .= "&sortBy=".$data['sort_by'];
        }
        //sort shop products GET URl send
        $priceUrl = '';
        if (!empty($data['min_price']) && !empty($data['max_price'])) {
            $priceUrl .= "&price=".$data['min_price'].'-'.$data['max_price'];
        }




        return redirect()->route('shop',$catUrl.$sortUrl.$brandUrl.$sizeUrl.$priceUrl);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchProduct(Request $request)
    {
        $data = $request->all();
        $modelProducts = Product::query();


        if (!empty($data['srch_cat']) && empty($data['input'])) {
            $slug = $data['srch_cat'];
            // dd($slug);
            if ($slug) {
                $catId = Category::select('id')
                    ->where(['slug'=>$slug])
                    ->pluck('id');
                
            }
            
            $products = $modelProducts->where('category_id',$catId);
            $rowProducts = $products->paginate(20);
        }elseif (!empty($data['srch_cat']) && !empty($data['input'])) {
            $slug = $data['srch_cat'];
            $query = $data['input'];
            $catId = Category::select('id')->where('slug',$slug)->pluck('id');

            $products = $modelProducts->where('name','like','%'.$query.'%')
                        ->where('category_id',$catId);
            ///count product 
            $rowProducts = $products->paginate(20);
        }

         // dd($count);
        $categories = Category::where('status','active')->with('products')->get();
        return view('frontend.pages.shop-product',compact(['categories','products','rowProducts']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function categoryByProduct($slug)
    {
 
        $catSlug = $slug;
        // dd($category);
        $modelProducts = Product::query();
        if (!empty($catSlug)) {
            $catId = Category::select('id')->where('slug',$catSlug)->pluck('id');

            $products = $modelProducts->where('category_id',$catId);
            ///count product 
            $rowProducts = $products->paginate(4);
        }

        $categories = Category::where('status','active')->with('products')->get();
        return view('frontend.pages.shop-product',compact(['categories','products','rowProducts']));
        
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
