<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\admin\Brand;
use DB;
use File;
use Str;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('backend/admin/brand/brand-index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/admin/brand/create-brand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:250|unique:brands',
        ]);

         // genarate unique file name
        $image = $request->file('photo');
        $imgExt = $image->extension();
        $rand   = rand(1111111111,999999999);
        $imgName = 'brand'.$rand.'.'.$imgExt;
        $image->move('upload/brand/', $imgName);
        $storeImg = 'upload/brand/'.$imgName;
        // genarate unique file name
        

        $slug = Str::slug($request->input('name'));

        $slugCount = Brand::where('slug',$slug)->count();
        
        if($slugCount > 0)
        {
            $slug .= time().'-'.$request->input('name');

        }

        $store = Brand::create([
            'name'=> $request->name,
            'slug'=> $request->name,
            'photo'=> $storeImg,
        ]);

        if ($store) {
            return redirect()->route('brand.index')->with('success','Brand Added successfull !');
        }else{
            return redirect()->route('brand.index')->with('warning','Somethin Wrong !');
        }
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
        $edit = Brand::find($id);

        return view('backend/admin/brand/edit-brand',compact('edit'));
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
        $model = Brand::find($id);
        $this->validate($request,[
            'name' => 'required|string|max:250',
        ]);

        if ($request->hasFile('photo')) {
            // delete stored file 
            $storePath = $model->photo;
            if (File::exists($storePath)) {
                File::delete($storePath);
            }

        // genarate unique file name
        $image = $request->file('photo');
        $imgExt = $image->extension();
        $rand   = rand(1111111111,999999999);
        $imgName = 'brand'.$rand.'.'.$imgExt;
        $image->move('upload/brand/', $imgName);
        $model->photo = 'upload/brand/'.$imgName;
        // genarate unique file name


        }
        
        

        $slug = Str::slug($request->input('name'));

        $slugCount = Brand::where('slug',$slug)->count();
        
        if($slugCount > 0)
        {
            $slug .= time().'-'.$request->input('name');

        }

        $store = $model->update([
            'name'=> $request->name,
            'slug'=> $request->name,
        ]);

        if ($store) {
            return redirect()->route('brand.index')->with('success','Brand Updated successfull !');
        }else{
            return redirect()->route('brand.index')->with('warning','Somethin Wrong !');
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
        $del = Brand::find($id);

        if ($del) {
            $del->delete();

            $storePath = $del->photo;

            if (File::exists($storePath)) {
                File::delete($storePath);
            }

            return redirect()->route('brand.index')->with('warning','Brand Deleted Successfull');
        }else{
            return redirect()->with('warning','Something Wrong.Try again');
        }
    }

    public function brandStatus(Request $request){

        if($request->mode == 'true')
        {
           DB::table('brands')->where(['id'=>$request->id])->update(['status'=>'active']);
          
        }else{
             DB::table('brands')->where(['id'=>$request->id])->update(['status'=>'inactive']);
             
        }
        return response()->json(['msg'=>'status successfullly Inactive','status'=>true]);
        
     }




}
