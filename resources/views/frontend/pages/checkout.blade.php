@extends('frontend/layouts/master')
@section('title','NS Mart | Checkout')

@section('content')
<main class="main">
        	<div class="page-header text-center" style="background-image: url({{asset('frontend/assets/images/page-header-bg.jpg')}})">
        		<div class="container">
        			<h1 class="page-title">Checkout<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="checkout">
	                <div class="container">
            			<form action="{{route('order.store')}}" method="post">
            				@csrf
		                	<div class="row">
		                		<div class="col-lg-9">
		                			<h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
		                				<div class="row">
		                					<div class="col-sm-6">
		                						<label>Full Name *</label>
		                						<input type="text" class="form-control" value="{{$user[0]->name}}" id="name" name="name">
		                						@error('name')
		                						<div class="alert alert-danger">
		                							<span>Name Field is Required</span>
		                						</div>
		                					@enderror
		                					</div><!-- End .col-sm-6 -->
		                					
		                					<div class="col-sm-6">
		                						<label>Email address *</label>
	        									<input type="email" class="form-control" required="" value="{{$user[0]->email}}" id="email" name="email">
	        									@error('email')
		                						<div class="alert alert-danger">
		                							<span>E-mail Field is Required</span>
		                						</div>
		                					@enderror
		                					</div><!-- End .col-sm-6 -->
		                					
		                				</div><!-- End .row -->


	            						<label>Street address *</label>
	            						<input type="text" class="form-control" placeholder="House number and Street name" required="" name="address1" id="address1">
	            						<input type="text" class="form-control" placeholder="Appartments, suite, unit etc ..." required="" value="{{$user[0]->address}}" name="address2" id="address2">

	            						<div class="row">
	            							<div class="col-sm-6">
		                						<label>State / County *</label>
		                						<input type="text" class="form-control" required="" name="country" id="country" value="{{old('country')}}">
		                					</div><!-- End .col-sm-6 -->
		                					<div class="col-sm-6">
		                						<label>Town / City *</label>
		                						<input type="text" class="form-control" required="" name="city" id="city" value="{{old('city')}}">
		                					</div><!-- End .col-sm-6 -->
		                				</div><!-- End .row -->

		                				<div class="row">
		                					<div class="col-sm-6">
		                						<label>Postcode / ZIP *</label>
		                						<input type="text" class="form-control" required="" name="zip_code" id="zip_code" value="{{old('zip_code')}}">
		                					</div><!-- End .col-sm-6 -->

		                					<div class="col-sm-6">
		                						<label>Phone *</label>
		                						<input type="tel" class="form-control" required="" id="phone" value="{{$user[0]->mobile}}" name="phone">
		                					</div><!-- End .col-sm-6 -->
		                				</div><!-- End .row -->

	                					

	        							<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="checkout-create-acc" value="create_account" name="create_account">
											<label class="custom-control-label" for="checkout-create-acc" >Create an account?</label>
										</div><!-- End .custom-checkbox -->

										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="checkout-diff-address" value="same_address" name="same_address">
											<label class="custom-control-label" for="checkout-diff-address">Devlivery to a Same Address?</label>
										</div><!-- End .custom-checkbox -->

		                				<div class="row" id="ship_different">
		                					<div class="col-sm-6">
		                						<label>Full Name *</label>
		                						<input type="text" class="form-control" required="" id="sname" name="sname">
		                					</div><!-- End .col-sm-6 -->
		                					@error('email')
		                						<div class="alert alert-danger">
		                							<span>Shipping Name is Required</span>
		                						</div>
		                					@enderror
		                					<div class="col-sm-6">
		                						<label>Email address *</label>
	        									<input type="email" class="form-control" required="" id="semail" name="semail">
		                					</div><!-- End .col-sm-6 -->
		                				</div><!-- End .row -->


	            						<label>Street address *</label>
	            						<input type="text" class="form-control" placeholder="House number and Street name" required="" id="saddress1" name="saddress1">
	            						<input type="text" class="form-control" placeholder="Appartments, suite, unit etc ..." required="" name="saddress2" id="saddress2">

	            						<div class="row">
		                					<div class="col-sm-6">
		                						<label>Town / City *</label>
		                						<input type="text" class="form-control" required="" id="scity" name="scity">
		                					</div><!-- End .col-sm-scityscity -->

		                					<div class="col-sm-6">
		                						<label>State / County *</label>
		                						<input type="text" class="form-control" required="" id="scountry" name="scountry">
		                					</div><!-- End .col-sm-6 -->
		                				</div><!-- End .row -->

		                				<div class="row">
		                					<div class="col-sm-6">
		                						<label>Postcode / ZIP *</label>
		                						<input type="text" class="form-control" required="" id="szip_code" name="szip_code">
		                					</div><!-- End .col-sm-6 -->

		                					<div class="col-sm-6">
		                						<label>Phone *</label>
		                						<input type="tel" class="form-control" required="" id="sphone" name="sphone">
		                					</div><!-- End .col-sm-6 -->
		                				</div><!-- End .row -->
	                					<label>Order notes (optional)</label>
	        							<textarea class="form-control" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery" name="comment"></textarea>
	        							
		                		</div><!-- End .col-lg-9 -->
		                		<aside class="col-lg-3">
		                			<div class="summary">
		                				<h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

										<table class="table table-summary">
											<thead>
												<tr>
													<th>Product</th>
													<th>Total</th>
												</tr>
											</thead>

											<tbody>
												<?php
													$sum = 0;
												?>
												@foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $checkout)

												<?php
													$rowTotal = $checkout->qty * $checkout->price;
													$sum = $sum + $rowTotal;

												?>
												<tr>
													<td><a href="#">{{$checkout->name}}</a> * {{$checkout->qty}}</td>
													<td>
														{{App\helper\customHelper::currencyConvert($rowTotal)}}
													</td>
												</tr>
												@endforeach

												<tr class="summary-subtotal">
													<td>Subtotal:</td>
													<td>
														@if(session()->has('coupon'))
														<?php
															$coupon_total = $sum - session('coupon')['value'];
															
														?>
														<input type="hidden" name="coupon_total" class="sub_total" value="{{$sum}}">
														
														{{App\helper\customHelper::currencyConvert($coupon_total)}}
														@else
														{{ App\helper\customHelper::currencyConvert($sum)}}
														<input type="hidden" name="sub_total" class="sub_total" value="{{$sum}}">
														@endif
													</td>
												</tr><!-- End .summary-subtotal -->
												<tr class="summary-shipping">
													<td>Shipping Method:</td>
													<td>&nbsp;</td>
												</tr>
													@error('shipping_charge')	
													<tr>
														<div class="alert alert-danger">
															<span>Please, Select Shipping Method</span>
														</div>
													</tr>
													@enderror
													<tr class="summary-shipping-row">
														<td>
															<div class="custom-control custom-radio">
																<input type="radio" id="free-shipping" name="shipping_charge" class="custom-control-input" value="0"
																
																>
																<label class="custom-control-label" for="free-shipping">Free Shipping</label>
															</div><!-- End .custom-control -->
														</td>
														
														<td>{{App\helper\customHelper::currencyConvert(0)}}</td>
													</tr><!-- End .summary-shipping-row -->

													<tr class="summary-shipping-row">
														<td>
															<div class="custom-control custom-radio">
																<input type="radio" id="standart-shipping" name="shipping_charge" class="custom-control-input" value="20"
																
																>
																<label class="custom-control-label" for="standart-shipping">Standart:</label>
															</div><!-- End .custom-control -->
														</td>
														<td>{{App\helper\customHelper::currencyConvert(10)}}</td>
													</tr><!-- End .summary-shipping-row -->

													<tr class="summary-shipping-row">
														<td>
															<div class="custom-control custom-radio">
																<input type="radio" id="express-shipping" name="shipping_charge" class="custom-control-input" value="30"
																
																>
																<label class="custom-control-label" for="express-shipping">Express:</label>
															</div><!-- End .custom-control -->
														</td>
														<td>{{App\helper\customHelper::currencyConvert(30)}}</td>
													</tr><!-- End .summary-shipping-row -->

												<tr class="summary-total">
												<td>Total:</td>
												<td id="ajax_shipping_free">
													

													@if(session()->has('coupon'))
											        {{App\helper\customHelper::currencyConvert($coupon_total)}}

											        @else
											        {{App\helper\customHelper::currencyConvert($sum)}}
											        

											        @endif
											        
												</td>
											</tr><!-- End .summary-total -->
												
											</tbody>
										</table><!-- End session('coupon')['value']  .table table-summary -->

										<div class="accordion-summary" id="accordion-payment">
											@error('payment_method')
											<div class="alert alert-danger">
												<span>Select Payment Method</span>
											</div>
											@enderror
										    

										    
										    <div class="card">
										        <div class="card-header">
										           <img src="{{asset('frontend/cod.jpg')}}" class="cod-img" onclick="cashOnDevlivery('COD')" id="cod_img">
										        	<input type="hidden" name="payment_method" id="cod_value" class="ssl_value">
										        </div><!-- End .card-header -->
										        
										    </div><!-- End .card -->
										    <div class="card">
										        <div class="card-header">
										               	<img src="{{asset('frontend/ssl.png')}}" onclick="sslPament('SSLPAY')" class="ssl-pay">
										        	

										        </div><!-- End .card-header -->
										    </div><!-- End .card -->

										    


										</div><!-- End .accordion -->

										<button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
											<span class="btn-text">Place Order</span>
											<span class="btn-hover-text">Proceed to Checkout</span>
										</button>
		                			</div><!-- End .summary -->
		                		</aside><!-- End .col-lg-3 -->
		                	</div><!-- End .row -->
            			</form>
	                </div><!-- End .container -->
                </div><!-- End .checkout -->
            </div><!-- End .page-content -->
        </main>

