<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\backend\customer\CustomerController;
use App\Http\Controllers\backend\vendor\VendorController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function(){
    Auth::routes();
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// admin
Route::group(['prefix'=>'admin','middleware'=>['admin','auth','PreventBackHistory']],function(){
    Route::get('dashboard',[\App\Http\Controllers\backend\admin\AdminController::class,'index'])->name('admin.dashboard');

    // banner
    Route::resource('banner',\App\Http\Controllers\backend\admin\BannerController::class);
    Route::post('banner-status',[\App\Http\Controllers\backend\admin\BannerController::class,'bannerStatus'])->name('banner.status');

    
    // pdf 
    Route::get('pdf-view',[App\Http\Controllers\backend\admin\PdfController::class,'pdfView']);
    Route::get('pdf-view',[App\Http\Controllers\backend\admin\PdfController::class,'pdfView']);
    Route::get('pdf-generate',[App\Http\Controllers\backend\admin\PdfController::class,'pdfGenerate'])->name('pdfGenerate');

    // send main with attach
    Route::get('mail-form',[App\Http\Controllers\backend\admin\AttachMailController::class,'index'])->name('main.index');
    Route::post('send-mail',[App\Http\Controllers\backend\admin\AttachMailController::class,'storeAndSend'])->name('send.mail');
    // send sms with mobile
    Route::get('mobile-form',[App\Http\Controllers\backend\admin\MobileSMSController::class,'index'])->name('mobile.index');
    Route::post('store-number',[App\Http\Controllers\backend\admin\MobileSMSController::class,'store'])->name('store');

    Route::get('verify-code',[App\Http\Controllers\backend\admin\MobileSMSController::class,'verifyCode'])->name('mobile.code');
    Route::post('verify',[App\Http\Controllers\backend\admin\MobileSMSController::class,'verify'])->name('verify');



// filepond
    Route::get('file-pond-form',[App\Http\Controllers\backend\admin\UploadController::class,'index'])->name('file-pond.create');
    Route::post('upload',[App\Http\Controllers\backend\admin\UploadController::class,'store']);
    Route::post('store-folder',[App\Http\Controllers\backend\admin\FolderController::class,'store'])->name('store.folder');




});



// vendor
Route::group(['prefix'=>'vendor','middleware'=>['vendor','auth','PreventBackHistory']],function(){

    Route::get('dashboard',[VendorController::class,'index'])->name('vendor.dashboard');
    Route::get('prfile',[VendorController::class,'profile'])->name('vendor.prfile');
    Route::get('setting',[VendorController::class,'setting'])->name('vendor.setting');

});

// customer
Route::group(['prefix'=>'customer','middleware'=>['customer','auth','PreventBackHistory']],function(){

    Route::get('dashboard',[CustomerController::class,'index'])->name('customer.dashboard');
    Route::get('prfile',[CustomerController::class,'profile'])->name('customer.prfile');
    Route::get('setting',[CustomerController::class,'setting'])->name('customer.setting');

});