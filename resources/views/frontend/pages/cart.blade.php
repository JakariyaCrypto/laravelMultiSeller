@extends('frontend/layouts/master')
@section('title','NS Mart | Cart')

@section('content')


        <main class="main">
        	<div class="page-header text-center" style="background-image: url({{asset('frontend/assets/images/page-header-bg.jpg')}})">
        		<div class="container">
        			<h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="cart">
	                <div class="container">
	                	<div class="row" id="cart_list">
	                		@include('frontend/layouts/partials/cart_list')
	                	</div><!-- End .row -->
	                </div><!-- End .container -->
                </div><!-- End .cart -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
@endsection

@section('script')
<script>

// update cart qty
$(document).on('click','.qty-change', function(e){
    e.preventDefault();
    var product_id = $(this).data('product_id');
    var qty = $('#qty_update_'+product_id).val();

    var stock_qty = $('#stock_qty_'+product_id).val();

    var path = "{{route('cart.update')}}";
    var token = "{{csrf_token()}}";
	// alert(stock_qty);

	$.ajax({
        url: path,
        type: 'post',
        dataType: 'JSON',
        token: token,

        data:{
            stock_qty: stock_qty,
            product_id: product_id,
            qty: qty,
            _token: token, 
        },
        success: function(data){
        	if (data['status'] == true) {
        		 $('body #header_ajax').html(data['header']);
        		 $('body #cart_list').html(data['cart_list']);

	            swal({
	              title: "Success!",
	              text: data['message'],
	              icon: "success",
	              button: "Ok!",
	            });
        	}else if(data['status'] == false){
        		swal({
	              title: "OOP!",
	              text: data['message'],
	              icon: "warning",
	              button: "Ok!",
	            });
        	}
           

        },
        error: function(er){
            console.log(er);
        }
    });

});

// add coupon
$('#coupon_add').submit(function(e){
	e.preventDefault();
	var form = $('#coupon_add').serialize();
	// alert(form);

	$.ajax({
		url: "{{route('add.coupon')}}",
		type: "POST",
		data: form,
		success: function(data){
            
			if (data.status == 'error') {
				$('#msg').html('<div class="alert alert-danger" role="alert">'+data.msg+'</div>');
			}
			if (data.status == 'success') {
                $('body #header_ajax').html(data.header);
                $('body #cart_list').html(data.cart_list);
				$('#msg').html('<div class="alert alert-success" role="alert">'+data.msg+'</div>');
			}
			console.log(data);
		}
	});
	
		
});


</script>	

@endsection