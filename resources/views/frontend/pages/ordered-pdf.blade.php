
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>

<body>
    <div class="page-content">
        @if(count($orderView) > 0)
        <div class="container">
            <div class="row">
                

                <div class="col-sm-12">
                    <div class="order-detail-header">
                        <img src="{{public_path('frontend/assets/images/demos/demo-13/logo.png')}}" style="width: 200px">
                        <h4>Order Invoice</h4>
                        <span><b> ORDER DATE :</b> {{Illuminate\Support\Carbon::parse($orderView[0]->created_at)->format('d-M-y')}}</span>
                        <span><b> ORDER ID : </b> <a href="#">{{$orderView[0]->order_id}}</a></span>
                        <span><b> ORDER STATUS : </b> <a href="#">{{$orderView[0]->order_status}}</a></span>
                        <span><b> PAYMENT METHOD : </b> <a href="#">{{$orderView[0]->payment_method}}</a></span>
                        <span><b> PAYMENT STATUS : </b> <a href="#">{{$orderView[0]->payment_status}}</a></span>
                    </div>
                </div>
                
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr style="padding-bottom: 10px">
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>

                                </tr>
                            </thead>
                            <tbody>
                        <?php
                                $sum = 0;
                                   $products = Illuminate\Support\Facades\DB::table('ordered_products')
                                    ->leftJoin('products','products.id','=','ordered_products.product_id')
                                    ->select('ordered_products.*','products.name','products.photo','products.sell_price')
                                    ->where(['order_id'=>$orderView[0]->id,'customer_id'=> Auth::guard()->user()->id])
                                    ->get();
                                    
                                        
                                ?>
                                @foreach($products  as $product)
                                <?php
                                    $rowTotal = $product->sell_price * $product->qty;
                                    $sum = $sum + $rowTotal;
                                ?>
                                <tr>
                                    <td><img style="width: 100px;margin-top: 5px" src="{{public_path($product->photo)}}"</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->qty}}</td>

                                    <td>
                                        {{number_format($rowTotal,2)}}
                                        
                                    </td>
                                    
                                </tr>

                                
                                @endforeach
                                <tr style="border: none;" class="border-none">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="text-align: center;" class="Total_order">

                                        <li>Subtotal : {{number_format($sum,2)}}</li>

                                        @if($orderView[0]->coupon_value > 0)
                                        <li>Save Amount : {{number_format($orderView[0]->coupon_value,2)}}</li>
                                        @endif

                                        <li>Shipping Charge : {{number_format($orderView[0]->shipping_charge,2)}}</li>

                                        @if($orderView[0]->coupon_value > 0)
                                        <li>Total Amount : {{number_format($sum + $orderView[0]->shipping_charge -$orderView[0]->coupon_value,2)}}</li>
                                        @else
                                        <li>Total Amount : {{number_format($sum + $orderView[0]->shipping_charge,2)}}</li>
                                        @endif
                                        

                                    </td>

                                </tr>
                            </tbody>
                        </table>

                        <div class="order-info">
                    <div class="billing">
                  <div class="custom-card">
                    <div class="customer-bill">
                        <h4><strong>Billing Address</strong></h4>
                        
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
                        <h4><strong>Shipping Address</strong></h4>
                        
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

                  
                </div><!-- End .col-lg-12 -->
            </div><!-- End .row -->
            @endif
        </div>
    </div><!-- End .page-content -->

<style>

.Total_order li{
    list-style: none;
    direction: block;
    line-height: 30px;
}
  
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

.order-detail-header {
    line-height: 16px;
    text-align: center;
    padding-bottom: 20px;
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

.customer-bill h4 {
    background: #ddd;
    padding: 5px 7px;
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