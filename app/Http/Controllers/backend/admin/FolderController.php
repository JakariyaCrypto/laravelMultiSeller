<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\admin\Folder;
use App\Models\backend\admin\FileUpload;
use App\Models\backend\admin\MultiFile;
use Illuminate\Support\Facades\Auth;
use DB;
use File;
class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // $request->validate([
        //     "name"=> 'required | string',
        //     "email"=> 'required | unique:folders,email',
        // ]);

        // store input data
        $info = [
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'phone' => $request->post('phone'),
            'address' => $request->post('address'),
        ];

        $storeId = DB::table('folders')->insertGetId($info);
       
        if ($storeId) {
             $id = Auth::id();

            $files = DB::table('file_uploads')->where(['user_id'=> $id])->get();

           
                foreach ($files as $file) {
                    
                   $storeFiles = MultiFile::create([
                        'user_id' => $id,
                        'folder_id' => $storeId,
                        'file' => $file->file,
                    ]);

                   if ($storeFiles) {
                        DB::table('file_uploads')->where(['user_id' => $id])->delete();
                      
                   }
                }

                return "all is success";
            

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
