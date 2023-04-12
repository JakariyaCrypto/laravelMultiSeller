<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\admin\Currency;
use DB;
use Str;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(){


        $result['currencies'] = Currency::latest()->get();
        return view('backend/admin/currency/currency-index',$result);

   }

  public function create()
    {
        return view('backend/admin/currency/currency-create');
    }


    public function store(Request $request){
      $this->validate($request,[
        'name' => 'required|string|max:250',
        'symbol' => 'required|string|max:250',
        'exchange_rate' => 'required',
        'code' => 'required|string|max:250',
      ]);

     
      $model = Currency::create([
        'name' => $request->name,
        'symbol' => $request->symbol,
        'exchange_rate' => $request->exchange_rate,
        'code' => $request->code,
      ]);

      if ($model) {
        return redirect()->route('currency.index')->with('success','Currency Added successfull !');
      }else{
        return redirect()->route('currency.index')->with('warning','Somethin Wrong !');
      }
    }

    public function edit($id){

      $edit = Currency::find($id);
      return view('backend/admin/currency/edit-currency',compact('edit'));
      
    }


    public function update(Request $request,$id)

    
      {
        $model = Currency::find($id);

        if ($model) {
          $model->update([
            'name' => $request->name,
            'symbol' => $request->symbol,
            'exchange_rate' => $request->exchange_rate,
            'code' => $request->code,
          ]);

        return redirect()->route('currency.index')->with('success','Currency Updated successfull !');
        
        }else{
          return redirect()->route('currency.index')->with('warning','Somethin Wrong !');
        }
      }

   public function currencyStatus(Request $request){
      if($request->mode == 'true')
        {
           DB::table('currencies')->where(['id'=>$request->id])->update(['status'=>'active']);
          
        }else{
             DB::table('currencies')->where(['id'=>$request->id])->update(['status'=>'inactive']);
             
        }

        return response()->json(['msg'=>'status successfullly Inactive','status'=>true]);

   }


   public function destroy(Request $request)
    {

        $del = Currency::find($request->currency_id);

        if ($del) {
            $del->delete();
            return redirect()->route('currency.index')->with('warning','Currency Deleted Successfull');
        }else{
            return redirect()->with('warning','Something Wrong.Try again');
        }
    }
}