<style>
.card img {
	width: 200px;
	margin: 20px;
}

</style>
@endsection

@section('script')
<script>
//cash on delivery valu catch
function cashOnDevlivery(COD){
	var cod = $('#cod_value').val('COD');
	$('.cod-img').css('border','5px solid orange');
	$('.ssl-pay').css('border','0px solid orange');

	
}
///ssl payment value catch
function sslPament(SSLPAY){

	var ssl_pament = $('#cod_value').val('SSLPAY');
	$('.ssl-pay').css('border','5px solid orange');
	$('.cod-img').css('border','0px solid orange');

}

// shipping charge
$('#free-shipping').change(function(e){
	e.preventDefault();
	var is_checked = $('#free-shipping').prop('checked');
	var sub_total = $('.sub_total').val();
// alert(sub_total);
	var free_shipping = $('#free-shipping').val();
	var token = "{{csrf_token()}}";

	$.ajax({
			type: "POST",
			url: "{{route('free.shipping')}}",
			data:{
				shipping_charge:free_shipping,
				sub_total: sub_total,
				_token: token,
			},
			success:function(data){
				if (data.status == 'success') {
					$('#ajax_shipping_free').html('ট' + parseFloat(data.shipping_total).toFixed(2));
				}
				console.log(data);
			}
		});


});


