@extends('frontend/layouts/master')
@section('title','NS Mart | Product Details')

@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('frontend')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">Extended Description</li>
            </ol>

        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="product-details-top mb-2">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-gallery">
                            <figure class="product-main-image">
                                <img id="product-zoom" src="{{asset($product[0]->photo)}}" data-zoom-image="{{asset($product[0]->photo)}}" alt="product image">

                                <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                    <i class="icon-arrows"></i>
                                </a>
                            </figure><!-- End .product-main-image -->

                            <div id="product-zoom-gallery" class="product-image-gallery">
                            @foreach(\App\Models\backend\admin\MutliProductImg::where('product_id',$product[0]->id)->get() as $mulImg)

                                <a class="product-gallery-item" href="#" data-image="{{asset('/upload/temp/'.$mulImg->file)}}" data-zoom-image="{{asset('/upload/temp/'.$mulImg->file)}}">
                                    <img src="{{asset('/upload/temp/'.$mulImg->file)}}" alt="product side">
                                </a>
                                @endforeach
                              

                            </div><!-- End .product-image-gallery -->
                        </div><!-- End .product-gallery -->
                    </div><!-- End .col-md-6 -->

                    <div class="col-md-6">
                        <div class="product-details">
                            <h1 class="product-title">{{$product[0]->name}}</h1><!-- End .product-title -->
                            
                            
                            <?php
                            $avarage = App\Models\frontend\Review::where('product_id',$product[0]->id)->avg('rating');
                            ?>
                        
                            <div class="rating-star">
                                @for($i=0; $i<5; $i++ )
                                    @if($avarage > $i) 
                                    <img src="{{asset('frontend/assets/images/star.png')}}">
                                    @else
                                        <img src="{{asset('frontend/assets/images/blank_star.png')}}">
                                    @endif
                                @endfor
                                <span>| Review({{(count(App\Models\frontend\Review::where('product_id',$product[0]->id)->get()))}})</span>
                            </div><!-- End .rating-container -->

                            <div class="product-price">
                                {{$product[0]->sell_price}} ট
                            </div><!-- End .product-price -->

                            <div class="product-content">
                                <p>{{$product[0]->description}}</p>
                            </div><!-- End .product-content -->
                            
                            <div class="details-filter-row details-row-size">
                                <label>Color:</label>

                                <div class="product-nav product-nav-dots">
                                @if(count(\App\Models\backend\admin\ProductAttribute::where('product_id',$product[0]->id)->get()) > 0)
                                    @foreach(\App\Models\backend\admin\ProductAttribute::where('product_id',$product[0]->id)->get() as $color)
                                    
                                    <a href="javascript:void(0)" onclick="select_color('{{$color->id}}')" data-active_color="active_{{$color->id}}" class="inactive" style="background: #{{$color->color}};background: {{$color->color}}"><span class="sr-only">Color name</span></a>
                                  @endforeach
                                  @else
                                  <!--  get only single product color when attributes is empty-->
                                    <?php
                                        $product_color = \App\Models\backend\admin\Color::where('id',$product[0]->color_id)->get();
                                    ?>
                                    <a href="javascript:void(0)" onclick="select_color('{{$product_color[0]->id}}')" data-active_color="active_{{$product_color[0]->id}}" class="inactive" style="background: #{{$product_color[0]->color}};background: {{$product_color[0]->color}}"><span class="sr-only">Color name</span></a>
                                    @endif
                                </div><!-- End .product-nav -->
                            </div><!-- End .details-filter-row -->
                            
                            <div class="details-filter-row details-row-size">
                                <label for="size">Size:</label>
                                <div class="select-custom">
                                    <select name="size_id" id="size_id" class="form-control"">
                                        <option value="" selected="selected">Select a size</option>
                                        @if(count(\App\Models\backend\admin\ProductAttribute::where('product_id',$product[0]->id)->get()) > 0)
                                         @foreach(\App\Models\backend\admin\ProductAttribute::where('product_id',$product[0]->id)->get() as $size)
                                        <option value="{{$size->id}}">{{$size->size}}</option>
                                        @endforeach
                                        @else
                                        <?php
                                            $product_color = \App\Models\backend\admin\Size::where('id',$product[0]->size_id)->get();
                                        ?>
                                        <option value="{{$product_color[0]->id}}">{{$product_color[0]->size}}</option>
                                        @endif
                                    </select>
                                </div><!-- End .select-custom -->

                                <a href="#" class="size-guide"><strong>Brand: </strong>
                                	{{
                                		\App\Models\backend\admin\Brand::where('id',$product[0]->brand_id)->value('name')
                                	}}
                                </a>
                            </div><!-- End .details-filter-row -->

                            <form method="post" id="add_to_card_detail_form"> 
                                @csrf
                            <div class="details-filter-row details-row-size">
                                <label for="qty">Qty:</label>
                                 <div class="product-details-quantity">
                                    <input type="number" id="qty" name="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                </div><!-- End .product-details-quantity -->
                            </div><!-- End .details-filter-row -->
                            <input type="hidden" name="color_id" class="color_id">
                            <input type="hidden" name="size_id" class="size_id">
                            <input type="hidden" name="product_id" value="{{$product[0]->id}}">
                            </form>
                            <div class="product-details-action">
                                <a href="javascript:void(0)" id="order_now_dtl" class="btn-product btn-primary btn-cart"><span>Order Now</span></a>

                                <div class="details-action-wrapper">
                                    <a href="javascript:void(0)" id="add_to_card_dtl_page" class="btn-product btn-cart"><span>Add to Cart</span></a>
                                    <a  href="javascript:void(0)" id="wishlist_dtl" class="btn-product btn-wishlist" title="Compare"><span>Add to Wishlist</span></a>
                                </div><!-- End .details-action-wrapper -->
                            </div><!-- End .product-details-action -->
                            <div class="msg_erro">
                                
                            </div>
                            <div class="product-details-footer">
                                <div class="product-cat">
                                    <span>Category:</span>

                                    <a href="#">
                                    	{{\App\Models\backend\admin\Category::where('id',$product[0]->category_id)->value('name')}}
                                    </a>

                                </div><!-- End .product-cat -->

                                <div class="social-icons social-icons-sm">
                                    <span class="social-label">Share:</span>
                                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                </div>
                            </div><!-- End .product-details-footer -->
                        </div><!-- End .product-details -->
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .product-details-top -->
        </div><!-- End .container -->

        <div class="product-details-tab product-details-extended">
            <div class="container">
                <ul class="nav nav-pills justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Additional information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Shipping & Returns</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews ({{(count(App\Models\frontend\Review::where('product_id',$product[0]->id)->get()))}})</a>
                    </li>
                </ul>
            </div><!-- End .container -->

            <div class="tab-content">
                <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                    <div class="product-desc-content">
                    	<div class="container">
                            <h3>Product Description</h3>
                            	<p>{{$product[0]->description}}</p>
                        </div><!-- End .container -->
                      </div><!-- End .product-desc-row -->
                  </div><!-- End .product-desc-content -->

                <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                    <div class="product-desc-content">
                        <div class="container">
                            <h3>Information</h3>
                            <p>{{$product[0]->aditional}}</p>

                            
                        </div>
                    </div><!-- End .product-desc-content -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                    <div class="product-desc-content">
                        <div class="container">
                            <h3>Delivery & returns</h3>
                            <p>{{$product[0]->return}}</p>
                        </div><!-- End .container -->
                    </div><!-- End .product-desc-content -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                    <div class="reviews">
                        <div class="container">
                            @if(session()->has('customer'))
                            <div class="review-form mb-2">
                                <form  id="addReview">
                                     <input type="hidden" class="form-control" name="product_id" value="{{$product[0]->id}}" id="rating_pro_id">
                                     <input type="hidden" class="form-control" name="rating" id="rating_point">
                                      
                                      <div class="form-group mt-3 review-blank-star">
                                        <img class="blank_star" src="{{asset('frontend/assets/images/blank_star.png')}}" id="1_star">
                                        <img class="blank_star" src="{{asset('frontend/assets/images/blank_star.png')}}" id="2_star">
                                        <img class="blank_star" src="{{asset('frontend/assets/images/blank_star.png')}}" id="3_star">
                                        <img class="blank_star" src="{{asset('frontend/assets/images/blank_star.png')}}" id="4_star">
                                        <img class="blank_star" src="{{asset('frontend/assets/images/blank_star.png')}}" id="5_star">
                                        <span id="rating_error"></span>
                                      </div>
                                      <h6>Comment<span class="text text-info">*</span></h6>
                                      <div class="form-group">
                                        <input type="text" class="form-control" name="comment" id="comment">
                                        <span id="comment_error"></span>
                                      </div>
                                      <h6>Description <span class="text text-info">*</span></h6>
                                      <div class="form-group">
                                        <textarea type="text" class="form-control" name="des"></textarea>
                                      </div>
                                      @csrf
                                      <button type="submit" class="btn btn-primary">Review</button>
                                </form>
                            </div>
                            @else
                            <div class="login-btn mb-3">
                                <span>Please <a href="{{route('customer.auth')}}">Login </a> | <a href="{{route('customer.auth')}}">Registration</a></span>
                            </div>
                            @endif
                            <div id="review_show">
                                <?php
                                    session()->put('product_id',$product[0]->id);
                                ?>
                                @include('frontend/layouts/partials/review_ajax')
                            </div>
                            

                        </div><!-- End .container -->
                    </div><!-- End .reviews -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->
        </div><!-- End .product-details-tab -->

        <div class="container">
            <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":1
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
                        "1200": {
                            "items":5,
                            "nav": true,
                            "dots": false
                        }
                    }
                }'>

          @if(count($product[0]->relativeProduct) > 0)
          	@foreach($product[0]->relativeProduct as $item)
          		@if($product[0]->id != $item->id)
                <div class="product">
                    <figure class="product-media">
                        
                        <span class="product-label label-sale">{{$item->condition}}</span>
                        
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
                            <span class="new-price">{{$item->price}} Tk</span>
                            <span class="old-price">Was {{$item->sell_price}} Tk</span>
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
                @endif
            @endforeach
          @endif
            </div><!-- End .owl-carousel -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection


