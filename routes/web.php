<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// admin
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('/',[\App\Http\Controllers\backend\admin\AdminController::class,'admin'])->name('admin');

    // banner
    Route::resource('banner',\App\Http\Controllers\backend\admin\BannerController::class);
    Route::post('banner-status',[\App\Http\Controllers\backend\admin\BannerController::class,'bannerStatus'])->name('banner.status');


    
    // pdf 
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
});
