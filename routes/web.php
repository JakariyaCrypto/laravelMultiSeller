<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\backend\vendor\VendorController;

use App\Http\Controllers\SslCommerzPaymentController;
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
// SSLCOMMERZ Start
        Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
        Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

        Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
        Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax'])->name('pay.ajax');

        Route::post('/success', [SslCommerzPaymentController::class, 'success']);
        Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
        Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

        Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
        //SSLCOMMERZ END


// customer 
Route::prefix('customer')->group(function(){

    Route::middleware(['guest:web'])->group(function(){
        // customers
        Route::view('auth','frontend.pages.login-registration')->name('customer.auth');

        Route::post('login',[App\Http\Controllers\frontend\pages\CustomerController::class,'customerLogin'])->name('customer.login');
        Route::post('registration',[App\Http\Controllers\frontend\pages\CustomerController::class,'customerRegistration'])->name('customer.registration');
    });

    Route::middleware(['auth:web'])->group(function(){

        
        
        

        Route::get('logout',[App\Http\Controllers\frontend\pages\CustomerController::class,'customerLogout'])->name('customer.logout');
        // checkout
        Route::get('checkout',[App\Http\Controllers\frontend\pages\BillingController::class, 'index'])->name('checkout');
        });
        Route::post('order/store',[App\Http\Controllers\frontend\pages\BillingController::class, 'orderStore'])->name('order.store');
        Route::get('order/success',[App\Http\Controllers\frontend\pages\BillingController::class, 'orderSuccess'])->name('order.success');
        Route::get('order/{id}',[App\Http\Controllers\frontend\pages\CustomerController::class, 'orderView'])->name('order.view');
        Route::get('order/pdf/{id}',[App\Http\Controllers\frontend\pages\CustomerController::class, 'orderedPdf'])->name('orderedPdf');
        Route::post('order/tracking',[App\Http\Controllers\frontend\pages\CustomerController::class, 'orderTrack'])->name('order.track');

        // profile
        Route::get('order-detail/{id}',[App\Http\Controllers\frontend\pages\CustomerController::class, 'orderDetail'])->name('order.detail');
        Route::post('profile/view',[App\Http\Controllers\frontend\pages\CustomerController::class, 'profileView'])->name('profile.view');


});

        
        
// frontend routes
Route::get('/',[App\Http\Controllers\frontend\pages\HomeController::class,'index'])->name('frontend');
Route::get('mail',function(){
    return view('frontend.mail.customer-verify-mail');
});
//email verify
Route::get('/customer-verify-form/{id}',[App\Http\Controllers\frontend\pages\CustomerController::class,'verifyForm']);
Route::post('customer-verify',[App\Http\Controllers\frontend\pages\CustomerController::class,'verify'])->name('customer.verify');
Route::get('/category/product/{slug}',[App\Http\Controllers\frontend\pages\HomeController::class,'CategoryProduct']);
Route::get('/shop',[App\Http\Controllers\frontend\pages\HomeController::class,'shopProduct']);

Route::get('/product/detail/{slug}',[App\Http\Controllers\frontend\pages\SingleProduct::class,'SingleProduct']);
Route::get('add-product-card',[App\Http\Controllers\frontend\pages\SingleProduct::class,'addCard'])->name('detail.add.card');
Route::get('order-now',[App\Http\Controllers\frontend\pages\SingleProduct::class,'orderNow'])->name('order.detail.page');
Route::get('wishlist',[App\Http\Controllers\frontend\pages\SingleProduct::class,'wishlist'])->name('wishlist.detail.page');
Route::post('store/review',[App\Http\Controllers\frontend\pages\ReviewController::class,'store'])->name('store.review');



// carts
Route::get('view/cart', [App\Http\Controllers\frontend\pages\CartController::class,'index'])->name('cart.index');
Route::post('add/cart',[App\Http\Controllers\frontend\pages\CartController::class,'store'])->name('add.cart');
Route::post('cart-item/destroy',[App\Http\Controllers\frontend\pages\CartController::class, 'destroy'])->name('cart.delete');
Route::post('cart/update',[App\Http\Controllers\frontend\pages\CartController::class, 'update'])->name('cart.update');
Route::post('add/coupon',[App\Http\Controllers\frontend\pages\CartController::class, 'addCoupon'])->name('add.coupon');

//wish list
Route::get('view/wish',[App\Http\Controllers\frontend\pages\WishListController::class, 'index'])->name('wish.index');
Route::post('add/wish',[App\Http\Controllers\frontend\pages\WishListController::class, 'store'])->name('add.wish');
Route::post('move/cart', [App\Http\Controllers\frontend\pages\WishListController::class, 'move'])->name('move.cart');
Route::post('wish/destroy', [App\Http\Controllers\frontend\pages\WishListController::class, 'destroy'])->name('wish.destroy');