@section('style')
<!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/plugins/nouislider/nouislider.css">
<style>
img.blank_star {
    width: 33px;
    margin-top: 15px;
}

.review-button{
  margin-top: 15px;
}
div#review li {
    display: inline;
    padding-left: 10px;
}


</style>
@endsection



@section('script')
<script src="{{asset('frontend')}}/assets/js/jquery.elevateZoom.min.js"></script>
<script src="{{asset('rating/rating.js')}}"></script>

<script>
    // find color for form
    function select_color(color_id){
        var active_color = $(this).data('active_color');
        if (active_color == 'active_'+color_id) {
            $('.inactive').addClass('active');
        }
        
        $('.color_id').val(color_id)
    }

// find size for form
    $(document).on('click','#size_id',function(e){
        e.preventDefault();
        var size_id = $(this).val();
        $('.size_id').val(size_id);

    });

// add to cart for detial page
$(document).on('click','#add_to_card_dtl_page',function(e){
    e.preventDefault();
    var color_id = $('.color_id').val();
    var size_id = $('.size_id').val();

    if (color_id == "") {
        $('.msg_erro').html('<div class="alert alert-danger"> Please Choose Once Color </div>')
    }else if(size_id == "") {
        $('.msg_erro').html('<div class="alert alert-danger"> Please Choose Once Size </div>')
    }else{
        var url = "{{route('detail.add.card')}}";

        $.ajax({
            Type: "POST",
            url: url,
            dataType: 'JSON',
            data: $('#add_to_card_detail_form').serialize(),
            beforeSend:function(){
                $('.btn-cart').html('<span>Adding...</span>');
            },
            complete:function(){
                $('.btn-cart').html('<span>add to cart</span>');
            },
            success:function(data){
                if (data['status'] == true) {
                    var url = "{{route('cart.index')}}";
                    window.location = url;
                }
                else if (data['status'] == 'color_stock') {
                    swal({
                          title: "OOP!",
                          text: data['message'],
                          icon: "warning",
                          button: "Ok!",
                        });
                }
                else if (data['status'] == 'size_stock') {
                    swal({
                          title: "OOP!",
                          text: data['message'],
                          icon: "warning",
                          button: "Ok!",
                        });
                }
                else if (data['status'] == 'product_stock') {
                    swal({
                          title: "OOP!",
                          text: data['message'],
                          icon: "warning",
                          button: "Ok!",
                        });
                }
            }
        });
    }

});


