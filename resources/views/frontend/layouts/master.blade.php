<!DOCTYPE html>
<html lang="en">


<!-- molla/index-13.html  22 Nov 2019 09:59:06 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>@yield('title')</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icons/favicon-16x16.png">
    <link rel="manifest" href="assets/images/icons/site.html">
    <link rel="mask-icon" href="assets/images/icons/safari-pinned-tab.svg" color="#666666">
    <link rel="shortcut icon" href="assets/images/icons/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{asset('frontend/assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/fontawesome-6.0.0/css/all.css')}}">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/plugins/magnific-popup/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/plugins/jquery.countdown.css')}}">

    <link rel="stylesheet" href="{{asset('backend/assets/switch-button-bootstrap/css/bootstrap-switch-button.min.css')}}">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/plugins/nouislider/nouislider.css">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/skins/skin-demo-13.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/demos/demo-13.css')}}">
    @yield('style')
</head>
<style>
.owl-carousel .owl-item img {
    display: block;
    width: 100%;
    height: 150px;
}


.product-image {
    height: 170px !important;
}

.btn-remove {
    box-shadow: 0px 1px 5px -4px gray;
}


.cart-dropdown .btn-remove, .compare-dropdown .btn-remove {
    top: 50% !important;
    right: 0 !important;
    width: 20px !important;
    line-height: 20px;
    text-align: center;
    height: 20px;
    border-radius: 50px;
    box-shadow: 0px 1px 5px -4px gray;
}

.dropdown-customer {
    width: 150px !important;
}


@media (max-width: 400px){
.owl-carousel .owl-item img {
    height: 150px !important;

}
.product-image {
    height: 100px !important;
}


}

@media (max-width: 600px){
.owl-carousel .owl-item img {
    height: 150px !important;
}

.banner-title {
    font-size: 2.4rem;
    text-transform: capitalize;
}

.product-image {
    height: 150px !important;
}

.modal-lg, .modal-xl {
    max-width: 800px !important;
}


}



/* profile */
.profile-content {
    text-align: center;
    padding-bottom: 30px;
}

.pro-banner img {
    width: 100%;
}

.pro-banner{
    position: relative;
    text-align: center;
}

.profile-icon {
    position: absolute;
    top: 126px;
    left: 212px;
}


.profile-icon img {
    border-radius: 100px;
    height: 150px;
    width: 150px;
    line-height: 200px;
    box-shadow:0px 0px 7px .0rem brown;
    border: 4px solid purple;
}

.profile-text h4 {
    font-weight: 700;
    color: #026180;
    text-transform: capitalize;
    margin-top: 25px;
}

.profile-text {
    padding-top: 70px;
}

.profile-item-content {
    display: flex;
    justify-content: center;
    align-items: center;
}

.profile-item {
    border: 1px solid aliceblue;
    box-shadow: 0px 0px 10px .01rem;
    border-radius: 100px;
    height: 100px;
    width: 100px;
    text-align: center;
    margin: 15px;
}

.profile-item h3 {
    margin: 0;
    padding: 0;
    margin-top: 15px;
    font-weight: bold;
    color: purple;
}

.profile-item span {
    color: #202020;
    font-weight: bold;
}

.profile-btn {
    margin: auto;
    cursor: pointer;
    margin-top: 30px;
}

.profile-edit-btn {
    color: white;
    font-weight: bold;
    background: #00b5ee;
    box-sizing: border-box;
    box-shadow: 0px 0px 24px 6px #dddd;
    padding: 10px 59px;
    border-radius: 100px;
}
.modal-body .close {
    position: absolute;
    right: 1.5rem;
    top: 1.5rem;
    z-index: 9999999;
    background: red;
    line-height: 30px;
    width: 30px;
    height: 30px;
    border-radius: 100px;
    color: white;
    font-weight: bold;
    box-sizing: border-box;
    box-shadow: 0px 0px 10px 1px #800080;
}


.profile-btn:hover {
    
}

.profile-edit-btn:hover{
    background: white;
    transition: .3s linear;
    color: purple;
}

.profile-edit {
    padding-left: 20px;
    padding-right: 20px;
    padding-top: 10px;
    padding-bottom: 40px;
}

.custom-header h4 {
    color: white;
    text-transform: uppercase;
}

.custom-header {
    background: #00b5ee;
}

.order-none {
    border: none;
}

.custom-header button {
    background: red;
    line-height: 30px;
    width: 30px;
    height: 30px;
    border-radius: 100px;
    color: white;
    font-weight: bold;
    box-sizing: border-box;
    box-shadow: 0px 0px 10px 1px #800080;
    position: absolute;
    right: 0px;
    top: -1px;
}
.modal-header .close {
    padding: 0px !important;
}