// shipping charge
Route::post('free/shipping',[App\Http\Controllers\frontend\pages\BillingController::class, 'freeShipping'])->name('free.shipping');
Route::post('standart/shipping',[App\Http\Controllers\frontend\pages\BillingController::class, 'standartShipping'])->name('standart.shipping');
Route::post('express/shipping',[App\Http\Controllers\frontend\pages\BillingController::class, 'expressShipping'])->name('express.shipping');



// shop pages
Route::get('shop',[App\Http\Controllers\frontend\pages\ShopController::class, 'shop'])->name('shop');

Route::post('shop-filter',[App\Http\Controllers\frontend\pages\ShopController::class, 'shopFilter'])->name('shop.filter');
Route::get('search',[App\Http\Controllers\frontend\pages\ShopController::class, 'searchProduct'])->name('search');
Route::get('category={slug}',[App\Http\Controllers\frontend\pages\ShopController::class, 'categoryByProduct'])->name('category.product');

// currency
Route::post('currency-change',[App\Http\Controllers\frontend\pages\HomeController::class, 'currencyChange'])->name('currency.change');



// frontend routes


    Auth::routes();


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// admin

Route::prefix('admin')->group(function(){
    // admin guest routes
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
        Route::get('login',[\App\Http\Controllers\backend\admin\LoginController::class,'loginForm'])->name('admin.login.form');
        Route::post('login',[\App\Http\Controllers\backend\admin\LoginController::class,'adminLogin'])->name('admin.login');
    });
    // admin autenticate routes
    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::post('logout',[\App\Http\Controllers\backend\admin\LoginController::class,'destroy'])->name('admin.logout');
        Route::get('dashboard',[\App\Http\Controllers\backend\admin\AdminController::class,'index'])->name('admin.dashboard');

    // banner
    Route::resource('banner',\App\Http\Controllers\backend\admin\BannerController::class);
    Route::post('banner-status',[\App\Http\Controllers\backend\admin\BannerController::class,'bannerStatus'])->name('banner.status');

    // category
    Route::resource('category',\App\Http\Controllers\backend\admin\CategoryController::class);
    Route::post('category-status',[\App\Http\Controllers\backend\admin\CategoryController::class,'categoryStatus'])->name('category.status');
    

    // sub category
    Route::resource('subcategory',\App\Http\Controllers\backend\admin\SubCategoryController::class);
    Route::post('sub-category-status',[\App\Http\Controllers\backend\admin\SubCategoryController::class,'SubCategoryStatus'])->name('sub.category.status');
    Route::post('category/child/{id}',[\App\Http\Controllers\backend\admin\SubCategoryController::class,'chidCategory']);
    // grand child category
    Route::resource('grand-child-category',\App\Http\Controllers\backend\admin\GrandChildController::class);
    
    Route::post('grand-child-category-status',[\App\Http\Controllers\backend\admin\GrandChildController::class,'GrandChildCategoryStatus'])->name('grand.child.category.status');
    Route::post('category/grand-child/{id}',[\App\Http\Controllers\backend\admin\GrandChildController::class,'childByGrandChild']);
    // brand
    Route::resource('brand',\App\Http\Controllers\backend\admin\BrandController::class);
    Route::post('brand-status',[\App\Http\Controllers\backend\admin\BrandController::class,'brandStatus'])->name('brnad.status');
    // size
    Route::resource('size',\App\Http\Controllers\backend\admin\SizeController::class);
    
    Route::post('size-status',[\App\Http\Controllers\backend\admin\SizeController::class,'sizeStatus'])->name('size.status');

    // color
    Route::resource('color',\App\Http\Controllers\backend\admin\ColorController::class);
    
    Route::post('color-status',[\App\Http\Controllers\backend\admin\ColorController::class,'colorStatus'])->name('color.status');

    // section 
    Route::resource('section',\App\Http\Controllers\backend\admin\SectionController::class);
    Route::post('section-status',[\App\Http\Controllers\backend\admin\SectionController::class,'sectionStatus'])->name('section.status');
    // product
    Route::resource('product',\App\Http\Controllers\backend\admin\ProductController::class);
    Route::post('product-status',[\App\Http\Controllers\backend\admin\ProductController::class,'productStatus'])->name('product.status');
    Route::get('product-view/{id}',[\App\Http\Controllers\backend\admin\ProductController::class,'productView'])->name('product.view');
    // delete single by multi image
    Route::get('delete-product-image/{mulit_id}/{product_id}',[\App\Http\Controllers\backend\admin\ProductController::class,'deleteSingleMltiImage'])->name('delete.single.image');
    Route::get('delete-view-image/{mulit_id}/{product_id}',[\App\Http\Controllers\backend\admin\ProductController::class,'deleteSingleViewImage']);
    // product attributes
    Route::get('add-mutiple-product/{id}',[\App\Http\Controllers\backend\admin\ProductAttributesController::class,'addMultiProduct'])->name('add.multi.product');
    Route::post('store-product-attribute/{id}',[\App\Http\Controllers\backend\admin\ProductAttributesController::class,'productAttibuteStore'])->name('product.attribute.store');
    Route::post('delete-attribute',[\App\Http\Controllers\backend\admin\ProductAttributesController::class,'attributeDestroy'])->name('product.attribute.destroy');

    // currency
    Route::resource('currency',\App\Http\Controllers\backend\admin\CurrencyController::class);
    
    Route::post('currency-status',[\App\Http\Controllers\backend\admin\CurrencyController::class,'currencyStatus'])->name('currency.status');

    // orders
    Route::get('order-detail/{id}',[App\Http\Controllers\backend\admin\OrderController::class, 'adminOrderDetail'])->name('admin.order.detail');
    Route::post('change-order-status',[\App\Http\Controllers\backend\admin\OrderController::class,'changeOrderStatus'])->name('change.order.status');
    Route::post('order-destroy',[\App\Http\Controllers\backend\admin\OrderController::class,'orderDestroy'])->name('order.destroy');
    Route::get('orders',[App\Http\Controllers\backend\admin\OrderController::class, 'index'])->name('order.index');
    Route::get('today-orders',[App\Http\Controllers\backend\admin\OrderController::class, 'todayOrder'])->name('today.orders');
    Route::get('download-admin-order/{id}',[App\Http\Controllers\backend\admin\OrderController::class, 'downloadOrderAdmin'])->name('downoad.admin.order');

    // coupon
    Route::resource('coupon',\App\Http\Controllers\backend\admin\CouponController::class);
    Route::post('coupon-status',[\App\Http\Controllers\backend\admin\CouponController::class,'couponStatus'])->name('coupon.status');
    
    // setting
    Route::get('setting',[\App\Http\Controllers\backend\admin\SettingController::class,'index'])->name('setting');
    Route::get('setting-edit',[\App\Http\Controllers\backend\admin\SettingController::class,'edit'])->name('setting.edit');

    // review
    Route::get('product-review',[\App\Http\Controllers\frontend\pages\ReviewController::class,'review'])->name('review');
    Route::get('review-edit/{id}',[\App\Http\Controllers\frontend\pages\ReviewController::class,'edit'])->name('review.edit');
    Route::post('review-update/{id}',[\App\Http\Controllers\frontend\pages\ReviewController::class,'update'])->name('review.update');
    Route::post('review-destroy',[\App\Http\Controllers\frontend\pages\ReviewController::class,'destroy'])->name('review.destroy');
    // dropzone 
    Route::get('dropzone',[\App\Http\Controllers\backend\admin\MultiProduct::class,'dropZoneView']);
    Route::post('image/upload/store',[\App\Http\Controllers\backend\admin\MultiProduct::class,'TempImgStore'])->name('temp.store');
    Route::post('image/delete',[\App\Http\Controllers\backend\admin\MultiProduct::class,'TempImgDestroy'])->name('temp.destroy');

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
});