// standart shipping charge
$('#standart-shipping').change(function(e){
	e.preventDefault();
	var is_checked = $('#standart-shipping').prop('checked');
	var sub_total = $('.sub_total').val();
	var standart = $('#standart-shipping').val();
	var token = "{{csrf_token()}}";

	$.ajax({
			type: "POST",
			url: "{{route('standart.shipping')}}",
			data:{
				shipping_charge:standart,
				sub_total: sub_total,
				_token: token,
			},
			success:function(data){
				if (data.status == 'success') {
					$('body #ajax_shipping_free').html('ট' + parseFloat(data.shipping_total).toFixed(2) );
				}
				console.log(data);
			}
		});


});

// express shipping charge
$('#express-shipping').change(function(e){
	e.preventDefault();
	var is_checked = $('#express-shipping').prop('checked');
	var sub_total = $('.sub_total').val();

	var express = $('#express-shipping').val();
	var token = "{{csrf_token()}}";

	$.ajax({
			type: "POST",
			url: "{{route('express.shipping')}}",
			data:{
				shipping_charge:express,
				sub_total: sub_total,
				_token: token,
			},
			success:function(data){
				if (data.status == 'success') {
					$('body #ajax_shipping_free').html('ট' + parseFloat(data.shipping_total).toFixed(2));
				}
				console.log(data);
			}
		});


});




// same address 
$('#checkout-diff-address').change(function(e){
	e.preventDefault();
	var is_checked = $('#checkout-diff-address').prop('checked');
	if (is_checked) {
		$('#sname').val($('#name').val());
		$('#semail').val($('#email').val());
		$('#saddress1').val($('#address1').val());
		$('#saddress2').val($('#address2').val());
		$('#scountry').val($('#country').val());
		$('#scity').val($('#city').val());
		$('#szip_code').val($('#zip_code').val());
		$('#sphone').val($('#phone').val());

	}else{
		$('#sname').val("");
		$('#semail').val("");
		$('#saddress1').val("");
		$('#saddress2').val("");
		$('#scountry').val("");
		$('#scity').val("");
		$('#szip_code').val("");
		$('#sphone').val("");
	}
})

</script>

@endsection


