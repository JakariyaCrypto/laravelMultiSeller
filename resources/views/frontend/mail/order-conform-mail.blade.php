
<!DOCTYPE html>
<html>
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Order Conformation </title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">


</head>

<body>
    <div class="order-conform-mail">
        <div class="logo-section">
            <img src="http://127.0.0.1:8000/frontend/assets/images/demos/demo-13/logo.png">
        </div>
       <h3><strong style="font-size: 30px">Hi</strong> {{\Illuminate\Support\Facades\Auth::guard()->user()->name}}</h3>
       <h2 style="background: #cbdbea;padding: 15px 10px;">Your Order is Successfully Place !</h2>
       <div class="order-info">
           <li style="display: block;"><strong>Order Date : </strong> {{Illuminate\Support\Carbon::parse($order->created_at)->format('d-M-y')}}</li>
           <li style="display: block;"><strong>Order Id: </strong> {{$order->order_id}}</li>
           <li style="display: block;"><strong>Order Status : </strong> {{$order->order_status}}</li>
           <li style="display: block;"><strong>Payment Status : </strong> {{$order->payment_status}}</li>
           <li style="display: block;"><strong>Payment Method : </strong> {{$order->payment_method}}</li>
       </div>
        <table>
            <thead>
                <tr>
                    <th>Name</th>                
                    <th>Photo</th>
                    <th>Quantity</th>
                    <th>Item Price</th>
                </tr>
                <tr>
                    <td colspan="4"><hr/></td>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                    $sum = 0;
                       $products = Illuminate\Support\Facades\DB::table('ordered_products')
                        ->leftJoin('products','products.id','=','ordered_products.product_id')
                        ->select('ordered_products.*','products.name','products.photo','products.sell_price')
                        ->where(['order_id'=>$order->id,'customer_id'=> Auth::guard()->user()->id])
                        ->get();
                        
                            
                    ?>
                @foreach($products as $item)

                <?php
                    $rowTotal = $item->sell_price * $item->qty;
                    $sum = $sum + $rowTotal;
                ?>

                <tr>
                    <td width="40%"><span>
                        {{$item->name}}
                    </span></td>
                    <td width="10"><img src="{{asset($item->photo)}}" width="100px"> </td>
                    <td width="25">{{$item->qty}} </td>
                    <td width="25">{{$rowTotal}} {{App\helper\customHelper::currencyConvert($rowTotal)}}</td>
                </tr>
                @endforeach
               <tr>
                    <td colspan="2"></td>
                    <td colspan="4"><hr/></td>
                    
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2"><strong>Sub Total : {{App\helper\customHelper::currencyConvert($sum)}}</strong></td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">Delivery Charge : {{App\helper\customHelper::currencyConvert($order->shipping_charge)}}</td>
                </tr>
                @if($order->coupon_value > 0)
                <tr>
                    <td colspan="2"></td> 
                    <td colspan="2">Coupon Price : {{App\helper\customHelper::currencyConvert($order->coupon_value)}}</td>
                    @else
                </tr>
                @endif
                <tr>
                    <td colspan="2"></td>
                    <td colspan="4"><hr/></td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    @if($order->coupon_value > 0)
                    <td colspan="2"><strong style="color: #39f">
                    Total Amount : {{App\helper\customHelper::currencyConvert($sum + $order->shipping_charge - $order->coupon_value)}}
                    </strong></td>
                    @else
                    <td colspan="2"><strong style="color: #39f">
                    Total Amount : {{App\helper\customHelper::currencyConvert($sum + $order->shipping_charge)}}
                    </strong></td>
                    @endif
                </tr>
            </tbody>
        </table>
    </div><!-- End .page-content -->

<style>

.order-conform-mail {
    width: 600px;
    margin: 0px auto;
}

.logo-section {
    text-align: center;
    margin-top: 10px;
}

.order-conform-mail table {
    width: 600px;
    margin: 0px auto;
    background: ;
    box-shadow: 0px 0px 10px 0.1rem #ddd;
    padding: 20px 5px;
    text-align: center;
}

.order-conform-mail table tbody tr img {
    padding: 10px 0px;
    border-radius: .5rem;
}

hr {
    color: #39f;
}


.order-info li strong {
    text-transform: uppercase;
}

.order-info li {
    display: block;
    line-height: 25px;
}

.order-info {
    padding: 13px 6px;
}
</style>
</body>
</html>