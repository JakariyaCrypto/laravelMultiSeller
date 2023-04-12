@extends('frontend/layouts/master')
@section('title','NS Mart')
@section('content')
<main class="main">
            <div class="intro-slider-container">
                <div class="intro-slider owl-carousel owl-simple owl-nav-inside" data-toggle="owl" data-owl-options='{
                        "nav": false,
                        "responsive": {
                            "992": {
                                "nav": true
                            }
                        }
                    }'>
                    <div class="intro-slide" style="background-image: url('{{asset('frontend/assets/images/demos/demo-13/slider/slide-3.jpg')}}')">
                        <div class="container intro-content">
                            <div class="row">
                                <div class="col-auto offset-lg-3 intro-col">
                                    <h3 class="intro-subtitle">Trade-In Offer</h3><!-- End .h3 intro-subtitle -->
                                    <h1 class="intro-title">MacBook Air <br>Latest Model
                                        <span>
                                            <sup class="font-weight-light">from</sup>
                                            <span class="text-primary">$999<sup>,99</sup></span>
                                        </span>
                                    </h1><!-- End .intro-title -->

                                    <a href="category.html" class="btn btn-outline-primary-2">
                                        <span>Shop Now</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </a>
                                </div><!-- End .col-auto offset-lg-3 -->
                            </div><!-- End .row -->
                        </div><!-- End .container intro-content -->
                    </div><!-- End .intro-slide -->

                    <div class="intro-slide" style="background-image: url('{{asset('frontend/assets/images/demos/demo-13/slider/slide-2.jpg')}}')">
                        <div class="container intro-content">
                            <div class="row">
                                <div class="col-auto offset-lg-3 intro-col">
                                    <h3 class="intro-subtitle">Trevel & Outdoor</h3><!-- End .h3 intro-subtitle -->
                                    <h1 class="intro-title">Original Outdoor <br>Beanbag
                                        <span>
                                            <sup class="font-weight-light line-through">$89,99</sup>
                                            <span class="text-primary">$29<sup>,99</sup></span>
                                        </span>
                                    </h1><!-- End .intro-title -->

                                    <a href="category.html" class="btn btn-outline-primary-2">
                                        <span>Shop Now</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </a>
                                </div><!-- End .col-auto offset-lg-3 -->
                            </div><!-- End .row -->
                        </div><!-- End .container intro-content -->
                    </div><!-- End .intro-slide -->

                    <div class="intro-slide" style="background-image: url('{{asset('frontend/assets/images/demos/demo-13/slider/slide-3.jpg')}}')">
                        <div class="container intro-content">
                            <div class="row">
                                <div class="col-auto offset-lg-3 intro-col">
                                    <h3 class="intro-subtitle">Fashion Promotions</h3><!-- End .h3 intro-subtitle -->
                                    <h1 class="intro-title">Tan Suede <br>Biker Jacket
                                        <span>
                                            <sup class="font-weight-light line-through">$240,00</sup>
                                            <span class="text-primary">$180<sup>,99</sup></span>
                                        </span>
                                    </h1><!-- End .intro-title -->

                                    <a href="category.html" class="btn btn-outline-primary-2">
                                        <span>Shop Now</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </a>
                                </div><!-- End .col-auto offset-lg-3 -->
                            </div><!-- End .row -->
                        </div><!-- End .container intro-content -->
                    </div><!-- End .intro-slide -->
                </div><!-- End .owl-carousel owl-simple -->

                <span class="slider-loader"></span><!-- End .slider-loader -->
            </div><!-- End .intro-slider-container -->

            <div class="mb-4"></div><!-- End .mb-2 -->

            <div class="container">
                <h2 class="title text-center mb-2">Explore Popular Categories</h2><!-- End .title -->

                <div class="cat-blocks-container">
                    <div class="row">
                        @foreach(\App\Models\backend\admin\Category::where('status','active')->orderBy('id','desc')->get() as $cat)
                        <div class="col-6 col-sm-4 col-lg-2">
                            <script>
                                
                            </script>
                            <a href="{{url('category')}}={{$cat->slug}}" class="cat-block">
                                <figure>
                                    <span>
                                        <img src="{{asset($cat->photo)}}" alt="Category image">
                                    </span>
                                </figure>

                                <h3 class="cat-block-title">{{$cat->name}}</h3><!-- End .cat-block-title -->
                            </a>
                            
                        </div><!-- End .col-sm-4 col-lg-2 -->
                        @endforeach
                    </div><!-- End .row -->

                </div><!-- End .cat-blocks-container -->
            </div><!-- End .container -->

            <div class="mb-2"></div><!-- End .mb-2 -->

            <div class="container">
                <div class="row">
                    @foreach(\App\Models\backend\admin\Banner::where(['status'=>'active','conditional'=>'banner'])->take(2)->orderBy('id','desc')->get() as $banner)
                    <div class="col-sm-6 col-lg-6">
                        <div class="banner banner-overlay">
                            <a href="#">
                                <img src="{{asset($banner->photo)}}" alt="Banner">
                            </a>

                            <div class="banner-content">
                                <h4 class="banner-subtitle text-white"><a href="#">{{$banner->condition}}</a></h4><!-- End .banner-subtitle -->
                                <h3 class="banner-title text-white"><a href="#">{{$banner->title}} <br><span>25% off</span></a></h3><!-- End .banner-title -->
                                <a href="#" class="banner-link">Shop Now <i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div><!-- End .col-lg-3 -->
                    @endforeach
                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="mb-3"></div><!-- End .mb-3 -->
            
            

            <div class="mb-3"></div><!-- End .mb-3 -->

           <div class="bg-light pt-3 pb-5">
                <div class="container">
                    <div class="heading heading-flex heading-border mb-3">
                        <div class="heading-left">
                            <h2 class="title">New Arrival Products</h2><!-- End .title -->
                        </div><!-- End .heading-left -->
                        <div class="heading-right">
                            <a href="">See All Products</a>
                        </div>
                    </div><!-- End .heading -->

                    <div class="tab-content tab-content-carousel">
                        <div class="tab-pane p-0 fade show active" id="hot-all-tab" role="tabpanel" aria-labelledby="hot-all-link">
                            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                                data-owl-options='{
                                    "nav": false, 
                                    "dots": true,
                                    "margin": 20,
                                    "loop": false,
                                    "responsive": {
                                        "0": {
                                            "items":2
                                        },
                                        "480": {
                                            "items":2
                                        },
                                        "768": {
                                            "items":3
                                        },
                                        "992": {
                                            "items":4
                                        },
                                        "1280": {
                                            "items":5,
                                            "nav": true
                                        }
                                    }
                                }'>

                                @foreach(\App\Models\backend\admin\Product::where('condition','new')->get() as $item)
                                <div class="product">
                                    <figure class="product-media">
                                        
                                        <span class="product-label label-sale" style="text-transform: capitalize;">{{$item->condition}}</span>
                                        
                                        <a href="{{url('product/detail')}}/{{$item->slug}}">
                                            <img src="{{asset($item->photo)}}" alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="javascript:void(0)" data-qty="1"
                                            data-product_id="{{$item->id}}" id="add_to_wish_{{$item->id}}" class="btn-product-icon btn-wishlist add_to_wish btn-expandable"><span>add to wishlist</span></a>
                                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <a href="#" data-qty="1" data-product-id="{{$item->id}}"  class="btn-product btn-cart add_to_cart"><span id="add_to_cart{{$item->id}}">add to cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            @foreach(\App\Models\backend\admin\Category::where('id',$item->category_id)->get() as $cat)
                                            <a href="#">{{$cat->name}}</a>
                                            @endforeach
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="{{url('product/detail')}}/{{$item->slug}}">{{$item->name}}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            <span class="new-price">{{App\helper\customHelper::currencyConvert($item->sell_price)}}</span>
                                            <span class="old-price">Was {{App\helper\customHelper::currencyConvert($item->price)}}</span>
                                        </div><!-- End .product-price -->
                                        <?php
                                            $avarage = App\Models\frontend\Review::where('product_id',$item->id)->avg('rating');
                                        ?>
                                        <div class="rating-star">
                                            @for($i=0; $i<5; $i++ )
                                                @if($avarage > $i) 
                                                <img src="{{asset('frontend/assets/images/star.png')}}">
                                                @else
                                                <img src="{{asset('frontend/assets/images/blank_star.png')}}">
                                                @endif
                                            @endfor
                                            <span class="ratings-text">| Review({{(count(App\Models\frontend\Review::where('product_id',$item->id)->get()))}})</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                                @endforeach


                            </div><!-- End .owl-carousel -->
                        </div><!-- .End .tab-pane -->

                    </div><!-- End .tab-content -->
                </div><!-- End .container -->
            </div><!-- End .bg-light pt-5 pb-5 -->

            <div class="mb-3"></div><!-- End .mb-3 -->

            <div class="container">
                <div class="row">
                     @foreach(\App\Models\backend\admin\Banner::where(['status'=>'active','conditional'=>'promo'])->take(2)->orderBy('id','desc')->get() as $banner)
                    <div class="col-lg-6">
                        <div class="banner banner-overlay banner-overlay-light">
                            <a href="#">
                                <img src="{{asset($banner->photo)}}" alt="Banner">
                            </a>

                            <div class="banner-content">
                                <h4 class="banner-subtitle d-none d-sm-block"><a href="#">{{$banner->condition}}</a></h4><!-- End .banner-subtitle -->
                                <h3 class="banner-title"><a href="#">{{$banner->title}}<br/><span class="text-primary">15% off</span></a></h3><!-- End .banner-title -->
                                <a href="#" class="banner-link banner-link-dark">Discover Now <i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div><!-- End .col-lg-6 -->
                    @endforeach

                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="mb-1"></div><!-- End .mb-1 -->
        @foreach(\App\Models\backend\admin\Section::where('status','active')->get() as $section)
           <div class="bg-light pt-3 pb-5">
                <div class="container">
                    <div class="heading heading-flex heading-border mb-3">
                        <div class="heading-left">
                             
                            <h2 class="title">{{$section->name}}</h2>
                            
                            <!-- End .title -->
                        </div><!-- End .heading-left -->

                    </div><!-- End .heading -->

                    <div class="tab-content tab-content-carousel">
                        <div class="tab-pane p-0 fade show active" id="hot-all-tab" role="tabpanel" aria-labelledby="hot-all-link">
                            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                                data-owl-options='{
                                    "nav": false, 
                                    "dots": true,
                                    "margin": 20,
                                    "loop": false,
                                    "responsive": {
                                        "0": {
                                            "items":2
                                        },
                                        "480": {
                                            "items":2
                                        },
                                        "768": {
                                            "items":3
                                        },
                                        "992": {
                                            "items":4
                                        },
                                        "1280": {
                                            "items":5,
                                            "nav": true
                                        }
                                    }
                                }'>

                                @foreach(\App\Models\backend\admin\Product::where(['category_id'=> $section->category_id,'status'=>'active'])->orderBy('id','desc')->get() as $product)
                                <div class="product">
                                    <figure class="product-media">
                                        <span class="product-label label-sale" style="text-transform: capitalize;">{{$product->condition}}</span>
                                        <a href="product.html">
                                            <img src="{{asset($product->photo)}}" alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="javascript:void(0)" data-qty="1"
                                            data-product_id="{{$product->id}}" id="add_to_wish_{{$product->id}}" class="btn-product-icon btn-wishlist add_to_wish btn-expandable"><span>add to wishlist</span></a>
                                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <a href="#" data-qty="1" data-product-id="{{$product->id}}"  class="btn-product btn-cart add_to_cart"><span id="add_to_cart{{$product->id}}">add to cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                             @foreach(\App\Models\backend\admin\Category::where('id',$product->category_id)->get() as $cat)
                                            <a href="#">{{$cat->name}}</a>
                                            @endforeach

                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">{{$product->name}}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            <span class="new-price">{{App\helper\customHelper::currencyConvert($product->sell_price)}}</span>
                                            <span class="old-price">Was {{App\helper\customHelper::currencyConvert($product->price)}}</span>
                                        </div><!-- End .product-price -->
                                        <?php
                                            $avarage = App\Models\frontend\Review::where('product_id',$product->id)->avg('rating');
                                        ?>
                                        <div class="rating-star">
                                            @for($i=0; $i<5; $i++ )
                                                @if($avarage > $i) 
                                                <img src="{{asset('frontend/assets/images/star.png')}}">
                                                @else
                                                <img src="{{asset('frontend/assets/images/blank_star.png')}}">
                                                @endif
                                            @endfor
                                            <span class="ratings-text">| Review({{(count(App\Models\frontend\Review::where('product_id',$item->id)->get()))}})</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->

                                @endforeach

                            </div><!-- End .owl-carousel -->
                        </div><!-- .End .tab-pane -->

                    </div><!-- End .tab-content -->
                </div><!-- End .container -->
            </div><!-- End .bg-light pt-5 pb-5 -->
        @endforeach

        <div class="bg-light pt-3 pb-5">
            <div class="container">
                <div class="heading heading-flex heading-border mb-3">
                    <div class="heading-left">
                        <h2 class="title">Featured Products</h2><!-- End .title -->
                    </div><!-- End .heading-left -->

                </div><!-- End .heading -->

                <div class="tab-content tab-content-carousel">
                    <div class="tab-pane p-0 fade show active" id="hot-all-tab" role="tabpanel" aria-labelledby="hot-all-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1280": {
                                        "items":5,
                                        "nav": true
                                    }
                                }
                            }'>

                            @foreach(\App\Models\backend\admin\Product::where('condition','feature')->get() as $item)
                            <div class="product">
                                <figure class="product-media">
                                    
                                    <span class="product-label label-sale" style="text-transform: capitalize;">{{$item->condition}}</span>
                                    
                                    <a href="product.html">
                                        <img src="{{asset($item->photo)}}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="javascript:void(0)" data-qty="1"
                                        data-product_id="{{$item->id}}" id="add_to_wish_{{$item->id}}" class="btn-product-icon btn-wishlist add_to_wish btn-expandable"><span>add to wishlist</span></a>
                                        <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                        <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action">
                                        <a href="#" data-qty="1" data-product-id="{{$item->id}}"  class="btn-product btn-cart add_to_cart"><span id="add_to_cart{{$item->id}}">add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        @foreach(\App\Models\backend\admin\Category::where('id',$item->category_id)->get() as $cat)
                                        <a href="#">{{$cat->name}}</a>
                                        @endforeach
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="product.html">{{$item->name}}</a></h3><!-- End .product-title -->
                                   
                                    <div class="product-price">
                                            <span class="new-price">{{App\helper\customHelper::currencyConvert($item->sell_price)}}</span>
                                            <span class="old-price">Was {{App\helper\customHelper::currencyConvert($item->price)}}</span>
                                        </div><!-- End .product-price -->
                                    <?php
                                        $avarage = App\Models\frontend\Review::where('product_id',$item->id)->avg('rating');
                                    ?>
                                    <div class="rating-star">
                                        @for($i=0; $i<5; $i++ )
                                            @if($avarage > $i) 
                                            <img src="{{asset('frontend/assets/images/star.png')}}">
                                            @else
                                            <img src="{{asset('frontend/assets/images/blank_star.png')}}">
                                            @endif
                                        @endfor
                                        <span class="ratings-text">| Review({{(count(App\Models\frontend\Review::where('product_id',$item->id)->get()))}})</span>
                                    </div><!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                            @endforeach


                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->

                </div><!-- End .tab-content -->
            </div><!-- End .container -->
        </div><!-- End .bg-light pt-5 pb-5 -->

            <div class="mb-3"></div><!-- End .mb-3 -->

            <div class="container">
                <h2 class="title title-border mb-5">Shop by Brands</h2><!-- End .title -->
                <div class="owl-carousel mb-5 owl-simple" data-toggle="owl" 
                    data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 30,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "420": {
                                "items":3
                            },
                            "600": {
                                "items":4
                            },
                            "900": {
                                "items":5
                            },
                            "1024": {
                                "items":6
                            },
                            "1280": {
                                "items":6,
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>

                     @foreach(\App\Models\backend\admin\Brand::where('status','active')->orderBy('id','desc')->get() as $brand)
                    <a href="#" class="brand">
                        <img src="{{asset($brand->photo)}}" alt="Brand Name">
                    </a>
                    @endforeach
                </div><!-- End .owl-carousel -->
            </div><!-- End .container -->

            <div class="cta cta-horizontal cta-horizontal-box bg-primary">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-2xl-5col">
                            <h3 class="cta-title text-white">Join Our Newsletter</h3><!-- End .cta-title -->
                            <p class="cta-desc text-white">Subcribe to get information about products and coupons</p><!-- End .cta-desc -->
                        </div><!-- End .col-lg-5 -->
                        
                        <div class="col-3xl-5col">
                            <form action="#">
                                <div class="input-group">
                                    <input type="email" class="form-control form-control-white" placeholder="Enter your Email Address" aria-label="Email Adress" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-white-2" type="submit"><span>Subscribe</span><i class="icon-long-arrow-right"></i></button>
                                    </div><!-- .End .input-group-append -->
                                </div><!-- .End .input-group -->
                            </form>
                        </div><!-- End .col-lg-7 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .cta -->

            
        </main><!-- End .main -->

@endsection



