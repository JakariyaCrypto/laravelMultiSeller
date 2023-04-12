@extends('frontend/layouts/master')
@section('title','NS MART | Shop')

@section('content')
<link rel="stylesheet" href="{{asset('frontend/assets/css/plugins/nouislider/nouislider.css')}}">

<main class="main">
        	<div class="page-header text-center" style="background-image: url({{'assets/images/page-header-bg.jpg'}})">
        		<div class="container">
        			<h1 class="page-title">Grid 4 Columns<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('frontend')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shop</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                	<form action="{{route('shop.filter')}}" method="post">
                		@csrf
                	<div class="row">
                		<div class="col-lg-9">
                			<div class="toolbox">
                				<div class="toolbox-left">
                					<div class="toolbox-info">
                						Showing <span>{{count($rowProducts)}} of {{count(\App\Models\backend\admin\Product::all())}} </span> Products
                					</div><!-- End .toolbox-info -->
                				</div><!-- End .toolbox-left -->

                				<div class="toolbox-right">
                					<div class="toolbox-sort">
                						<label for="sortby">Sort by:</label>
                						<div class="select-custom">
											<select name="sort_by" id="sort_by" class="form-control" onchange="this.form.submit()">
												<option>Default</option>
												<option>Top Seller</option>
												<option value="rating">Most Rated</option>
												<option value="price_desc" @if(!empty($_GET['sortBy']) && $_GET['sortBy'] == 'price_desc') selected @endif>Price-Highter To Lower</option>
												<option value="price_asc" @if(!empty($_GET['sortBy']) && $_GET['sortBy'] == 'price_asc') selected @endif>Price-Lower To Highter</option>

											</select>
										</div>
                					</div><!-- End .toolbox-sort -->
                					<div class="toolbox-layout">
                						<a href="category-list.html" class="btn-layout">
                							<svg width="16" height="10">
                								<rect x="0" y="0" width="4" height="4"></rect>
                								<rect x="6" y="0" width="10" height="4"></rect>
                								<rect x="0" y="6" width="4" height="4"></rect>
                								<rect x="6" y="6" width="10" height="4"></rect>
                							</svg>
                						</a>

                						<a href="category-2cols.html" class="btn-layout">
                							<svg width="10" height="10">
                								<rect x="0" y="0" width="4" height="4"></rect>
                								<rect x="6" y="0" width="4" height="4"></rect>
                								<rect x="0" y="6" width="4" height="4"></rect>
                								<rect x="6" y="6" width="4" height="4"></rect>
                							</svg>
                						</a>

                						<a href="category.html" class="btn-layout">
                							<svg width="16" height="10">
                								<rect x="0" y="0" width="4" height="4"></rect>
                								<rect x="6" y="0" width="4" height="4"></rect>
                								<rect x="12" y="0" width="4" height="4"></rect>
                								<rect x="0" y="6" width="4" height="4"></rect>
                								<rect x="6" y="6" width="4" height="4"></rect>
                								<rect x="12" y="6" width="4" height="4"></rect>
                							</svg>
                						</a>

                						<a href="category-4cols.html" class="btn-layout active">
                							<svg width="22" height="10">
                								<rect x="0" y="0" width="4" height="4"></rect>
                								<rect x="6" y="0" width="4" height="4"></rect>
                								<rect x="12" y="0" width="4" height="4"></rect>
                								<rect x="18" y="0" width="4" height="4"></rect>
                								<rect x="0" y="6" width="4" height="4"></rect>
                								<rect x="6" y="6" width="4" height="4"></rect>
                								<rect x="12" y="6" width="4" height="4"></rect>
                								<rect x="18" y="6" width="4" height="4"></rect>
                							</svg>
                						</a>
                					</div><!-- End .toolbox-layout -->
                				</div><!-- End .toolbox-right -->
                			</div><!-- End .toolbox -->
                			@if(count($rowProducts) > 0)
                            <div class="products mb-3">
                                <div class="row justify-content-center">
                                	<?php
                                	$products = $products->paginate(4);
                                	?>
                                	@foreach($rowProducts as $product)
                                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <span class="product-label label-new">{{$product->condition}}</span>
                                                <a href="{{url('product/detail')}}/{{$product->slug}}">
                                                    <img src="{{asset($product->photo)}}" alt="Product image" class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="javascript:void(0)" data-qty="1"
                                                    data-product_id="{{$product->id}}" id="add_to_wish_{{$product->id}}" class="btn-product-icon btn-wishlist add_to_wish btn-expandable"><span>add to wishlist</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a href="#" data-qty="1" data-product-id="{{$product->id}}"  class="btn-product btn-cart add_to_cart"><span id="add_to_cart{{$product->id}}">add to cart</span></a></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">

                                                <div class="product-cat">
                                                    <a href="#">{{\App\Models\backend\admin\Category::where('id',$product->category_id)->value('name')}}</a>
                                                </div><!-- End .product-cat -->

                                                <h3 class="product-title"><a href="{{url('product/detail')}}/{{$product->slug}}">{{$product->name}}</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    ট {{$product->sell_price}}
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 2 Reviews )</span>
                                                </div><!-- End .rating-container -->

                                                <div class="product-nav product-nav-thumbs">
                                                	@foreach(Illuminate\Support\Facades\DB::table('mutli_product_imgs')->where('product_id',$product->id)->get() as $mulImgs)
                                                    <a href="#" class="active">
                                                        <img src="{{asset('/upload/temp/'.$mulImgs->file)}}" alt="product desc">
                                                    </a>
                                                    @endforeach
                                                </div><!-- End .product-nav -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                                    @endforeach

                                </div><!-- End .row -->
                            </div><!-- End .products -->
                            @else
                            <div class="col-sm-12">
                                <div class="not-found">
                                    <figure class="">
                                        <img src="{{asset('frontend/not-found.png')}}" alt="Product image" class="">
                                    </figure>
                                </div>
                            </div>

                        	<style>
	                        	.not-found {
									width: 50%;
									margin: auto;
									padding: 50px 0;
								}
                        	</style>
                             @endif

                             {{$rowProducts->appends($_GET)->links('vendor.pagination.custom-pagination')}}
                		</div><!-- End .col-lg-9 -->
                		<aside class="col-lg-3 order-lg-first">

                			<div class="sidebar sidebar-shop">
                				<div class="widget widget-clean">
                					<label>Filters:</label>
                					<a href="#" class="sidebar-filter-clear">Clean All</a>
                				</div><!-- End .widget widget-clean -->

                				<div class="widget widget-collapsible">
    								<h3 class="widget-title">
									    <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
									        Category
									    </a>
									</h3><!-- End .widget-title -->

									<div class="collapse show" id="widget-1">
										<div class="widget-body">
											<div class="filter-items filter-items-count">
												@foreach($categories as $cat)
												<div class="filter-item">
													<?php
														if (!empty($_GET['category'])) {
															$filterCats = explode(',', $_GET['category']);
														}
													?>

													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" id="{{$cat->slug}}" name="category[]" value="{{$cat->slug}}" onchange="this.form.submit()"
														@if(!empty($filterCats) && in_array($cat->slug,$filterCats)) checked @endif
														>
														<label class="custom-control-label" for="{{$cat->slug}}">{{$cat->name}}</label>
													</div><!-- End .custom-checkbox -->
													<span class="item-count">{{count($cat->products)}}</span>
												</div><!-- End .filter-item -->
												@endforeach
											</div><!-- End .filter-items -->
										</div><!-- End .widget-body -->
									</div><!-- End .collapse -->
        						</div><!-- End .widget -->

        						<div class="widget widget-collapsible">
    								<h3 class="widget-title">
									    <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true" aria-controls="widget-2">
									        Size
									    </a>
									</h3><!-- End .widget-title -->

									<div class="collapse show" id="widget-2">
										<div class="widget-body">
											<div class="filter-items">
												@foreach(App\Models\backend\admin\Size::first()->get() as $size)
												<?php
												if (!empty($_GET['sizeBy'])) {
														$filterSizes = explode(',', $_GET['sizeBy']);
													}
													
												?>
												<div class="filter-item">
													<div class="custom-control custom-checkbox">
														<input type="checkbox" name="size[]" class="custom-control-input" id="{{$size->slug}}" onchange="this.form.submit()" value="{{$size->slug}}"
														@if(!empty($filterSizes) && in_array($size->slug,$filterSizes)) checked @endif
														>
														<label class="custom-control-label" for="{{$size->slug}}">{{$size->size}}</label>
													</div><!-- End .custom-checkbox -->
												</div><!-- End .filter-item -->
												@endforeach
											</div><!-- End .filter-items -->
										</div><!-- End .widget-body -->
									</div><!-- End .collapse -->
        						</div><!-- End .widget -->
        						<div class="widget widget-collapsible">
    								<h3 class="widget-title">
									    <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5">
									        Price
									    </a>
									</h3><!-- End .widget-title -->

									<div class="collapse show" id="widget-5">
										<div class="widget-body">
                                            <div class="filter-price">
                                                <?php
                                                    $minPrice = App\helper\customHelper::minPrice();
                                                    $maxPrice = App\helper\customHelper::maxPrice();
                                                    if (!empty($_GET['price'])) {
                                                        $price = explode('-', $_GET['price']);
                                                    }
                                                    
                                                ?>
                                                <div class="filter-price-text">
                                                    <p>
                                                  <label for="amount">Price range:</label>
                                                  <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                                </p> 
                                                <input type="hidden" name="min_price" id="amount_start" value="@if(!empty($_GET['price'])) {{$price[0]}} @else {{$minPrice}} @endif">
                                                <input type="hidden" name="max_price" id="amount_end" value="@if(!empty($_GET['price'])) {{$price[1]}} @else {{$maxPrice}} @endif">
                                                </div><!-- End .filter-price-text -->
                                                <div id="slider-range"></div>
                                                <button type="submit" class="price-filter-btn">filter</button>
                                            </div><!-- End .filter-price -->
										</div><!-- End .widget-body -->
									</div><!-- End .collapse -->
        						</div><!-- End .widget -->

        						<div class="widget widget-collapsible">
    								<h3 class="widget-title">
									    <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true" aria-controls="widget-3">
									        Colour
									    </a>
									</h3><!-- End .widget-title  selected -->

									<div class="collapse show" id="widget-3">
										<div class="widget-body">
											<div class="filter-colors">
												@foreach(App\Models\backend\admin\Color::first()->get() as $color)
												<a href="" class="" style="background: {{$color->color}};"><span class="sr-only"></span></a>
												
												@endforeach
											</div><!-- End .filter-colors -->
										</div><!-- End .widget-body -->
									</div><!-- End .collapse -->
        						</div><!-- End .widget -->

        						<div class="widget widget-collapsible">
    								<h3 class="widget-title">
									    <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
									        Brand
									    </a>
									</h3><!-- End .widget-title -->

									<div class="collapse show" id="widget-4">
										<div class="widget-body">
											<div class="filter-items">
												@foreach(App\Models\backend\admin\Brand::first()->get() as $brand)
												<?php
													if (!empty($_GET['brandBy'])) {
														$filterBrands = explode(',', $_GET['brandBy']);
													}
												?>
												<div class="filter-item">
													<div class="custom-control custom-checkbox">
														<input type="checkbox" name="brand[]" class="custom-control-input" id="{{$brand->slug}}" onchange="this.form.submit()" value="{{$brand->slug}}"
														@if(!empty($filterBrands) && in_array($brand->slug,$filterBrands)) checked @endif
														>
														<label class="custom-control-label" for="{{$brand->slug}}">{{$brand->name}}</label>
													</div><!-- End .custom-checkbox -->
												</div><!-- End .filter-item -->
												@endforeach

											</div><!-- End .filter-items -->
										</div><!-- End .widget-body -->
									</div><!-- End .collapse -->
        						</div><!-- End .widget -->

        						
                			</div><!-- End .sidebar sidebar-shop -->
                			
                		</aside><!-- End .col-lg-3 -->
                	</div><!-- End .row -->
                	</form>
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main>

