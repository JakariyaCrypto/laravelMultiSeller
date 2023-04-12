<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\admin\Category;
use DB;
use File;
use Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('backend/admin/category/index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $parent_cats = Category::latest()->get();
        return view('backend/admin/category/create-category',compact('parent_cats'));
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
            'name' => 'required|max:250|string|unique:categories,name',
            'photo' => 'required|max:250',
        ]);


        // genarate unique file name
        $image = $request->file('photo');
        $imgExt = $image->extension();
        $rand   = rand(1111111111,999999999);
        $imgName = 'category'.$rand.'.'.$imgExt;
        $image->move('upload/category/', $imgName);
        $storeImg = 'upload/category/'.$imgName;
        // genarate unique file name

        // slug check and grnrate
        
        $slug = Str::slug($request->input('name'));
        $slugCount = Category::where('slug',$slug)->count();
        
        if($slugCount > 0)
        {
            $slug = $slug.time().'-'.$slug;

        }
        // slug check and grnrate

        $store = Category::create([
            'name' => $request->name,
            'slug' => $slug,
            'photo' => $storeImg,
        ]);

        if ($store) {
            return redirect()->route('category.index')->with('success','Category created successfull');
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
        $edit = Category::find($id);
        $parent_cats = Category::latest()->get();
        if ($edit) {
            return view('backend/admin/category/edit-category',compact(['edit','parent_cats']));
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
        $request->validate([
            'name' => 'required|max:250|string|unique:categories,name,'.$id,
        ]);
        $category = Category::find($id);

        $this->validate($request,[
            'name' => 'required|max:250|string',
        ]);

        // genarate unique file name
        if ($request->hasFile('photo')) {

            $storePath = $category->photo;
            // dd($storePath);
            // delete existing file;
            if (File::exists($storePath)) {
                File::delete($storePath);
            }

            $image = $request->file('photo');
            $imgExt = $image->extension();
            $rand   = rand(1111111111,999999999);
            $imgName = 'category'.$rand.'.'.$imgExt;
            $image->move('upload/category/', $imgName);

            $category->photo = 'upload/category/'.$imgName;
            // genarate unique file name
        }



        

        // slug check and grnrate
        $slug = Str::slug($request->input('title'));

        $slugCount = Category::where('slug',$slug)->count();
        
        if($slugCount > 0)
        {
            $slug .= time().'-'.$slug;

        }
        // slug check and grnrate

        $update = $category->update([
            'name' => $request->name,
            'slug' => $slug,
        ]);

        if ($update) {
            return redirect()->route('category.index')->with('success','Category Updated successfull');
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
        $del = Category::find($id);
        if ($del) {
            $del->delete();
            $storePath = $del->photo;
            // delete existing file;
            if (File::exists($storePath)) {
                File::delete($storePath);
            }

            return redirect()->route('category.index')->with('success','Category Deleted Successfull');
        }else{
            return redirect()->with('warning','Something Went Wrong');
        }
    }

    // change status
    public function categoryStatus(Request $request)
    {
        // $request->all();
        if($request->mode == 'true')
        {
           DB::table('categories')->where(['id'=>$request->id])->update(['status'=>'active']);
          
        }else{
             DB::table('categories')->where(['id'=>$request->id])->update(['status'=>'inactive']);
             
        }
        return response()->json(['msg'=>'status successfullly Inactive','status'=>true]);
    }


    

}
