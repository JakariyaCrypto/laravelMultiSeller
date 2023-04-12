<?php

namespace App\Http\Controllers\backend\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\admin\Product;
use App\Models\backend\admin\Size;
use App\Models\backend\admin\ProductAttribute;
use File;
class ProductAttributesController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addMultiProduct($id)
    {
        $products = Product::find($id);
        // dd($products->name);
        $productAttritubes = ProductAttribute::where('product_id',$id)->get();

        return view('backend/seller/product_attribute/product-attbute',compact(['products','productAttritubes']));
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
    public function productAttibuteStore(Request $request,$id)
    {

        $this->validate($request,[
            'color'=> 'required',
            'size'=> 'required',
            'pric*'=> 'nullable ',
            'sell_price'=> 'nullable',
            'qty'=> 'required',
            'photo'=> 'required',
        ]);


        $data = $request->all();

        foreach ($data['color'] as $key => $value) {
            if( $request->hasFile("photo.$key")){
                $rand = rand(1111111111,9999999999);
                $img = $request->file("photo.$key");
                $ext = $img->extension();
                $imgName = time().$rand.'.'.$ext;
                $img->move('upload/attributeImg/',$imgName);
            }
            

             // dd($imgName);

            if (!empty($value)) {
                $attribute = new ProductAttribute;
                $attribute['product_id'] = $id;
                $attribute['color'] = $value;
                $attribute['size'] = $data['size'][$key];
                $attribute['price'] = $data['price'][$key];
                $attribute['sell_price'] = $data['sell_price'][$key];
                $attribute['qty'] =  $data['qty'][$key];
                // dd($attribute);

                $attribute['photo'] = 'upload/attributeImg/'.$imgName;
                
                $attribute->save();
            }
        }

        return redirect()->back()->with('success','Product Attribute Added Success !!');
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
    public function attributeDestroy(Request $request)
    {

        $producctAttribute = ProductAttribute::find($request->attribute_id);

        if ($producctAttribute) {
            $producctAttribute->delete();

            $storePath = $producctAttribute->photo;
            if (File::exists($storePath)) {
                File::delete($storePath);
            }

            return redirect()->route('add.multi.product',$request->product_id)->with('warning','Product Attribute Deleted Successfull');
        }else{
            return redirect()->route('add.multi.product',$request->product_id)->with('warning','Something Went Wrong');
        }

    }
}
