<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\admin\SubCategory;
use App\Models\backend\admin\Category;
use DB;
use File;
use Str;

class SubCategoryController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCats = SubCategory::latest()->get();
        return view('backend/admin/sub-category/sub-cateogy-index',compact('subCats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::latest()->get();
        return view('backend/admin/sub-category/create-sub-category',compact('categories'));
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
            'name' => 'required|max:250|string|unique:sub_categories,name',
            'category_id' => 'required',
        ]);


        // genarate unique file name
        if ($request->hasFile('photo')) {
             $image = $request->file('photo');
            $imgExt = $image->extension();
            $rand   = rand(1111111111,999999999);
            $imgName = 'sub-category'.$rand.'.'.$imgExt;
            $image->move('upload/sub-category/', $imgName);
            $storeImg = 'upload/sub-category/'.$imgName;
            // genarate unique file name
        }else{
            $storeImg = "";
        }
       
        
        // slug check and grnrate
        $slug = Str::slug($request->input('name'));
        $slugCount = SubCategory::where('slug',$slug)->count();
        
        if($slugCount > 0)
        {
            $slug = $slug.time().'-'.$slug;

        }
        // slug check and grnrate

        $store = SubCategory::create([
            'name' => $request->name,
            'slug' => $slug,
            'photo' => $storeImg,
            'category_id' => $request->category_id,
        ]);

        if ($store) {
            return redirect()->route('subcategory.index')->with('success','Sub Category created successfull');
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
        $edit = SubCategory::find($id);
        $categories = Category::latest()->get();
        if ($edit) {
            return view('backend/admin/sub-category/edit-sub-category',compact(['edit','categories']));
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
        $SubCategory = SubCategory::find($id);

        $this->validate($request,[
             'name' => 'required|max:250|string|unique:sub_categories,name,'.$id,
            'category_id' => 'required',
        ]);

        // genarate unique file name
        if ($request->hasFile('photo')) {

            $storePath = $SubCategory->photo;
            // dd($storePath);
            // delete existing file;
            if (File::exists($storePath)) {
                File::delete($storePath);
            }

            $image = $request->file('photo');
            $imgExt = $image->extension();
            $rand   = rand(1111111111,999999999);
            $imgName = 'sub-category'.$rand.'.'.$imgExt;
	        $image->move('upload/sub-category/', $imgName);
            $SubCategory->photo = 'upload/sub-category/'.$imgName;
            // genarate unique file name
        }



        

        // slug check and grnrate
        $slug = Str::slug($request->input('title'));

        $slugCount = SubCategory::where('slug',$slug)->count();
        
        if($slugCount > 0)
        {
            $slug = $slug.time().'-'.$slug;

        }
        // slug check and grnrate

        $update = $SubCategory->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'slug' => $slug,
        ]);

        if ($update) {
            return redirect()->route('subcategory.index')->with('success','Sub Category Updated successfull');
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
        $del = SubCategory::find($id);
        if ($del) {
            $del->delete();
            $storePath = $del->photo;
            // delete existing file;
            if (File::exists($storePath)) {
                File::delete($storePath);
            }

            return redirect()->route('subcategory.index')->with('success','Sub Category Deleted Successfull');
        }else{
            return redirect()->with('warning','Something Went Wrong');
        }
    }

    // change status
    public function SubCategoryStatus(Request $request)
    {
        // $request->all();
        if($request->mode == 'true')
        {
           DB::table('sub_categories')->where(['id'=>$request->id])->update(['status'=>'active']);
          
        }else{
             DB::table('sub_categories')->where(['id'=>$request->id])->update(['status'=>'inactive']);
             
        }
        return response()->json(['msg'=>'status successfullly Changed','status'=>true]);
    }



    public function chidCategory(Request $request,$id){

        $subCats = DB::table('sub_categories')->where('category_id',$id)->get();

        if (count($subCats) > 0) {
            return response()->json(['data'=>$subCats,'msg'=>'success','status'=>true]);
        }else{
            return response()->json(['data'=>null,'msg'=>'not found','status'=>false]);
        }
    }

}
