@extends('frontend/layouts/master')
@section('title','NS Mart | Category|Product')
@section('content')


        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Grid 4 Columns<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Grid 4 Columns</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                	<div class="row">
                		<div class="col-lg-9" id="filter-item">
                			<div class="toolbox">
                				<div class="toolbox-left">
                					<div class="toolbox-info">
                						Showing <span>{{count($products)}} of {{\App\Models\backend\admin\Product::all()->count()}}</span> Products
                					</div><!-- End .toolbox-info -->
                				</div><!-- End .toolbox-left -->

                				<div class="toolbox-right">
                					<div class="toolbox-sort">
                						<label for="sortby">Sort by:</label>
                						<div class="select-custom">
											<select name="sortby" id="sortby" class="form-control">
                                                <option selected>Default</option>
												<option value="price_asc" selected>Price Higher to Lower</option>
												<option selected value="rating">Most Rated</option>
												<option selected value="best_seller">Date</option>
											</select>
										</div>
                					</div><!-- End .toolbox-sort -->
                					
                				</div><!-- End .toolbox-right -->
                			</div><!-- End .toolbox -->
 
                			@if($products->isEmpty())
                                <div class="products mb-3">
                                    <div class="row justify-content-center">
                                        <div class="col-sm-6">
                                            <h3>Product Not found ! </h3>
                                        </div>
                                    </div>
                                </div>

                                @else
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
                                                        <a href="javascript:void(0)" data-qty="1"
                                                        data-product_id="{{$item->id}}" id="add_to_wish_{{$item->id}}" class="btn-product-icon btn-wishlist add_to_wish btn-expandable"><span>add to wishlist</span></a>
                                                        <a href="{{asset('frontend/popup/quickView.html')}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                                        <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                                    </div><!-- End .product-action-vertical -->

                                                    <div class="product-action">
                                                        <a href="#" data-qty="1" data-product-id="{{$item->id}}"  class="btn-product btn-cart add_to_cart"><span id="add_to_cart{{$item->id}}">add to cart</span></a>
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
                                @endif

                			<nav aria-label="Page navigation">
							    <ul class="pagination justify-content-center">
							        <li class="page-item disabled">
							            <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
							                <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
							            </a>
							        </li>
							        <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
							        <li class="page-item"><a class="page-link" href="#">2</a></li>
							        <li class="page-item"><a class="page-link" href="#">3</a></li>
							        <li class="page-item-total">of 6</li>
							        <li class="page-item">
							            <a class="page-link page-link-next" href="#" aria-label="Next">
							                Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
							            </a>
							        </li>
							    </ul>
							</nav>
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
                                            @php 
                                                $cats = \App\Models\backend\admin\Category::latest()->get();
                                            @endphp
                                            @foreach($cats as $cat)

												<div class="filter-item">
                                                    <label class="filter-check">
                                                      <input type="checkbox" name="cat_id" class="cat_id" value="{{$cat->id}}" 
                                                     
                                                      />
                                                        <span> {{$cat->name}}</span>
                                                    </label>
													 
                                                  <?php 
                                                  $totalItem = \App\Models\backend\admin\Product::where('category_id',$cat->id)->get()->count();
                                                  ?>
													<span class="item-count">{{$totalItem}}</span>

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

                                            @foreach(\App\Models\backend\admin\Size::latest()->get() as $size)
												<div class="filter-item">
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" id="size-{{$loop->iteration}}">
														<label class="custom-control-label" for="size-{{$loop->iteration}}">{{$size->size}}</label>
													</div><!-- End .custom-checkbox -->
												</div><!-- End .filter-item -->
                                            @endforeach

											</div><!-- End .filter-items -->
										</div><!-- End .widget-body -->
									</div><!-- End .collapse -->
        						</div><!-- End .widget -->

        						<div class="widget widget-collapsible">
    								<h3 class="widget-title">
									    <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true" aria-controls="widget-3">
									        Colour
									    </a>
									</h3><!-- End .widget-title -->

									<div class="collapse show" id="widget-3">
										<div class="widget-body">
											<div class="filter-colors">
                                        @foreach(\App\Models\backend\admin\Color::latest()->get() as $color)
												<a href="#" class="selected" style="background: {{$color->color}};"><span class="sr-only">Color Name</span></a>
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
                                            @foreach(\App\Models\backend\admin\Brand::latest()->get() as $brand)
												<div class="filter-item">
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" id="brand-1">
														<label class="custom-control-label" for="brand-1">{{$brand->name}}</label>
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
                                                <div class="filter-price-text">
                                                    <p>
                                                  <label for="amount">Price range:</label>
                                                  <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                                </p> 
                                                <input type="hidden" name="min_price" id="amount_start">
                                                <input type="hidden" name="max_price" id="amount_end">
                                                </div><!-- End .filter-price-text -->
                                                <div id="slider-range"></div>
                                                
                                            </div><!-- End .filter-price -->
										</div><!-- End .widget-body -->
									</div><!-- End .collapse -->
        						</div><!-- End .widget -->
                			</div><!-- End .sidebar sidebar-shop -->
                		</aside><!-- End .col-lg-3 -->
                	</div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

@endsection

@section('style')
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


.filter-check {
    font-family: system-ui, sans-serif;
    font-size: 23px;
    font-weight: bold;
    line-height: 1.1;
    display: grid;
    grid-template-columns: 1em auto;
    gap: 0.5em;
}

.filter-check span {
    font-size: 14px;
    color: #3e3e3e;
    font-weight: 400;
}


</style>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
@endsection


@section('script')

  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 500,
      values: [ 75, 300 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        // hidden input
        var start = $( "#amount_start" ).val( "$" + ui.values[ 0 ]);
        var end = $( "#amount_end" ).val( "$" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );



  } );

 // sort by
  $('#sortby').change(function(){
    var sort = $('#sortby').val();
    window.location = "{{url(''.$route.'')}}/{{$categories[0]->slug}}?sort="+sort;
  });
<?php
    $curren_url = URL::current()
?>
  // categoy by filter
  
  $('.cat_id').click(function(){
    

    var cat_id = [];

    $('.cat_id').each(function(){
        // alert(checked);
        if($(this).is(":checked")){
            cat_id.push($(this).val());
        }
    })   

    FianlCat = cat_id.toString();
    // window.location = "{{url(''.$curren_url.'')}}/?cat_id="+FianlCat;

            $.ajax({
                url: "",
                type: 'GET',
                dataType: 'html',
                data: "cat_id="+FianlCat,
                success: function(response){
                    $('#filter-item').html(response);
                }
            });
  });

  



</script>

@endsection