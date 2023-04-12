
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>

<body>
        <main class="main">

            <div class="page-content">
                @if(count($orderView) > 0)
            	<div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="order-detail-header">
                                <img src="{{public_path('frontend/assets/images/demos/demo-13/logo.png')}}" style="width: 200px">
                                <h4>Order Invoice</h4>
                                <span><b> ORDER DATE :</b> 10 october 22</span>
                                <span><b> ORDER ID : </b> <a href="#">{{$orderView[0]->order_id}}</a></span>
                                <span><b> ORDER STATUS : </b> <a href="#">{{$orderView[0]->order_status}}</a></span>
                                <span><b> PAYMENT METHOD : </b> <a href="#">{{$orderView[0]->payment_method}}</a></span>
                                <span><b> PAYMENT STATUS : </b> <a href="#">{{$orderView[0]->payment_status}}</a></span>
                            </div>
                        </div>
                        <div class="order-info">
                            <div class="billing">
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
                        <div class="shipping">
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
                        </div><!-- End .col-lg-9 -->
                        </div>
                        <div class="col-sm-12">
                          <div class="custom-card mt-3">
                            <div class="customer-bill">
                                
                                <table class="table table-cart table-mobile table-borderless">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
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
                                            ->where(['order_id'=>$orderView[0]->id,'customer_id'=>session()->get('customer_id')])
                                            ->get();
                                            
                                                
                                        ?>
                                        @foreach($products  as $product)
                                        <tr>
                                            <td class="product-col">
                                                <div class="product">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="{{public_path($product->photo)}}" alt="Product image">
                                                        </a>
                                                    </figure>

                                                    <h3 class="product-title">
                                                        <a href="#">{{$product->name}}</a>
                                                    </h3><!-- End .product-title -->
                                                </div><!-- End .product -->
                                            </td>
                                            <td class="price-col">{{$product->qty}}</td>
                                            <td class="quantity-col">{{number_format($product->sell_price,2)}}</td>
                                           
                                        </tr>
                                        <?php
                                            $sum = $sum + $product->sell_price;
                                        ?>
                                        @endforeach
                                        <tr style="border: none;" class="border-none">
                                            <td></td>
                                            <td></td>
                                            <td style="text-align: center;">

                                                <strong><h6 style="font-weight: bold;">Subtotal : {{number_format($sum,2)}}</h6></strong>

                                                @if($orderView[0]->coupon_value > 0)
                                                <span><h6>Save Amount : {{number_format($orderView[0]->coupon_value,2)}}</h6></span>
                                                @endif

                                                <span><h6>Shipping Charge : {{number_format($orderView[0]->shipping_charge,2)}}</h6></span>

                                                @if($orderView[0]->coupon_value > 0)
                                                <strong><h6 style="font-weight: bold;">Total Amount : {{number_format($sum + $orderView[0]->shipping_charge -$orderView[0]->coupon_value,2)}} </h6></strong>
                                                @else
                                                <strong><h6 style="color: #39f">Total Amount : {{number_format($sum + $orderView[0]->shipping_charge,2)}} </h6></strong>
                                                @endif
                                                

                                            </td>

                                        </tr>
                                        
                                    </tbody>
                                </table><!-- End .table table-wishlist -->
                            </div>
                            </div>
                          </div>
                          
                        </div><!-- End .col-lg-12 -->
                    </div><!-- End .row -->
                    @endif
                </div>
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

.custom-card {
    padding: 15px;
}

.billing-content strong {
    display: block;
    font-size: 15px;
    line-height: 35px;
}

.billing-content {
    padding: 0px 20px;
}

hr {
    margin: 1rem auto 1.5rem !important;
}

.order-detail-header {
    line-height: 16px;
    text-align: center;
}

.order-detail-header h4 {
    text-transform: uppercase;
    font-weight: bold;
    color: #39f;
    margin: 10px 0;
}

.order-detail-header span {
    display: block;
    font-weight: ;
}

.order-detail-header span a {
    text-decoration: navajowhite;
}


.order-detail-header b {
    font-size: 10px;
}

.border-none td {
    border-top: none;
    border-bottom: none !important;
}

.order-info {
    width: 100%;
}

.billing {
    width: 47%;
    margin: 20px;
    float: left;
}

.shipping {
    width: 47%;
    margin: 20px;
    float: right;
}

.customer-bill h6 {
    font-size: 15px;
    margin: 10px 0;
    line-height: 10px;
}

table{
    width: 100%;
    margin: auto;
    border: 1px solid #2222;
    padding: 20px 10px;
}

tr {
    text-align: center;
}

.product-media img {
    width: 100px;
}


.border-none span {
    font-weight: ;
    color: #28272794;
    font-size: ;
}


.product-title a {
    text-decoration: none;
    color: #202020;
    font-size: 13px;
}

@media(max-width: 700px){
.col-sm-6 {
    width: 100% !important;
}

.order-info {
    display: block;
}






}




</style>
</body>
</html>