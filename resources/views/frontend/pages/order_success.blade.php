@extends('frontend/layouts/master');
@section('title','NS Mart | Order-success')

@section('content')

<main class="main">
	<div class="page-header text-center" style="background-image: url({{asset('frontend/assets/images/page-header-bg.jpg')}})">
		<div class="container">
			<h1 class="page-title">Order<span>Success</span></h1>
		</div><!-- End .container -->
	</div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('frontend')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('shop')}}">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Order Success</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
    	<div class="checkout">
            <div class="container">
            	<div class="row">
            		<div class="col-sm-6 offset-sm-3 my-3 py-3">
            			<div class="succes-panel">
		            		<img src="{{asset('frontend/assets/success.png')}}">
		            			<h4>ORDER SUCCESS</h4>
								<p>Order is Successfull. As soon as possible we are connect with you.</p>
								@if(session()->has('order_rand_id'))
								<h5><strong>ORDER ID : {{session()->get('order_rand_id')}}</strong></h5>
								@endif
								<?php
								$order_id = session()->get('order_id');
								?>
		            		<div class="success-footer">
		            			<a href="{{route('orderedPdf',$order_id)}}" class="profile-edit-btn"><i class="icon-arrow-down"></i>Dowload </a> 
		            			<a href="{{url('customer/order-detail')}}/{{$order_id}}" class="profile-edit-btn"><i class="icon-eye"></i> View </a>
		            		</div>
		            	</div>
            		</div>
            	</div>

            	</div>
            </div>
        </div>
    </main>


<style type="text/css">

.profile-edit-btn {
	padding: 5px 15px !important;

}

.success-footer {
	margin-top: 20px;
}

.succes-panel {
	box-shadow: 0px 0px 10px 1px #ebebeb;
	display: block;
	justify-content: center;
	text-align: center;
	padding: 20px 0;
}
.succes-body img {
	width: 20%;
}

.succes-body img {
	width: 220px;
	text-align: center;
}

.succes-panel img {
	width: 220px;
	display: inline-block !important;
}

.success-footer a {
	margin: 9px;
	font-size: 16px;
	font-weight: bold;
	text-decoration: none;
}
.succes-panel p {
	font-size: 16px;
}




@media(max-width: 800px){
.succes-panel p {
	padding: 3px 20px;
	font-size: 16px;
}




}

</style>
@endsection

