@extends('backend/admin/layouts/master')
@section('title','Admin | Order-Details')
@section('content')
<div class="content mt-3">
<div class="row">
            
   <div class="col-md-12">
   	@include('backend/admin/layouts/partials/message')
        <div class="card table-responsive">
            <div class="card-body">
            	<div class="container">
               <div class="row">
                <div class="col-sm-12">
                    <div class="order-detail-header">
                        <h4>Order Details</h4>
                        <span><b> ORDER DATE :</b> {{Illuminate\Support\Carbon::parse($orderView[0]->created_at)->format('d-M-y')}}</span>
                        <span><b> ORDER ID : </b> <a href="#">{{$orderView[0]->order_id}}</a></span>
                        <span><b> ORDER STATUS : </b> <a href="#">{{$orderView[0]->order_status}}</a></span>
                        <span><b> PAYMENT METHOD : </b> <a href="#">{{$orderView[0]->payment_method}}</a></span>
                        <span><b> PAYMENT STATUS : </b> <a href="#">{{$orderView[0]->payment_status}}</a></span>
                    </div>
                </div>
                <div class="col-sm-6">
                  <div class="custom-card">
                    <div class="customer-bill">
                        <h6><strong>Billing Address</strong></h6>
                        <hr/>
                        <?php
                            $billing = Illuminate\Support\Facades\DB::table('billings')->where(['order_id'=>$orderView[0]->id])->get();
                        ?>
                        <div class="billing-content">
                            <strong>Name : <span>{{$billing[0]->name}}</span></strong>
                            <strong>Email : <span>{{$billing[0]->email}}</span></strong>
                            <strong>Address : <span>{{$billing[0]->address1}}</span></strong>
                            <strong>Address-2 : <span>{{$billing[0]->address2}}</span></strong>
                            <strong>Country : <span>{{$billing[0]->country}}</span></strong>
                            <strong>City : <span>{{$billing[0]->city}}</span></strong>
                            <strong>Zip Code  : <span>{{$billing[0]->zip_code}}</span></strong>
                            <strong>Phone Number  : <span><b>{{$billing[0]->phone}}</b></span></strong>

                        </div>
                    </div>
                  </div>
                </div><!-- End .col-lg-9 -->
                <div class="col-sm-6">
                  <div class="custom-card">
                    <div class="customer-bill">
                        <h6><strong>Shipping Address</strong></h6>
                        <hr/>
                        <?php
                            $shipping = Illuminate\Support\Facades\DB::table('shippings')->where(['order_id'=>$orderView[0]->id])->get();
                        ?>
                    <div class="billing-content">
                        <strong>Name : <span>{{$shipping[0]->sname}}</span></strong>
                        <strong>Email : <span>{{$shipping[0]->semail}}</span></strong>
                        <strong>Address : <span>{{$shipping[0]->saddress1}}</span></strong>
                        <strong>Address-2 : <span>{{$shipping[0]->saddress2}}</span></strong>
                        <strong>Country : <span>{{$shipping[0]->scountry}}</span></strong>
                        <strong>City : <span>{{$shipping[0]->scity}}</span></strong>
                        <strong>Zip Code  : <span>{{$shipping[0]->szip_code}}</span></strong>
                        <strong>Phone Number  : <span><b>{{$shipping[0]->sphone}}</b></span></strong>

                    </div>
                        <strong>Comment  : <span>{{$billing[0]->comment}}</span></strong>

                    </div>
                    </div>
                  </div>
                
                <div class="col-sm-12">
                  <div class="custom-card mt-3">
                    <div class="customer-bill">
                        
                        <table class="table table-cart table-mobile table-borderless">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product Photo</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $sum = 0;
                                   $products = Illuminate\Support\Facades\DB::table('ordered_products')
                                    ->leftJoin('products','products.id','=','ordered_products.product_id')
                                    ->select('ordered_products.*','products.name','products.photo','products.sell_price')
                                    ->where(['order_id'=>$orderView[0]->id])
                                    ->get();
                                    
                                        
                                ?>
                                @foreach($products  as $product)
                                <?php
                                    $rowTotal = $product->sell_price * $product->qty;
                                    $sum = $sum + $rowTotal;
                                ?>
                                <tr>
                                    <td class="product-col">{{$product->name}}</td>
                                    <td>
                                    	<img src="{{asset($product->photo)}}" alt="Product image" style="width: 100px">
                                    </td>
                                    <td class="price-col">{{$product->qty}}</td>
                                    <td class="quantity-col">{{number_format($rowTotal,2)}}</td>
                                   
                                </tr>
                                <?php
                                    $sum = $sum + $rowTotal;
                                ?>
                                @endforeach
                                <tr style="border: none;text-align: center;" class="border-none">
                                    <td></td>
                                    <td></td>
                                    <td colspan="2">

                                        <div class="total_payment">
                                            <strong><h6 style="font-weight: bold;">Subtotal : {{number_format($sum,2)}}</h6></strong>

                                                @if($orderView[0]->coupon_value > 0)
                                                <span><h6>Save Amount : {{number_format($orderView[0]->coupon_value,2)}}</h6></span>
                                                @endif

                                                <span><h6>Shipping Charge : {{number_format($orderView[0]->shipping_charge,2)}}</h6></span>

                                                @if($orderView[0]->coupon_value > 0)
                                                <strong><h6 style="font-weight: bold;">Total Amount : {{number_format($sum + $orderView[0]->shipping_charge -$orderView[0]->coupon_value,2)}} </h6></strong>
                                                @else
                                                <strong><h6 style="font-weight: bold;color: #39f">Total Amount : {{number_format($sum + $orderView[0]->shipping_charge,2)}} </h6></strong>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                	<td></td>
                                	<td></td>
                                	<td colspan="2">
                                		<form action="{{route('change.order.status')}}" method="post">
                                			@csrf
                                			<div class="has-success form-group">
		                                        <label for="inputIsValid" class="form-control-label"> Change Order Status <strong class="text-primary"> *</strong></label> 
		                                        <select id="order_status" name="order_status" class="form-control">
		                                            <option value="">--- Select Order Status ----</option>
		                                            <option value="pendding" {{$orderView[0]->order_status == 'pendding' ? 'selected' : ''}}>Pendding</option>
		                                            <option value="on the way" {{$orderView[0]->order_status == 'on the way' ? 'selected' : ''}}>On The Way</option>
		                                            <option value="success" {{$orderView[0]->order_status == 'success' ? 'selected' : ''}}>Success</option>
		                                            <option value="cancelled" {{$orderView[0]->order_status == 'cancelled' ? 'selected' : ''}}>Cancelled</option>
		                                        </select>
		                                        <input type="hidden" name="order_id" value="{{$orderView[0]->id}}">
	                                    	</div>
	                                    	<button type="submit" class="product-btn btn btn-success btn-md rounded">
								                <i class="fa fa-dot-circle-o"></i> Change Status
								            </button>
                                		</form>
                                	</td>
                                </tr>
                                
                            </tbody>
                        </table><!-- End .table table-wishlist -->

                        <div class="profile-btn">
                            <a href="{{route('downoad.admin.order',$orderView[0]->id)}}" class="btn btn-primary rounded btn-sm"><i class="fa fa-arrow-down"></i> Download</a>
                            <a href="" class="btn btn-primary rounded btn-sm"><i class="fa fa-print"></i> Print</a>
                        </div>
                    </div>
                  </div>
                  
                </div><!-- End .col-lg-12 -->
            </div><!-- End .row -->
            </div>
        </div>
      </div>
       </div>
	</div>
</div>


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

.custom-card {
    box-shadow: 0px 0px 3px 0.01rem #dddd;
    padding: 15px;
}

.billing-content strong {
    display: block;
    font-size: 15px;
}

.billing-content {
    padding: 0px 20px;
}

hr {
    margin: 1rem auto 1.5rem !important;
}

.order-detail-header {
    text-align: center;
    padding: 20px 0px;
}

.order-detail-header h4 {
    text-transform: uppercase;
    font-weight: bold;
    color: #39f;
}

.order-detail-header span {
    display: block;
    font-weight: ;
}


.border-none td {
    border-top: none;
    border-bottom: none !important;
}

.total_payment h6 {
    line-height: 33px;
}


</style>


@endsection


