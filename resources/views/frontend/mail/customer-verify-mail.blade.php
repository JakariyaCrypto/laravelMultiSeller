
<!DOCTYPE html>
<html>
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Account Verification </title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">


</head>

<body>
    <div class="customer-verify-mail">
        <div class="logo-section">
            <img src="http://127.0.0.1:8000/frontend/assets/images/demos/demo-13/logo.png">
        </div>
        <h4>Hi {{$customer->name}}</h4>
       <h2 style="background: #cbdbea;padding: 15px 10px;">Acccount Verification Code : {{$customer->token}}</h2>
       <h4>Please,Click to Below Button For Account Verification </h4>
       <div class="everift-btn">
           <a href="{{url('customer-verify-form')}}/{{$customer->token}}"
           style=" 
            background: #81bff9;
            padding: 8px 8px;
            text-decoration: none;
            font-size: 17px;
            font-weight: bold;
            border-radius: .3rem;
            " 
           >Account Verification Now</a>
       </div>
       <h3>Thanks By </h3>
       <h4>NS Mart </h4>
        
    </div><!-- End .page-content -->

<style>

.customer-verify-mail {
    width: 600px;
    margin: 0px auto;
    text-align: center;
}

.logo-section {
    text-align: center;
    margin-top: 10px;
}


</style>
</body>
</html>