// order now for detial page
$(document).on('click','#order_now_dtl',function(e){
    e.preventDefault();

    var color_id = $('.color_id').val();
    var size_id = $('.size_id').val();

    if (color_id == "") {
        $('.msg_erro').html('<div class="alert alert-danger"> Please Choose Once Color </div>')
    }else if(size_id == "") {
        $('.msg_erro').html('<div class="alert alert-danger"> Please Choose Once Size </div>')
    }else{
        var url = "{{route('order.detail.page')}}";

        $.ajax({
            Type: "POST",
            url: url,
            dataType: 'JSON',
            data: $('#add_to_card_detail_form').serialize(),
            beforeSend:function(){
                $('.btn-cart').html('<span>Ordering...</span>');
            },
            complete:function(){
                $('.btn-cart').html('<span>Order now</span>');
            },
            success:function(data){
                if (data['status'] == true) {
                    var url = "{{route('checkout')}}";
                    window.location = url;
                }
                else if (data['status'] == 'color_stock') {
                    swal({
                          title: "OOP!",
                          text: data['message'],
                          icon: "warning",
                          button: "Ok!",
                        });
                }
                else if (data['status'] == 'size_stock') {
                    swal({
                          title: "OOP!",
                          text: data['message'],
                          icon: "warning",
                          button: "Ok!",
                        });
                }
                else if (data['status'] == 'product_stock') {
                    swal({
                          title: "OOP!",
                          text: data['message'],
                          icon: "warning",
                          button: "Ok!",
                        });
                }
            }
        });
    }

});

