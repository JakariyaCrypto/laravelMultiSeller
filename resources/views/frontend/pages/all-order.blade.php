@extends('frontend/layouts/master')
@section('title','NS Mart | Orders')

@section('content')


        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
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
	                		<div class="col-lg-12">
                                  
    <table class="table table-cart table-mobile">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Product</th>
                <th>Order Status</th>
                <th>Payment Status</th>
                <th>Status</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @if(count($customer_order) > 0)
            <?php

            ?>
            @foreach($customer_order as $item)

                <tr>
                    <td class=""><a href="{{url('order-detail')}}/{{$item->id}}">{{$item->order_id}}</a></td>
                   
                    <td class="product-col">
                        <div class="product">
                             @foreach(\Illuminate\Support\Facades\DB::table('ordered_products')->where(['order_id'=>$item->id])->get() as $product)
                            <figure class="product-media">
                                @foreach(\Illuminate\Support\Facades\DB::table('products')->where(['id'=>$product->product_id])->get() as $productImgs)
                                <a href="#">
                                    <img src="{{asset($productImgs->photo)}}">
                                </a>
                                @endforeach
                            </figure>
                            @endforeach
                        </div><!-- End .product -->
                    </td>
                    
                    <td class="price-col">{{$item->payment_status}}</td>
                    <td class="quantity-col">{{$item->payment_method}}</td>

                    @if($item->order_status == 'pendding')
                    <td class="quantity-col"><span class="order-pendding">{{$item->order_status}}</span></td>
                    @elseif($item->order_status == 'success')
                    <td class="quantity-col"><span class="order-success">{{$item->order_status}}</span></td>
                    @else
                    <td class="quantity-col"><span class="order-cancel">{{$item->order_status}}</span></td>
                    @endif
                    <?php
                        $sum = $item->sub_total + $item->shipping_charge;
                        $total = $sum - $item->coupon_value;
                    ?>
                    <td class="quantity-col">{{$total}}</td>
                    
                </tr>
            @endforeach
            @else
            <tr><5>product not found</5></tr>
            @endif
        </tbody>
    </table><!-- End .table table-wishlist -->

</div><!-- End .col-lg-9 -->

	                	</div><!-- End .row -->
	                </div><!-- End .container -->
                </div><!-- End .cart -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

<style>


  
.order-cancel {
    border: 2px solid red;
    padding: 5px;
    
}  
.order-success {
    border: 2px solid green;
    padding: 5px;
}  

.order-pendding{
    border: 2px solid green;
    padding: 5px;
}

</style>
@endsection

@section('script')
<script>



</script>	

@endsection