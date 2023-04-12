<div class="col-lg-9">
	                			  
	<table class="table table-cart table-mobile">
		<thead>
			<tr>
				<th>Product</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Total</th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			<?php
				$sum = 0;
			?>
			@if(\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->count() > 0)
			
			@foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $cart)
			<tr>
				<td class="product-col">
					<div class="product">
						<figure class="product-media">
							<a href="{{url('product/detail')}}/{{$cart->model->slug}}">
								<img src="{{asset($cart->model->photo)}}" alt="Product image">
							</a>
						</figure>

						<h3 class="product-title">
							<a href="{{url('product/detail')}}/{{$cart->model->slug}}">{{$cart->name}}</a>
						</h3><!-- End .product-title -->
					</div><!-- End .product -->
				</td>
				<td class="price-col">{{App\helper\customHelper::currencyConvert($cart->price)}}</td>
				<td class="quantity-col">
                    <div class="cart-product-quantity qty-change" data-product_id="{{$cart->rowId}}">
                        <input type="number" class="form-control" value="{{$cart->qty}}" min="1" max="10" step="1" data-decimals="0" required id="qty_update_{{$cart->rowId}}" name="qty">
                       
                    </div><!-- End .cart-product-quantity -->
                     <input type="hidden" id="stock_qty_{{$cart->rowId}}" name="" value="{{$cart->model->qty}}">
                </td>
				<td class="total-col">
				@php
					$rowTotal = $cart->price * $cart->qty;
				@endphp
				<?php
					
					$sum=$sum+$rowTotal;
				?>
				{{App\helper\customHelper::currencyConvert($rowTotal)}}
				</td>
				<td class="remove-col "><a class="btn-remove rmv_crt_pro" data-id="{{$cart->rowId}}" style="cursor:pointer"><i class="icon-close"></i></a></td>
			</tr>
			@endforeach
			@else
			<tr>
				<td colspan='4'>
                    <div class="not-found-imoji">
                        <h2>Nothing Found !</h2>
                        <img class="not-found" src="{{asset('backend/assets/not-found.png')}}">
                    </div>
                </td>
			</tr>
			@endif
		</tbody>
	</table><!-- End .table table-wishlist -->


	<div class="cart-bottom">
		<div class="cart-discount">
			<div id="msg" class="mb-2"></div>
			<form action="" id="coupon_add">
				@csrf
				<div class="input-group">
					<input type="text" class="form-control" required placeholder="coupon code" name="code">
					<div class="input-group-append">
						<button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
					</div><!-- .End .input-group-append -->
				</div><!-- End .input-group -->
			</form>
		</div><!-- End .cart-discount -->
<!-- 
		<a href="#" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></a> -->
	</div><!-- End .cart-bottom -->
</div><!-- End .col-lg-9 -->
<aside class="col-lg-3">

	<div class="summary summary-cart">
		<h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

		<table class="table table-summary">
			<tbody>
				<tr class="summary-subtotal">
					<td>Subtotal:</td>
					<td>
						

						{{App\helper\customHelper::currencyConvert($sum)}}

					</td>
				</tr><!-- End .summary-subtotal -->
				@if(session()->has('coupon'))
				<tr class="summary-subtotal">
					<td>Save Amount:</td>
					<td>
						
						{{App\helper\customHelper::currencyConvert(session('coupon')['value'])}}
					</td>
				</tr><!-- End .summary-subtotal -->
				@endif
				

				<tr class="summary-shipping-estimate">
					<td>Estimate for Your Country<br> <a href="dashboard.html">Change address</a></td>
					<td>&nbsp;</td>
				</tr><!-- End .summary-shipping-estimate -->

				<tr class="summary-total">
					<td>Total:</td>
					<td>
					@if(session()->has('coupon'))
					<?php
						$coupon_total = $sum - session('coupon')['value'];

					?>
                    {{App\helper\customHelper::currencyConvert($coupon_total)}}
                    @else

                    {{App\helper\customHelper::currencyConvert($sum)}}
                    @endif
                    
					</td>
				</tr><!-- End .summary-total -->
			</tbody>
		</table><!-- End .table table-summary -->

		<a href="{{route('checkout')}}" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
	</div><!-- End .summary -->
	<a href="{{route('frontend')}}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
</aside><!-- End .col-lg-3 -->