// add to wishlist for detial page
$(document).on('click','#wishlist_dtl',function(e){
    e.preventDefault();
    var color_id = $('.color_id').val();
    var size_id = $('.size_id').val();

    if (color_id == "") {
        $('.msg_erro').html('<div class="alert alert-danger"> Please Choose Once Color </div>')
    }else if(size_id == "") {
        $('.msg_erro').html('<div class="alert alert-danger"> Please Choose Once Size </div>')
    }else{
        var url = "{{route('wishlist.detail.page')}}";

        $.ajax({
            Type: "POST",
            url: url,
            dataType: 'JSON',
            data: $('#add_to_card_detail_form').serialize(),
            beforeSend:function(){
                $('.btn-wishlist').html('<span>Adding...</span>');
            },
            complete:function(){
                $('.btn-wishlist').html('<span>add to wishlist</span>');
            },
            success:function(data){
                if (data['status'] == true) {
                    var url = "{{route('wish.index')}}";
                    window.location = url;
                }
                else if (data['status'] == 'color_stock') {
                    swal({
                          title: "OOP!",
                          text: data['message'],
                          icon: "warning",
                          button: "Ok!",
                        });
                }
                else if (data['status'] == 'size_stock') {
                    swal({
                          title: "OOP!",
                          text: data['message'],
                          icon: "warning",
                          button: "Ok!",
                        });
                }
                else if (data['status'] == 'product_stock') {
                    swal({
                          title: "OOP!",
                          text: data['message'],
                          icon: "warning",
                          button: "Ok!",
                        });
                }
            }
        });
    }

});


// /add review
$(document).submit(function(e){
    e.preventDefault();
    var url = "{{route('store.review')}}";
    var token = "{{csrf_token()}}";
    var form = $('#addReview').serialize();

    $.ajax({
        type: "post",
        url: url,
        dataType: "JSON",
        data: form,
        success:function(data){
            if (data.status =='errors') {
                jQuery.each(data.errors,function(key,val){
                    $('#'+key+'_error').html('<div class="alert alert-danger"><span>'+val[0]+'</span></di>');
                });
            }
            if (data['status'] == true) {
                 $('body #review_show').html(data['review']);
                swal({
                  title: "Success!",
                  text: data['message'],
                  icon: "success",
                  button: "Ok!",
                });
            }

            $('#addReview')[0].reset();
        }
    });
});

</script>
@endsection