/*rating reviw*/
.rating-star {
    display: flex;
    align-items: center;
}

.rating-star img {
    width: 19px !important;
    height: 18px !important;
}

.review-blank-star{
    display: flex;
}

.rating-star {
    display: flex;
    align-items: center;
}

.ratings-text {
    margin-left: 0px !important;
}


.not-found-imoji img {
    width: 200px;
    margin: 0px auto;
}
.not-found-imoji {
    text-align: center;
}

.not-found-imoji h2 {
    text-transform: capitalize;
    font-weight: bold;
    margin: ;
    padding: 20px 0;
}

.not-found-imoji {
    padding-bottom: 28px;
}

</style>
<body>
    <div class="page-wrapper">
        <header class="header header-10 header-intro-clearance" id="header_ajax">
        @include('frontend/layouts/partials/header')
        </header><!-- End .header -->
        
        @yield('content')
        @include('frontend/layouts/partials/footer')
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container mobile-menu-light">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>
            
            <form action="#" method="get" class="mobile-search">
                <label for="mobile-search" class="sr-only">Search</label>
                <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required>
                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
            </form>

            <ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab" role="tab" aria-controls="mobile-menu-tab" aria-selected="true">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="mobile-cats-link" data-toggle="tab" href="#mobile-cats-tab" role="tab" aria-controls="mobile-cats-tab" aria-selected="false">Categories</a>
                </li>
            </ul>


            <div class="social-icons">
                <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    <!-- Sign in / Register Modal -->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill nav-border-anim" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                    <form action="#">
                                        <div class="form-group">
                                            <label for="singin-email">Username or email address *</label>
                                            <input type="text" class="form-control" id="singin-email" name="singin-email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="singin-password">Password *</label>
                                            <input type="password" class="form-control" id="singin-password" name="singin-password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>LOG IN</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="signin-remember">
                                                <label class="custom-control-label" for="signin-remember">Remember Me</label>
                                            </div><!-- End .custom-checkbox -->

                                            <a href="#" class="forgot-link">Forgot Your Password?</a>
                                        </div><!-- End .form-footer -->
                                    </form>
                                    <div class="form-choice">
                                        <p class="text-center">or sign in with</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-g">
                                                    <i class="icon-google"></i>
                                                    Login With Google
                                                </a>
                                            </div><!-- End .col-6 -->
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-f">
                                                    <i class="icon-facebook-f"></i>
                                                    Login With Facebook
                                                </a>
                                            </div><!-- End .col-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .form-choice -->
                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                    <form action="#">
                                        <div class="form-group">
                                            <label for="register-email">Your email address *</label>
                                            <input type="email" class="form-control" id="register-email" name="register-email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="register-password">Password *</label>
                                            <input type="password" class="form-control" id="register-password" name="register-password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>SIGN UP</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="register-policy" required>
                                                <label class="custom-control-label" for="register-policy">I agree to the <a href="#">privacy policy</a> *</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .form-footer -->
                                    </form>
                                    <div class="form-choice">
                                        <p class="text-center">or sign in with</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-g">
                                                    <i class="icon-google"></i>
                                                    Login With Google
                                                </a>
                                            </div><!-- End .col-6 -->
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login  btn-f">
                                                    <i class="icon-facebook-f"></i>
                                                    Login With Facebook
                                                </a>
                                            </div><!-- End .col-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .form-choice -->
                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->
