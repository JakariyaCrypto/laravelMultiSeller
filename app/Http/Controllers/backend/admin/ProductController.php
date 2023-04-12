<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\admin\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\backend\admin\MutliProductImg;
use DB;
use Str;
use File;
class ProductController extends Controller
{
    public function index(){
    	$products = Product::orderBy('id','desc')->get();
    	return view('backend/admin/product/product-index',compact('products'));
    }


    public function create(){
    	return view('backend/admin/product/product-create');
    }


    // store
    public function store(Request $request)
     {
        $this->validate($request,[
            'name' => 'required',
            'stock' => 'required',
            'qty' => 'required',
            'condition' => 'required',
            'photo' => 'required',
            'price' => 'required',
            'sell_price' => 'required',
        ]);

          // genarate unique file name
        $image = $request->file('photo');
        $imgExt = $image->extension();
        $rand   = rand(1111111111,999999999);
        $imgName = 'product'.$rand.'.'.$imgExt;
        $image->move('upload/product/', $imgName);
        $storeImg = 'upload/product/'.$imgName;
        // genarate unique file name

        $product = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $request->category_id,
            'child_category_id' => $request->child_category_id,
            'grand_child_category_id' => $request->grand_child_category_id,
            'stock' => $request->stock,
            'size_id' => $request->size_id,
            'color_id' => $request->color_id,
            'brand_id' => $request->brand_id,
            'price' => $request->price,
            'sell_price' => $request->sell_price,
            'condition' => $request->condition,
            'qty' => $request->qty,
            'description' => $request->description,
            'photo' => $storeImg,
            'code' => rand(111111,999999),
            'added_by_id' => Auth::guard('admin')->user()->id.'_admin',
        ];

        $storeId = DB::table('products')->insertGetId($product);
        

        if ($storeId) {

            $files = DB::table('temp_images')->where(['user_id'=> Auth::guard('admin')->user()->id.'_admin'])->get();

           
                foreach ($files as $file) {
                    
                   $storeFiles = MutliProductImg::create([
                        'user_id' => Auth::guard('admin')->user()->id.'_admin',
                        'product_id' => $storeId,
                        'file' => $file->file,
                    ]);

                   if ($storeFiles) {

                        DB::table('temp_images')->where(['user_id' => Auth::guard('admin')->user()->id.'_admin'])->delete();
                      
                   }
                }

            return redirect()->route('product.index')->with('success','Product Added successfullly');
        }else{
            return redirect()->route('product.index')->with('warning','Something Wrong !');
        }
     }


    // status
    public function productStatus(Request $request){
    	if($request->mode == 'true')
        {
           DB::table('products')->where(['id'=>$request->id])->update(['status'=>'active']);
          
        }else{
             DB::table('products')->where(['id'=>$request->id])->update(['status'=>'inactive']);
             
        }
        return response()->json(['msg'=>'status successfullly Changed','status'=>true]);
    }


// product /view
    public function productView($id){
        $product = Product::where('id',$id)->get();

        return view('backend/admin/product/product_view',compact('product'));
    }

//product edit

    public function edit(Request $request,$id){
        $product = Product::find($id);
        return view('backend/admin/product/product-edit',compact('product'));
    }

    //product destroy
    public function destroy(Request $request){

        $product = Product::find($request->product_id);

        if ($product) {
            $storedFilePath = $product->photo;

            if (File::exists($storedFilePath)) {
                File::delete($storedFilePath);
            }

           $delProduct = $product->delete();

           if ($delProduct) {
                // get product by all product mutli images
               $getMultFiles = DB::table('mutli_product_imgs')
                ->where(['product_id' => $request->product_id])
                ->get();

                foreach ($getMultFiles as $file) {
                // destroy all stored file in folder
                $mulitImgStorPath = public_path().'/upload/temp/'.$file->file;
                if (File::exists($mulitImgStorPath)) {
                        File::delete($mulitImgStorPath);
                    }
                // delete all upload multi  from db
                $delFiles = DB::table('mutli_product_imgs')
                ->where(['product_id' => $file->product_id])
                ->delete();
                // delete all stored upload files
                
            }   
           }

        }

        return redirect()->route('product.index')->with('warning','Product Deleted Successfull !');
    }


// delete single product product image from multi images
    public function deleteSingleMltiImage($multi_id,$product_id){
        $product = DB::table('mutli_product_imgs')->where([
            'id' => $multi_id,
            'product_id' => $product_id,
        ])->delete();

        if($product){

            return redirect()->route('product.edit',$product_id)->with('warning','Product image deleted successfull !');
        }

    }

// delete single image from multi images when it view
    public function deleteSingleViewImage($multi_id,$product_id){
        $product = DB::table('mutli_product_imgs')->where([
            'id' => $multi_id,
            'product_id' => $product_id,
        ])->delete();

        if($product){

            return redirect()->route('product.view',$product_id)->with('warning','Product image deleted successfull !');
        }

    }

//product update
    public function update(Request $request,$id){

        $product = Product::find($id);

        $this->validate($request,[
            'name' => 'required',
            'stock' => 'required',
            'qty' => 'required',
            'condition' => 'required',
            'price' => 'required',
            'sell_price' => 'required',
        ]);

        $storePath = $product->photo;
        if ($request->hasFile('photo')) {
            // delete existing file;
            if (File::exists($storePath)) {
                File::delete($storePath);
            }
            // genarate unique file name
            $image = $request->file('photo');
            $imgExt = $image->extension();
            $rand   = rand(1111111111,999999999);
            $imgName = 'product'.$rand.'.'.$imgExt;
            $image->move('upload/product/', $imgName);
            // genarate unique file name
            $storeImg = 'upload/product/'.$imgName;

        }else{
            $storeImg = $storePath;
        }

        $updateId = $product->update(
            [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $request->category_id,
            'child_category_id' => $request->child_category_id,
            'grand_child_category_id' => $request->grand_child_category_id,
            'stock' => $request->stock,
            'size_id' => $request->size_id,
            'color_id' => $request->color_id,
            'brand_id' => $request->brand_id,
            'price' => $request->price,
            'sell_price' => $request->sell_price,
            'condition' => $request->condition,
            'qty' => $request->qty,
            'description' => $request->description,
            'photo' => $storeImg,
            'code' => rand(111111,999999),
            'added_by_id' => Auth::guard('admin')->user()->id.'_admin',
        ]
        );
        

        if ($updateId) {

            $files = DB::table('temp_images')->where(['user_id'=> Auth::guard('admin')->user()->id.'_admin'])->get();

           
                foreach ($files as $file) {
                    
                   $storeFiles = MutliProductImg::create([
                        'user_id' => Auth::guard('admin')->user()->id.'_admin',
                        'product_id' => $id,
                        'file' => $file->file,
                    ]);

                   if ($storeFiles) {

                        DB::table('temp_images')->where(['user_id' => Auth::guard('admin')->user()->id.'_admin'])->delete();
                      
                   }
                }

            return redirect()->route('product.index')->with('success','Product Update successfullly');
        }else{
            return redirect()->route('product.index')->with('warning','Something Wrong !');
        }
    }




}
