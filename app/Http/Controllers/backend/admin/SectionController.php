<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\admin\Section;
use DB;
class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $section = Section::orderBy('id','desc')->get();

        return view('backend/admin/section/section-index',compact('section'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/admin/section/create-section');
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
            'name' => 'required|max:250'
        ]);

        $check = Section::where('category_id',$request->category_id)->get();

        if (count($check) > 0) {
            return redirect()->route('section.create')->with('warning','Section is Exits');
        }else{
            $store = Section::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
         ]);   

         if ($store) {
                return redirect()->route('section.index')->with('success','Section Created Sucessfull');
            }else{
                return redirect()->with('warning','Something Wrong. Try again');
            }
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
        $edit = Section::find($id);

        return view('backend/admin/section/edit-section',compact('edit'));
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
        $section = Section::find($id);
        $this->validate($request,[
            'name' => 'required|max:250'
        ]);

     $update = $section->update([
        'name' => $request->name,
        'category_id' => $request->category_id,
     ]);   

     if ($update) {
            return redirect()->route('section.index')->with('success','Section Updated Sucessfull');
        }else{
            return redirect()->with('warning','Something Wrong. Try again');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $del = Section::find($request->section_id);

        if ($del) {
            $del->delete();
            return redirect()->route('section.index')->with('warning','Section Deleted Successfull');
        }else{
            return redirect()->with('warning','Something Wrong.Try again');
        }
    }


    public function sectionStatus(Request $request){
      if($request->mode == 'true')
        {
           DB::table('sections')->where(['id'=>$request->id])->update(['status'=>'active']);
          
        }else{
             DB::table('sections')->where(['id'=>$request->id])->update(['status'=>'inactive']);
             
        }

        return response()->json(['msg'=>'status successfullly Inactive','status'=>true]);

   }


}