<!-- newsletter-popup-form -->
    <div class="container newsletter-popup-container mfp-hide" id="">  <!-- newsletter-popup-form -->

        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row no-gutters bg-white newsletter-popup-content">
                    <div class="col-xl-3-5col col-lg-7 banner-content-wrap">
                        <div class="banner-content text-center">
                            <img src="assets/images/popup/newsletter/logo.png" class="logo" alt="logo" width="60" height="15">
                            <h2 class="banner-title">get <span>25<light>%</light></span> off</h2>
                            <p>Subscribe to the Molla eCommerce newsletter to receive timely updates from your favorite products.</p>
                            <form action="#">
                                <div class="input-group input-group-round">
                                    <input type="email" class="form-control form-control-white" placeholder="Your Email Address" aria-label="Email Adress" required>
                                    <div class="input-group-append">
                                        <button class="btn" type="submit"><span>go</span></button>
                                    </div><!-- .End .input-group-append -->
                                </div><!-- .End .input-group -->
                            </form>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                                <label class="custom-control-label" for="register-policy-2">Do not show this popup again</label>
                            </div><!-- End .custom-checkbox -->
                        </div>
                    </div>
                    <div class="col-xl-2-5col col-lg-5 ">
                        <img src="assets/images/popup/newsletter/img-1.jpg" class="newsletter-img" alt="newsletter">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- profile view-modal -->
    <div class="modal fade" id="profile-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>
                    
                    <div class="profile-content">
                       <div class="pro-banner">
                          <img src="{{asset('frontend/assets/images/custom_img/profile_bg3.jpg')}}"> 
                        </div>
                        <div class="profile-icon">
                            <img src="{{asset('frontend/assets/images/custom_img/profile_avatar.jpg')}}">
                        </div>
                        <div class="profile-text">
                            <h4>{{session()->get('customer_name')}}</h4>
                            <span>{{session()->get('customer_email')}}</span>

                            <strong><h6> <i class="icon-rocket"></i> {{session()->get('customer_city')}},{{session()->get('customer_country')}}</h6></strong>

                            <strong><h3>Customer</h3></strong>
                        </div>
                        @if(session()->has('profile_check'))
                        <div class="profile-item-content">
                            <div class="profile-item">
                                <h3>{{count(session()->get('total_count'))}}</h3>
                                <span>Total</span>
                            </div>
                            <div class="profile-item">
                                <h3>{{count(session()->get('total_pending'))}}</h3>
                                <span>Pandding</span>
                            </div>
                            <div class="profile-item">
                                <h3>{{count(session()->get('total_success'))}}</h3>
                                <span>Success</span>
                            </div>
                        </div>
                        @endif
                            <div class="profile_location">
                                <p><i class="icon-map"></i></p>
                            </div>
                        <div class="profile-btn">
                            <a href="javascript:void(0)" id="edit_profile_form" class="profile-edit-btn"><i class="icon-pencil"></i>Edit</a>
                        </div>
                       </div>
                    </div><!-- End .form-box -->
                   
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->


<!-- profile edit-modal -->
    <div class="modal fade" id="profile-edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4><strong>Edit Profile </strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                
                    <div class="profile-edit">
                        <h2 class="checkout-title">Profile Details</h2><!-- End .checkout-title -->
                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Full Name *</label>
                                    <input type="text" class="form-control" value="{{session()->get('customer_name')}}" id="name" name="name">
                                    @error('name')
                                    <div class="alert alert-danger">
                                        <span>Name Field is Required</span>
                                    </div>
                                @enderror
                                </div><!-- End .col-sm-6 -->
                                
                                <div class="col-sm-6">
                                    <label>Email address *</label>
                                    <input type="email" class="form-control" required="" value="{{session()->get('customer_email')}}" id="email" name="email">
                                    @error('email')
                                    <div class="alert alert-danger">
                                        <span>E-mail Field is Required</span>
                                    </div>
                                @enderror
                                </div><!-- End .col-sm-6 -->
                                
                            </div><!-- End .row -->


                            <label>Street address *</label>
                            <input type="text" class="form-control" placeholder="House number and Street name" name="address1" id="address1">
                            <input type="text" class="form-control" placeholder="Appartments, suite, unit etc ..." value="" name="address2" id="address2">

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>State / County *</label>
                                    <input type="text" class="form-control" name="country" id="country">
                                </div><!-- End .col-sm-6 -->
                                <div class="col-sm-6">
                                    <label>Town / City *</label>
                                    <input type="text" class="form-control" name="city" id="city">
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Postcode / ZIP *</label>
                                    <input type="text" class="form-control" name="zip_code" id="zip_code">
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Phone *</label>
                                    <input type="tel" class="form-control" id="phone" value="" name="phone">
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->
                            <div class="form-group">
                                <label for="singin-password">Password *</label>
                                <input type="text" class="form-control" id="password" name="password" required value="{{session()->get('customer_pwd')}}">
                                <!-- <span>{{session()->get('customer_pwd')}}</span> -->
                            </div><!-- End .form-group -->
                            <div class="profile-btn">
                                <a href="javascript:void(0)" id="edit_profile_form" class="profile-edit-btn"><i class="icon-pencil"></i>Update</a>
                            </div>
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->


<!-- profile edit-modal -->
    <div class="modal fade" id="order-tracking-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header custom-header">
                    <h4><strong>Order Tracking </strong></h4>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="profile-edit">
                        <form action="{{route('order.track')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>ORDER ID * </label>
                                    <input type="text" class="form-control" name="order_id" placeholder="ORD-JFKDUEEJE">
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <div class="profile-btn">
                                <button type="submit" class="profile-edit-btn order-none"><i class="icon-search"></i>Tracking</button>
                            </div>
                        </form>
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->


    <!-- Plugins JS File -->
    <script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.hoverIntent.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/superfish.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/bootstrap-input-spinner.js')}}"></script>
    <script src="{{asset('frontend')}}/assets/js/jquery.elevateZoom.min.js"></script>
    <script src="{{asset('frontend/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery-ui.js')}}"></script>
    <script src="{{asset('frontend/assets/js/wNumb.js')}}"></script>
    
    <script src="{{asset('frontend/assets/js/jquery.plugin.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.countdown.min.js')}}"></script>

    <script src="{{asset('backend/assets/sweetalert/sweetalert.min.js')}}"></script>
    <!-- Main JS File -->
    <script src="{{asset('frontend/assets/js/main.js')}}"></script>
    <script src="{{asset('frontend/assets/js/demos/demo-13.js')}}"></script>




    @yield('script')

    <script>
        // change currency
