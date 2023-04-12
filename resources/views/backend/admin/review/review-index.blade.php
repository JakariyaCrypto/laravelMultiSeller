@extends('backend/admin/layouts/master')
@section('title','Admin | Review')
@section('content')


<div class="content mt-3">
    @include('backend/admin/layouts/partials/message')
    <div class="animated fadeIn">
        <div class="py-3 d-flex justify-content-between align-items-center">
            <div class="header-left"><h5><i class="fa fa-bars"></i> All Review</h5></div>
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
                                <th>ID</th>
                                <th>Date</th>
                                <th>Review</th>
                                <th>Name</th>
                                <th>comment</th>
                                <th>Product</th>
                                <th>Desc</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                 @if(count($reviews) > 0)

                                    @foreach($reviews as $item)

                                    <?php
                                        $product = App\Models\backend\admin\Product::where('id',$item->product_id)->select('name','photo')->get();
                                        $user = App\Models\User::where('id',$item->customer_id)->select('name')->get();

                                    // dd($product);
                                    ?>

                                        <tr>
                                            <td class="">{{$loop->iteration}}</td>
                                            <td class="">{{Illuminate\Support\Carbon::parse($item->created_at)->format('M-d-y')}}</td>
                                            <td width="15%">
                                                @for($i=0;$i<5;$i++)
                                                    @if($item->rating > $i)
                                                    <i class="fa fa-star text-warning"></i>
                                                    @else
                                                    <i class="fa fa-star" style="color:#ddd"></i>
                                                    @endif
                                                @endfor

                                            </td>
                                            <td>{{$user[0]->name}}</td>
                                            <td class="price-col">{{$item->comment}}</td>
                                            <td>
                                                
                                                <div class="product">
                                                <figure class="product-media">
                                                    <a href="">
                                                        <img src="{{asset($product[0]->photo)}}" alt="Product image" style="width: 100px">
                                                    </a>
                                                </figure>

                                                <h6 class="product-title">
                                                    <a href="">{{$product[0]->name}}</a>
                                                </h6><!-- End .product-title -->
                                            </div><!-- End .product -->
                                            </td>
                                            
                                            <td class="quantity-col">{{$item->des}}</td>
                                            <td>{{$item->status}}</td>
                                            <td class="d-flex">


                                                <a href="{{route('review.edit',$item->id)}}" data-toggle="tooltip" data-placement="top" title="add product attribute" class="btn btn-sm btn-outline-success rounded mr-1"><i class="fa fa-edit"></i></a>
                                                

                                            <form action="{{route('review.destroy')}}" method="post">
                                                @csrf
                                                
                                                <input type="hidden" name="review_id" value="{{$item->id}}">
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
      text: "Delete the Review",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
        form.submit();
      if (willDelete) {
        swal("Done! Review Deleted Successfull!", {
          icon: "success",
        });
      } else {
        swal("Something Wrong!");
      }
    });



});
</script>


@endsection