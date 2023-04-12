<?php

namespace App\Http\Controllers\frontend\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\frontend\Review;
use Validator;
class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function review()
    {
        $reviews = Review::latest()->get();

        return view('backend/admin/review/review-index',compact('reviews'));
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
    public function store(Request $request)
    {
        // dd($request->all());

       $valid = Validator::make($request->all(),[
            'rating' => 'required|string',
            'comment' => 'required | max:250',
        ]);

       if (!$valid->passes()) {
           $status = 'errors';
           return response()->json([
            'status'=>$status,
            'errors' => $valid->errors()->toArray(),
           ]);
       }

        $create = Review::create([
            'product_id' => $request->product_id,
            'customer_id' => session()->get('customer_id'),
            'rating' => $request->rating,
            'comment' => $request->comment,
            'des' => $request->des,
        ]);

        if($create){

            $response['status'] = true;
            $response['message'] = "Review Succefully Store";

            if ($request->ajax()) {
                $review = view('frontend/layouts/partials/review_ajax')->render();
                $response['review'] = $review;
            }

            return json_encode($response);
        }
        // dd($request->all());
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
        $edit = Review::find($id);
        return view('backend/admin/review/review-edit',compact('edit'));
       // dd($id);
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
        // dd($request->all());
        if ($request->status == '') {
            $status = 'required';
        }else{
            $status = 'required';
        }

        $this->validate($request,[
            'rating' => 'required|string',
            'comment' => 'required | max:250',
            'status' => $status,
        ]);

        $update = Review::where([
            'id' => $id,
            'product_id' => $request->product_id,
        ])->update([
            'rating' => $request->rating,
            'comment' => $request->comment,
            'des' => $request->des,
            'status' => $request->status,
        ]);

        if ($update) {
            return redirect()->route('review')->with('success','Product Review Update Succefully');
        }else{
            return redirect()->route('review')->with('warning','Somethin Wrong');
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
        $del = Review::find($request->review_id);

        if ($del) {
            $del->delete();

            return redirect()->back()->with('warning','Review Deleted Successfull');
        }else{
            return redirect()->with('warning','Something Wrong.Try again');
        }
        // dd($request->all());
    }
}
