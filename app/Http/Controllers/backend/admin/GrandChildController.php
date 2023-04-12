<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\admin\SubCategory;
use App\Models\backend\admin\Category;
use App\Models\backend\admin\GrandChildCategory;
use DB;
use File;
use Str;
class GrandChildController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grandChilds = GrandChildCategory::latest()->get();
        return view('backend/admin/grand-child-category/grand-child-index',compact(['grandChilds']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $Categories = Category::latest()->get();
        return view('backend/admin/grand-child-category/grand-child-create',compact('Categories'));
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
            'name' => 'required|max:250|string',
            'sub_cat_id' => 'required',
        ]);


        // genarate unique file name
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imgExt = $image->extension();
            $rand   = rand(1111111111,999999999);
            $imgName = 'grand-category'.$rand.'.'.$imgExt;
            $image->move('upload/grand-category/', $imgName);
            $storeImg = 'upload/grand-category/'.$imgName;
        }else{
            $storeImg = '';
        }
        
        // genarate unique file name

        // slug check and grnrate
        
        $slug = Str::slug($request->input('name'));
        $slugCount = GrandChildCategory::where('slug',$slug)->count();
        
        if($slugCount > 0)
        {
            $slug = $slug.time().'-'.$slug;

        }
        // slug check and grnrate

        $store = GrandChildCategory::create([
            'name' => $request->name,
            'slug' => $slug,
            'photo' => $storeImg,
            'sub_cat_id' => $request->sub_cat_id,
        ]);

        if ($store) {
            return redirect()->route('grand-child-category.index')->with('success','Grand Child Category created successfull');
        }else{
            return redirect()->with('warning','Something Wrong. Try again');
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
        $edit = GrandChildCategory::find($id);
        $categories = Category::latest()->get();
        if ($edit) {
            return view('backend/admin/grand-child-category/edit-grand-child',compact(['edit','categories']));
        }else{
            return back()->with('warning','category not found');
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
        $GrandChildCategory = GrandChildCategory::find($id);

        $this->validate($request,[
             'name' => 'required|max:250|string',
            'sub_cat_id' => 'required',
        ]);

        // genarate unique file name
        if ($request->hasFile('photo')) {

            $storePath = $GrandChildCategory->photo;
            // dd($storePath);
            // delete existing file;
            if (File::exists($storePath)) {
                File::delete($storePath);
            }

            $image = $request->file('photo');
            $imgExt = $image->extension();
            $rand   = rand(1111111111,999999999);
            $imgName = 'sub-category'.$rand.'.'.$imgExt;
	        $image->move('upload/grand-category/', $imgName);
            $GrandChildCategory->photo = 'upload/grand-category/'.$imgName;
            // genarate unique file name
        }



        

        // slug check and grnrate
        $slug = Str::slug($request->input('title'));

        $slugCount = GrandChildCategory::where('slug',$slug)->count();
        
        if($slugCount > 0)
        {
            $slug = $slug.time().'-'.$slug;

        }
        // slug check and grnrate

        $update = $GrandChildCategory->update([
            'name' => $request->name,
            'sub_cat_id' => $request->sub_cat_id,
            'slug' => $slug,
        ]);

        if ($update) {
            return redirect()->route('grand-child-category.index')->with('success','Grand Child Category Updated successfull');
        }else{
            return redirect()->with('warning','Something Wrong. Try again');
        }


        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = GrandChildCategory::find($id);
        if ($del) {
            $del->delete();
            $storePath = $del->photo;
            // delete existing file;
            if (File::exists($storePath)) {
                File::delete($storePath);
            }

            return redirect()->route('grand-child-category.index')->with('success','Sub Category Deleted Successfull');
        }else{
            return redirect()->with('warning','Something Went Wrong');
        }
    }

    // change status
    public function GrandChildCategoryStatus(Request $request)
    {
        // $request->all();
        if($request->mode == 'true')
        {
           DB::table('grand_child_categories')->where(['id'=>$request->id])->update(['status'=>'active']);
          
        }else{
             DB::table('grand_child_categories')->where(['id'=>$request->id])->update(['status'=>'inactive']);
             
        }
        return response()->json(['msg'=>'status successfullly Changed','status'=>true]);
    }


// child by get grand child category
    public function childByGrandChild(Request $request,$id){

        $grandChild = DB::table('grand_child_categories')->where('sub_cat_id',$id)->get();
        if ($grandChild) {
            return response()->json(['status'=>true,'data'=>$grandChild,'msg'=>'success']);
        }else{
            return response()->json(['status'=>true,'data'=>null,'msg'=>'not found']);
        }

    }
}
