<?php if($products->isEmpty()) { ?>
<div class="products mb-3">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <h3>Product Not found ! </h3>
        </div>
    </div>
</div>
<?php }else{ ?>
<div class="products mb-3">
    <div class="row justify-content-center">
        @foreach($products as $item)
        <div class="col-6 col-md-4 col-lg-4 col-xl-3">
            <div class="product product-7 text-center">
                <figure class="product-media">
                    <span class="product-label label-new">{{$item->condition}}</span>
                    <a href="product.html">
                        <img src="{{asset($item->photo)}}" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                        <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                    </div><!-- End .product-action-vertical -->

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                    </div><!-- End .product-action -->
                </figure><!-- End .product-media -->

                <div class="product-body">
                    <div class="product-cat mb-1">
                        @foreach(\App\Models\backend\admin\Category::where('id',$item->category_id)->get() as $cat)

                        <a href="#">{{$cat->name}}</a>

                        @endforeach
                    </div><!-- End .product-cat -->
                    <h3 class="product-title"><a href="product.html">{{$item->name}}</a></h3><!-- End .product-title -->
                    <div class="product-price">
                        {{$item->sell_price}} ট
                    </div><!-- End .product-price -->
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                        </div><!-- End .ratings -->
                        <span class="ratings-text">( 2 Reviews )</span>
                    </div><!-- End .rating-container -->

                    <div class="product-nav product-nav-thumbs">
                        @foreach(\App\Models\backend\admin\MutliProductImg::where('product_id',$item->id)->get() as $mulImg)
                        <?php
                            // echo "<pre>";
                            // print_r($mulImg);exit();
                        ?>
                        <a href="#" class="active">
                            <img src="{{asset('/upload/temp/'.$mulImg->file)}}" alt="product desc">
                        </a>
                        @endforeach

                    </div><!-- End .product-nav -->
                </div><!-- End .product-body -->
            </div><!-- End .product -->
        </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
        @endforeach
        
    </div><!-- End .row -->
</div><!-- End .products -->

<?php } ?>

