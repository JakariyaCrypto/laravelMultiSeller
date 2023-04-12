

            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <a href="tel:#"><i class="icon-phone"></i>Call: +0123 456 789</a>
                    </div><!-- End .header-left -->

                    <div class="header-right">
                       
                        <div class="dropdown compare-dropdown mr-3">
                                @if(Auth::guard()->user())
                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Compare Products" aria-label="Compare Products">
                                    <i class="icon-user"></i>
                                    <span class="compare-txt">Account</span>
                                </a>
                                <div class="dropdown-menu dropdown-customer">

                                    <div class="profile-actions">
                                        <ul>
                                            <li class="compare-product" title="Profile">
                                            
                                            <h4 class="compare-product-title"><a href="javascript.viod(0)" id="profile_modal" data-profile_id="{{session()->get('customer_id')}}">Profile</a></h4>
                                            </li>
                                        <li class="compare-product">
                                           
                                            <h4 class="compare-product-title"><a href="{{url('customer/order')}}/{{Auth::guard()->user()->id}}">Order</a></h4>
                                        </li>
                                        <li class="compare-product">
                                            
                                            <h4 id="tracking_modal" class="compare-product-title"><a href="javascript:void(0)">Order Tracking</a></h4>
                                        </li>

                                        <li class="compare-product">
                                            <h4 class="compare-product-title"><a href="{{route('customer.logout')}}">Logout</a></h4>
                                        </li>
                                        </ul>
                                        
                                       
                                        
                                    </div>
                                </div><!-- End .dropdown-menu -->
                                @else
                                <a href="{{route('customer.auth')}}" class="dropdown-toggle">
                                    <i class="icon-user"></i>
                                    <span class="compare-txt">Sign in / Sign up</a></span>
                                </a>

                                @endif
                            </div><!-- End .compare-dropdown -->
                            
                        <ul class="top-menu">
                            <li>
                                <a href="#">Links</a>
                                <ul>
                                    <li>
                                        <div class="header-dropdown">
                                            <?php
                                            App\helper\customHelper::currencyLoad();
                                            $currency_name = session('currency_name');
                                            $currency_code = session('currency_code');

                                            if ($currency_name == '') {
                                                if (session()->has('default_currency_info')) {
                                                 $default_currency_info = session('default_currency_info');
                                                 $currency_name = $default_currency_info->name;
                                                 $currency_code = $default_currency_info->code;
                                                }
                                                
                                            }
                                            ?>
                                            <a href="#">
                                                {{\Illuminate\Support\Str::upper($currency_name)}}
                                            </a>
                                            <div class="header-menu">
                                                <ul>
                                                @foreach(\App\Models\backend\admin\Currency::where('status','active')->get() as $currency)
                                                    <li><a href="javascript:void(0)" onclick="currency_change('{{$currency->id}}')">{{\Illuminate\Support\Str::upper($currency->name)}}</a></li>
                                                @endforeach
                                                </ul>
                                            </div><!-- End .header-menu -->
                                        </div><!-- End .header-dropdown -->
                                    </li>
                                    <li>   
                                        <div class="header-dropdown">
                                            <a href="#">Engligh</a>
                                            <div class="header-menu">
                                                <ul>
                                                    <li><a href="#">English</a></li>
                                                    <li><a href="#">French</a></li>
                                                    <li><a href="#">Spanish</a></li>
                                                </ul>
                                            </div><!-- End .header-menu -->
                                        </div><!-- End .header-dropdown -->
                                    </li>
                                    
                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>
                        
                        <a href="{{route('frontend')}}" class="logo">
                            <img src="{{asset('frontend/assets/images/demos/demo-13/logo.png')}}" alt="Molla Logo" width="105" height="25">
                        </a>
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <div class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form id="serchForm" action="{{route('search')}}" method="get">
                                
                                <div class="header-search-wrapper search-wrapper-wide">
                                    <div class="select-custom">
                                       
                                        <select id="srch_cat" name="srch_cat">
                                            <option >All Departments</option>
                                             @foreach(\App\Models\backend\admin\Category::where('status','active')->get() as $cat)
                                             <?php
                                               
                                             ?>
                                            <option value="{{$cat->slug}}" @if(!empty($_GET['srch_cat']) && $_GET['srch_cat'] == $cat->slug) selected @endif>{{$cat->name}}</option>
                                                @foreach(\App\Models\backend\admin\SubCategory::where('category_id',$cat->id)->get() as $subcat)
                                                <option value="{{$subcat->slug}}">- {{$subcat->name}}</option>
                                                @endforeach
                                            
                                        @endforeach
                                        </select>
                                    </div><!-- End .select-custom -->
                                    <label for="input" class="sr-only">Search</label>
                                    <input type="search" class="form-control" name="input" id="input" placeholder="Search product ..." >
                                    <button onclick="event.preventDefault();
                                                     document.getElementById('serchForm').submit();" class="btn btn-primary"><i class="icon-search"></i></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div>

                    <div class="header-right">
                        <div class="header-dropdown-link">
                            <div class="dropdown compare-dropdown">
                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Compare Products" aria-label="Compare Products">
                                    <i class="icon-random"></i>
                                    <span class="compare-txt">Compare</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="compare-products">
                                        <li class="compare-product">
                                            <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                            <h4 class="compare-product-title"><a href="product.html">Blue Night Dress</a></h4>
                                        </li>
                                        <li class="compare-product">
                                            <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                            <h4 class="compare-product-title"><a href="product.html">White Long Skirt</a></h4>
                                        </li>
                                    </ul>

                                    <div class="compare-actions">
                                        <a href="#" class="action-link">Clear All</a>
                                        <a href="#" class="btn btn-outline-primary-2"><span>Compare</span><i class="icon-long-arrow-right"></i></a>
                                    </div>
                                </div><!-- End .dropdown-menu -->
                            </div><!-- End .compare-dropdown -->

                            <a href="{{route('wish.index')}}" class="wishlist-link">
                                <i class="icon-heart-o"></i>
                                <span class="wishlist-count">
                                {{\Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->count()}}
                                </span>
                                <span class="wishlist-txt">Wishlist</span>
                            </a>

                            <div class="dropdown cart-dropdown">
                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                    <i class="icon-shopping-cart"></i>
                                    <span class="cart-count">
                                        {{\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->count()}}
                                    </span>
                                    <span class="cart-txt">Cart</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-cart-products">

                                        <?php
                                            $sum = 0;
                                        ?>
                                        @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)

                                        <?php
                                            $rowTotal = $item->price * $item->qty;
                                        ?>
                                        <?php
                                            $sum=$sum+$rowTotal;
                                        ?>

                                        <div class="product">
                                            <div class="product-cart-details">
                                                <h4 class="product-title">
                                                    <a href="product.html">{{$item->name}}</a>
                                                </h4>
                                                
                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">{{$item->qty}}</span>
                                                    x  {{App\helper\customHelper::currencyConvert($item->price)}}
                                                </span>
                                            </div><!-- End .product-cart-details -->

                                            <figure class="product-image-container">
                                                <a href="product.html" class="product-image" style="height: 60px !important">
                                                    <img src="{{asset($item->model->photo)}}" alt="product">
                                                </a>
                                            </figure>
                                            <a href="#" class="btn-remove rmv_crt_pro" data-id="{{$item->rowId}}" title="Remove Product"><i class="icon-close"></i></a>
                                        </div><!-- End .product -->
                                        @endforeach
                                       
                                    </div><!-- End .cart-product -->


                                    
                                    <div class="dropdown-cart-total">
                                        <span>Total</span>

                                    <span class="cart-total-price">
                                        
                                        @if(session()->has('coupon'))
                                        <?php
                                            $sum = $sum - session('coupon')['value'];
                                        ?>
                                        {{App\helper\customHelper::currencyConvert($sum)}}
                                        @else
                                        
                                        {{App\helper\customHelper::currencyConvert($sum)}}
                                        @endif


                                    </span>
                                    </div><!-- End .dropdown-cart-total -->

                                    <div class="dropdown-cart-action">
                                        <a href="{{route('cart.index')}}" class="btn btn-primary">View Cart</a>
                                    @if(Auth::guard()->user())
                                   <a href="{{route('checkout')}}" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                                    @else
                                    <a href="{{route('customer.auth')}}" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                                    @endif
                                    </div><!-- End .dropdown-cart-total -->
                                </div><!-- End .dropdown-menu -->
                            </div><!-- End .cart-dropdown -->
                        </div>
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->

            <div class="header-bottom sticky-header">
                <div class="container">
                    <div class="header-left">
                        <div class="dropdown category-dropdown show is-on" data-visible="true">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">
                                Browse Categories
                            </a>
                            
                            <div class="dropdown-menu show">
                                <nav class="side-nav">
                                    <ul class="menu-vertical sf-arrows">
                                        @foreach(\App\Models\backend\admin\Category::where('status','active')->get() as $cat)
                                        @if(count(\App\Models\backend\admin\SubCategory::where(['status'=>'active','category_id'=> $cat->id])->get()) > 0)
                                        <li class="megamenu-container">

                                            <a class="sf-with-ul" href="#">{{$cat->name}}</a>

                                            <div class="megamenu">
                                                <div class="row no-gutters">
                                                    <div class="col-md-12">
                                                        <div class="menu-col">
                                                            <div class="row">
                                                                @foreach(\App\Models\backend\admin\SubCategory::where(['status'=>'active','category_id'=> $cat->id])->get() as $subcat)
                                                                <div class="col-md-4">
                                                                    
                                                                    <div class="menu-title"><a href="">{{$subcat->name}}</a></div><!-- End .menu-title -->
                                                                    
                                                                    <ul>
                                                                         @foreach(\App\Models\backend\admin\GrandChildCategory::where(['status'=>'active','sub_cat_id'=> $subcat->id])->get() as $grand_child_cat)
                                                                        <li><a href="#">{{$grand_child_cat->name}}</a></li>
                                                                        @endforeach
                                                                    </ul>

                                                                </div><!-- End .col-md-6 -->
                                                                @endforeach
                                                            </div><!-- End .row -->
                                                        </div><!-- End .menu-col -->
                                                    </div><!-- End .col-md-8 -->

                                                  
                                                </div><!-- End .row -->
                                            </div><!-- End .megamenu -->
                                        </li>
                                        @else
                                        <li><a href="#">{{$cat->name}}</a></li>
                                        @endif
                                       @endforeach
                                        
    
                                    </ul><!-- End .menu-vertical -->
                                </nav><!-- End .side-nav -->
                            </div><!-- End .dropdown-menu -->

                        </div><!-- End .category-dropdown -->
                    </div><!-- End .col-lg-3 -->
                    <div class="header-center">
                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="megamenu-container active">
                                    <a href="{{route('frontend')}}" class="sf-with-ul">Home</a>

                                </li>
                                <li>
                                    <a href="{{route('shop')}}" class="sf-with-ul">Shop</a>

                                </li>
                                <li>
                                    <a href="category.html" class="sf-with-ul">About Us</a>

                                </li>
                                <li>
                                    <a href="category.html" class="sf-with-ul">Term&Condition</a>

                                </li>
                                <li>
                                    <a href="category.html" class="sf-with-ul">Contact us</a>

                                </li>

                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .col-lg-9 -->
                    <div class="header-right">
                        <i class="la la-lightbulb-o"></i><p>Clearance Up to 30% Off</span></p>
                    </div>
                </div><!-- End .container -->
            </div><!-- End .header-bottom -->



        