<style>
.ui-slider-horizontal {
    height: .4rem !important;
}

.ui-widget.ui-widget-content {
    border: 1px solid blue !important;
    background: orange !important;
}

.ui-slider-horizontal .ui-slider-handle {
    top: -7px !important;
    margin-left: 0px !important;
}

.ui-slider .ui-slider-handle {

    width: 0.5rem !important;
    height: 1.2em !important;
}

.price-filter-btn {
    border: none;
    background: #39f;
    border-radius: 100px;
    margin-top: 20px;
    padding: 3px 30px;
    text-transform: uppercase;
    color: white;
    font-weight: bold;
    box-shadow: 0px 0px 5px .01px #ddd;
}

</style>
<?php

$minPrice = App\helper\customHelper::minPrice();
$maxPrice = App\helper\customHelper::maxPrice();

?>

@endsection




@section('script')

<script>
 $( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: <?php echo $minPrice ?>,
      max: <?php echo $maxPrice ?>,
      values: <?php 
        if (!empty($_GET['price'])) {
            echo '['.$price[0].','. $price[1] .']';
        }else{
            echo '['.$minPrice.','. $maxPrice .']';
        }
      
      ?>,
      slide: function( event, ui ) {
        $( "#amount" ).val( "ট" + ui.values[ 0 ] + " - ট" + ui.values[ 1 ] );
        // hidden input
        var start = $( "#amount_start" ).val(ui.values[ 0 ]);
        var end = $( "#amount_end" ).val(ui.values[ 1 ] );
      }
    });
    
    $( "#amount" ).val( "ট" + $( "#slider-range" ).slider( "values", 0 ) +
      " - ট" + $( "#slider-range" ).slider( "values", 1 ) );



  } );

</script>
@endsection