//seller guest routes
Route::prefix('seller')->group(function(){
    Route::middleware(['guest:seller','PreventBackHistory'])->group(function(){
        Route::get('login',[App\Http\Controllers\backend\seller\LoginController::class,'LoginForm'])->name('seller.login.form');
        Route::post('login',[App\Http\Controllers\backend\seller\LoginController::class,'sellerLogin'])->name('seller.login');
    });
});

// seller authected routes
Route::prefix('seller')->group(function(){
    Route::middleware(['auth:seller','PreventBackHistory'])->group(function(){
        Route::get('dashboard',[App\Http\Controllers\backend\seller\DashboardController::class,'index'])->name('seller.dashboard');
        Route::post('logout',[App\Http\Controllers\backend\seller\LoginController::class,'logout'])->name('seller.logout');
    // product
    Route::resource('products',\App\Http\Controllers\backend\seller\ProductController::class);
    
    // Route::get('product-view/{id}',[\App\Http\Controllers\backend\seller\ProductController::class,'productView'])->name('product.view');
    // // delete single by multi image
    // Route::get('delete-product-image/{mulit_id}/{product_id}',[\App\Http\Controllers\backend\admin\ProductController::class,'deleteSingleMltiImage'])->name('delete.single.image');
    // Route::get('delete-view-image/{mulit_id}/{product_id}',[\App\Http\Controllers\backend\admin\ProductController::class,'deleteSingleViewImage']);
    // // product attributes
    // Route::get('add-mutiple-product/{id}',[\App\Http\Controllers\backend\admin\ProductAttributesController::class,'addMultiProduct'])->name('add.multi.product');
    // Route::post('store-product-attribute/{id}',[\App\Http\Controllers\backend\admin\ProductAttributesController::class,'productAttibuteStore'])->name('product.attribute.store');
    // Route::post('delete-attribute',[\App\Http\Controllers\backend\admin\ProductAttributesController::class,'attributeDestroy'])->name('product.attribute.destroy');
    });
});

