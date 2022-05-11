<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\admin\Banner;
use File;
use Str;
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
            'description'=> 'nullable|string',
            'photo'=> 'required|mimes:jpeg,png,jpg',


        ]);
        
        $data = $request->all();

        // genarate unique file name
        $image = $request->file('photo');
        $imgExt = $image->extension();
        $rand   = rand(1111111111,999999999);
        $imgName = 'banner'.$rand.'.'.$imgExt;
        $image->move('upload/banners/', $imgName);
        $storeImg = 'upload/banners/'.$imgName;
        // genarate unique file name
        
        $data['photo'] = $storeImg;

        $slug = Str::slug($request->input('title'));

        $slugCount = Banner::where('slug',$slug)->count();
        if($slugCount > 0)
        {
            $slug .= time().'-'.$slug;

        }
        $data['slug'] = $slug;
        // return $data;

        $status = Banner::create($data);
        if($status)
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
    public function destroy($id)
    {
        //
    }
}
