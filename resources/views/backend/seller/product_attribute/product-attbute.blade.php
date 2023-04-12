@extends('backend/seller/layouts/master')
@section('title','Seller | Product-Attribute')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>

        @endif
        <div class="py-3 d-flex justify-content-between align-items-center">
                <div class="header-left"><h5><i class="fa fa-bars"></i> {{$products->name}}</h5></div>
                <div class="header-rith"><a href="{{route('product.index')}}" class="btn btn-success btn-sm rounded"><i class="fa fa-arrow-left"></i> Back</a></div>
            </div>
            
        <div class="row">
            <div class="col-sm-12">
                 @include('backend/admin/layouts/partials/message')
                <div class="card table-responsive rounded">
                <div class="card-body card-block"> 
                       <form action="{{route('product.attribute.store',$products->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div id="product_attribute" class="content" data-mfield-options='{"section": ".group","btnAdd":"#btnAdd-1","btnRemove":".btnRemove"}'>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" id="btnAdd-1" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>
                                </div>

                            </div>
                            <div class="row group my-2" style="position: relative;">
                                <div class="col-md-2">
                                    <label class="label">Color <span class="text text-warning">*</span></label>
                                    <input class="form-control" type="text" name="color[]" placeholder="eg.#fbfbfb/red">
                                </div>
                                <div class="col-md-2">
                                    <label class="label">Size <span class="text text-warning">*</span></label>
                                    <input class="form-control" type="text" name="size[]" placeholder="eg.XL">
                                </div>
                                <div class="col-md-2">
                                    <label class="label">Price <span class="text text-warning">*</span></label>
                                    <input class="form-control" type="text" name="price[]" placeholder="eg.120">
                                </div>
                                <div class="col-md-2">
                                    <label class="label">Sell Price <span class="text text-warning">*</span></label>
                                    <input class="form-control" type="text" name="sell_price[]" placeholder="eg.100">
                                </div>
                                <div class="col-md-2">
                                    <label class="label">Product Photo <span class="text text-warning">*</span></label>
                                    <input class="form-control" type="file" name="photo[]">
                                </div>
                                <div class="col-md-2">
                                    <label class="label">Quantity <span class="text text-warning">*</span></label>
                                    <input class="form-control" type="text" name="qty[]" placeholder="eg.284959">
                                </div>
                                <span class="btn btnRemove mlt-pdct-btn"><i class="fa fa-close"></i></span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-sm mt-3">
                            <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                       </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card table-responsive">
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered-less">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                    <th>Sell Price</th>
                                    <th>Photo</th>
                                    <th>Qty/Stock</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if(count($productAttritubes) > 0)
                                @foreach( $productAttritubes as $attribute)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$attribute->color}}</td>
                                    <td>{{$attribute->size}}</td>
                                    <td>{{$attribute->price}}</td>
                                    <td>{{$attribute->sell_price}}</td>
                                    <td><img src="{{asset($attribute->photo)}}" lt="" style="height:50px;width:70px"></td>
                                    <td>{{$attribute->qty}}</td>


                                    <td>
                                       
                                    <form action="{{route('product.attribute.destroy')}}" method="post">
                                        @csrf
                                       
                                        <input type="hidden" name="product_id" value="{{$products->id}}">
                                        <input type="hidden" name="attribute_id" value="{{$attribute->id}}">
                                        <a href="#" data-id="{{$attribute->id}}" data-toggle="tooltip" data-placement="top" title="delete" class="del-btn btn btn-sm btn-outline-danger rounded"><i class="fa fa-trash"></i></a>
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
    </div><!-- .animated -->
</div><!-- .content -->
<style type="text/css">
.btn.btn-danger.btnRemove {
    position: absolute;
    top: 27px;
    right: 0;
}

.mlt-pdct-btn {
    top: 0;
    box-sizing: ;
    box-shadow: 0px 0px 8px .1px #ddd;
    padding: 1px 5px;
    border-radius: 100px;
    margin: ;
    z-index: ;
    color: red;
    margin-top: 5px;
}


</style>
@endsection

@section('script')

<script src="{{asset('backend/assets')}}/jquery.multifield.min.js"></script>
    
<script>
// multi field
jQuery('#product_attribute').multifield();

// multi field

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
      text: "Delete the Brand",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
        
      if (willDelete) {
        form.submit();
        swal("Done! Brand Deleted Successfull!", {
          icon: "success",
        });
      } else {
        swal("Something Wrong!");
      }
    });



});
</script>

</script>




@endsection