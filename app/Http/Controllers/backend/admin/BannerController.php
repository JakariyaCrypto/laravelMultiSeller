<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\admin\Banner;
use File;
use Str;
use DB;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::orderBy('id','DESC')->get();
         
        return view('backend/admin/banner/index-banner',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/admin/banner/create-banner');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required|string',
            'conditional'=> 'required',
            'description'=> 'nullable|string|max:500',
            'photo'=> 'required|mimes:jpeg,png,jpg',
        ]);
        
        $data = new Banner();

        // genarate unique file name
        $image = $request->file('photo');
        $imgExt = $image->extension();
        $rand   = rand(1111111111,999999999);
        $imgName = 'banner'.$rand.'.'.$imgExt;
        $image->move('upload/banners/', $imgName);
        $storeImg = 'upload/banners/'.$imgName;
        // genarate unique file name
        

        $slug = Str::slug($request->input('title'));

        $slugCount = Banner::where('slug',$slug)->count();
        
        if($slugCount > 0)
        {
            $slug .= time().'-'.$slug;

        }

        $data->title = $request->post('title');
        $data->slug = $slug;
        $data->description = $request->post('description');
        $data->conditional = $request->post('conditional');
        $data->photo = $storeImg;
        $data->save();

        if($data->save())
        {
            return redirect()->route('banner.index')->with('success','Banner added successfull !');
        }else{
            return back()->with('warning','get something wrong');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::find($id);

        if ($banner) {
            return view('backend/admin/banner/edit-banner',compact('banner'));
        }{
            return back()->with('danger','data not found');
        }
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
        // return $request->file('photo');
        $request->validate([
            'title'=> 'required|string',
            'conditional'=> 'required',
            'description'=> 'nullable|string|max:500',
            'photo'=> 'mimes:jpeg,png,jpg',
        ]);
        
        $data = Banner::find($id);

        // check file 
        if ($request->has('photo')) {
            $storePath = $data->photo;
            // delete existing file;
            if (File::exists($storePath)) {
                File::delete($storePath);
            }

             // genarate unique file name
            $image = $request->file('photo');
            $imgExt = $image->extension();
            $rand   = rand(1111111111,999999999);
            $imgName = 'banner'.$rand.'.'.$imgExt;
            $image->move('upload/banners/', $imgName);
            $storeImg = 'upload/banners/'.$imgName;
            $data->photo = $storeImg;
            // genarate unique file name
        
        }

        // generate slug
        $slug = Str::slug($request->input('title'));

        $slugCount = Banner::where('slug',$slug)->count();
        
        if($slugCount > 0)
        {
            $slug .= time().'-'.$slug;

        }

        $data->title = $request->post('title');
        $data->slug = $slug;
        $data->description = $request->post('description');
        $data->conditional = $request->post('conditional');
        
        $data->save();

        if($data->save())
        {
            return redirect()->route('banner.index')->with('success','Banner Update successfull !');
        }else{
            return back()->with('warning','something went wrong');
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
        $del = Banner::find($id);

        if ($del) {
            $storePath = $del->photo;
            // delete existing file;
            if (File::exists($storePath)) {
                File::delete($storePath);
            }
            
            return redirect()->route('banner.index')->with('success','Banner Deleted Successfull');
        }else{
            return redirect()->with('warning','Something Went Wrong');
        }
    }

    // change status
    public function bannerStatus(Request $request)
    {
        // $request->all();
        if($request->mode == 'true')
        {
           DB::table('banners')->where(['id'=>$request->id])->update(['status'=>'active']);
          
        }else{
             DB::table('banners')->where(['id'=>$request->id])->update(['status'=>'inactive']);
             
        }
        return response()->json(['msg'=>'status successfullly Inactive','status'=>true]);
    }
}