function currency_change(id){
    $.ajax({
        type: "POST",
        url: "{{route('currency.change')}}",
        data: {
            currency_id:id,
            _token: "{{csrf_token()}}",
        },
        success:function(data){
            if (data.status == 'success') {
                location.reload();
            }else{
                alert('something wrong');
            }
        }
    });
}


        $(document).on('click','.rmv_crt_pro', function(e){
            e.preventDefault();
            var pro_id = $(this).data('id');

            var path = "{{route('cart.delete')}}";
            var token = "{{csrf_token()}}";
             swal({
                  title: "Are you sure?",
                  text: "Delete the Brand",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                    
                  if (willDelete) {

                    $.ajax({
                        url: path,
                        type: 'post',
                        dataType: 'JSON',
                        token: token,
                        data:{
                            product_id: pro_id,
                            _token: token, 
                        },
                        success: function(data){

                            $('body #header_ajax').html(data['header']);
                            $('body #cart_list').html(data['cart_list']);
                            
                        },
                        error: function(er){
                            console.log(er);
                        }
                    });

                    swal("Done! Cart Product Delete Successfull!", {
                      icon: "success",
                    });
              }
            });


            
        });

  // add to cart
$(document).on('click','.add_to_cart',function(e){
    e.preventDefault();
    var product_id = $(this).data('product-id');
    var product_qty = $(this).data('qty');
    // alert(product_qty);
    var token = "{{csrf_token()}}";
    var path = "{{route('add.cart')}}";

    $.ajax({
        url: path,
        type: "POST",
        dataType: 'JSON',
        data:{
            product_id: product_id,
            product_qty: product_qty,
            _token: token,
        },
        beforeSend:function(){
            // alert(product_id);
            $('#add_to_cart'+product_id).html('Adding...');
        },
        complete:function(){
            $('#add_to_cart'+product_id).html('add to cart');
        },
        success:function(data){
            $('body #header_ajax').html(data['header']);
            swal({
              title: "Success!",
              text: "Product Added to Cart!",
              icon: "success",
              button: "Ok!",
            });


            console.log(data);
        }
    });
})



// add to wish list
$(document).on('click','.add_to_wish',function(e){
    e.preventDefault();
    // get qty and product id 
    var product_id = $(this).data('product_id');
    var product_qty = $(this).data('qty');

    var token = "{{csrf_token()}}";
    var path = "{{route('add.wish')}}";

    $.ajax({
        type: "POST",
        url: path,
        dataType: 'JSON',
        data: {
            _token: token,
            product_id: product_id,
            qty: product_qty,
        },
        beforeSend:function(){
            $('#add_to_wish_'+product_id).html('...');
        },
        complete: function(){
            $('#add_to_wish_'+product_id).html('<i class="fas fa-bars"></i>');
        },
        success: function(data){
            if (data['status']) {
                $('body #header_ajax').html(data['header']);
                $('.wishlist-count').html(data['wish_count'])
                swal({
                  title: "Success!",
                  text: data['message'],
                  icon: "success",
                  button: "Ok!",
                });
            }else if(data['present']){
                 $('body #header_ajax').html(data['header']);
                swal({
                  title: "Warning!",
                  text: data['message'],
                  icon: "warning",
                  button: "Ok!",
                });
            }else{
                swal({
                  title: "Warning!",
                  text: data['message'],
                  icon: "error",
                  button: "Ok!",
                });
            }
        }
    });

});



$(document).on('click','#profile_modal',function(e){
    e.preventDefault();
    var customer_id = $(this).data('profile_id');

    $('#profile-modal').modal('show');

    var token = "{{csrf_token()}}";
    var url = "{{route('profile.view')}}";
    $.ajax({
        type: "POST",
        url: url,
        data:{
            customer_id:customer_id,
            _token:token,
        },
        success:function(data){
            console.log(data);
        }
    });

})


$(document).on('click','#edit_profile_form',function(e){
    e.preventDefault();
    $('#profile-modal').modal('hide');
    alert('ok');
    $('#profile-edit-modal').modal('show');
});


$(document).on('click','#tracking_modal',function(e){
    e.preventDefault();
    $('#order-tracking-modal').modal('show');
});




</script>





</body>


<!-- molla/index-13.html  22 Nov 2019 09:59:31 GMT -->
</html>