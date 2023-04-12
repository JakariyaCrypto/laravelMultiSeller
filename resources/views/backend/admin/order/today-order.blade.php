@extends('backend/admin/layouts/master')
@section('title','Admin Dashboard')
@section('content')


<div class="content mt-3">
    @include('backend/admin/layouts/partials/message')
    <div class="animated fadeIn">
        <div class="py-3 d-flex justify-content-between align-items-center">
            <div class="header-left"><h5><i class="fa fa-bars"></i> Todays Order</h5></div>
            <!-- {{Illuminate\Support\Carbon::parse()->today()->format('d-m-y')}} -->
        </div>
        <!-- orders -->
        <div class="row">
            <div class="col-md-12">
                <div class="card table-responsive">
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered-less">
                            <thead>
                                <tr>
                                <th>Order ID</th>
                                <th>Product</th>
                                <th>Order Status</th>
                                <th>Payment Status</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                 @if(count($today_orders) > 0)

                                    @foreach($today_orders as $item)

                                        <tr>
                                            <td class=""><a href="{{url('order-detail')}}/{{$item->id}}">{{$item->order_id}}</a></td>
                                            <td>
                                                @foreach(\Illuminate\Support\Facades\DB::table('ordered_products')->where(['order_id'=>$item->id])->get() as $product)
                                                <figure class="product-media">
                                                    @foreach(\Illuminate\Support\Facades\DB::table('products')->where(['id'=>$product->product_id])->get() as $productImgs)
                                                    <div class="d-flex">
                                                        <a href="#">
                                                        <img src="{{asset($productImgs->photo)}}" style="width: 70px;">
                                                        </a>
                                                    </div>
                                                    
                                                    @endforeach
                                                </figure>
                                                @endforeach
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
                                            <td class="quantity-col">{{$sum}}</td>
                                            <td class="d-flex">
                                                <a href="{{route('admin.order.detail',$item->id)}}" data-toggle="tooltip" data-placement="top" title="view product" class="btn btn-sm btn-outline-info rounded mr-1"><i class="fa fa-eye font-lg"></i></a>


                                                <a href="{{route('downoad.admin.order',$item->id)}}" data-toggle="tooltip" data-placement="top" title="add product attribute" class="btn btn-sm btn-outline-success rounded mr-1"><i class="fa fa-arrow-down font-lg"></i></a>
                                                

                                            <form action="{{route('order.destroy')}}" method="post">
                                                @csrf
                                                
                                                <input type="hidden" name="order_id" value="{{$item->id}}">
                                                <a href="#" data-id="{{$item->id}}" data-toggle="tooltip" data-placement="top" title="delete" class="del-btn btn btn-sm btn-outline-danger rounded"><i class="fa fa-trash"></i></a>
                                            </form>

                                            </td>
                                        </tr>
                                        @endforeach
                                @else
                                <tr>
                                    <td colspan='10'>
                                        <div class="not-found-imoji">
                                            <h2>Nothing Found !</h2>
                                            <img class="not-found" src="{{asset('backend/assets/not-found.png')}}">
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- .content -->

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

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.del-btn').click(function(e){
    e.preventDefault();
    var form = $(this).closest('form');
    var dataId = $(this).data('id');

    swal({
      title: "Are you sure?",
      text: "Delete the Order",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
        form.submit();
      if (willDelete) {
        swal("Done! Order Deleted Successfull!", {
          icon: "success",
        });
      } else {
        swal("Something Wrong!");
      }
    });



});
</script>


@endsection