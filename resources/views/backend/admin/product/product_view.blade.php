@extends('backend/admin/layouts/master')
@section('title','Admin Product-View')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="py-3 d-flex justify-content-between align-items-center">
                <div class="header-left"><h5><i class="fa fa-eye"></i> Product Details</h5></div>
                <div class="header-rith"><a href="{{route('product.index')}}" class="btn btn-success rounded"><i class="fa fa-arrow-left"></i> Back</a></div>
            </div>
            
        <div class="row">
             <div class="col-sm-12">
                <div class="card table-responsive rounded">
                    <div class="card-body card-block"> 
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Product Name : </label>
                                    <h4>{{$product[0]->name}}</h4>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Product Description : </label>
                                    <div>
                                        $product[0]->description 
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
             <div class="col-sm-12">
                <div class="card table-responsive rounded">
                    <div class="card-body card-block"> 
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="viw-item">
                                    <strong>Category: </strong>
                                    <p>
                                        {{\App\Models\backend\admin\Category::where('id',$product[0]->category_id)->value('name')}}
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="viw-item">
                                    <strong>Child Category: </strong>
                                    <p>
                                        {{\App\Models\backend\admin\SubCategory::where('id',$product[0]->child_category_id)->value('name')}}

                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="viw-item">
                                    <strong>Grand Child Category: </strong>
                                    <p>
                                        {{\App\Models\backend\admin\GrandChildCategory::where('id',$product[0]->grand_child_category_id)->value('name')}}

                                    </p>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="viw-item">
                                    <strong>Size: </strong>
                                    <p class="badges size">Xl</p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="viw-item">
                                    <strong>Color: </strong>
                                    <p class="badges color">red</p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="viw-item">
                                    <strong>Condition: </strong>
                                    <p class="badges banner">
                                        {{$product[0]->condition}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="viw-item">
                                    <strong>Price: </strong>
                                    <p >{{$product[0]->price}} Tk</p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="viw-item">
                                    <strong>Sell Price: </strong>
                                    <p class="badges">{{$product[0]->sell_price}} Tk</p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="viw-item">
                                    <strong>Quantity: </strong>
                                    <p >{{$product[0]->qty}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="viw-item">
                                    <strong>Stock: </strong>
                                    <p class="badges size">{{$product[0]->stock}}</p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="viw-item">
                                    <strong>Product Image: </strong>
                                    <p>
                                        <img style="height: 200px;margin-top: 10px" src="{{asset($product[0]->photo)}}">
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="viw-item">
                                    <strong>Brand: </strong>
                                    <p class="badges brand">
                                        {{\App\Models\backend\admin\Brand::where('id',$product[0]->brand_id)->value('name')}}

                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="py-3">
            <div class="header-left"><h5><i class=""></i> Product Multiple Images</h5></div>
            
        </div>
        <div class="row">
             <div class="col-sm-12">
                @include('backend/admin/layouts/partials/message')
                <div class="card table-responsive rounded">
                    <div class="card-body card-block"> 
                        <div class="row p-3">
                           @foreach(App\models\backend\admin\MutliProductImg::where('product_id',$product[0]->id)->get() as $img)
                            <div class="col-sm-4">
                                <div class="view_mult_img">
                                    <img src="{{asset('upload/temp/'.$img->file)}}">
                                    <a href="{{url('admin/delete-view-image')}}/{{$img->id}}/{{$product[0]->id}}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div><!-- .animated -->
</div><!-- .content -->

@endsection

@section('script')
    <script>


        $('#is_parent').change(function(e){
            e.preventDefault();

            var is_checked = $('#is_parent').prop('checked');
            if (is_checked) {
                $('.parent_div').addClass('d-none');
            }else{
                $('.parent_div').removeClass('d-none');
            }
        });

        // selectpicker
        $('.selectpicker').selectpicker();

        $('.summernote').summernote({
              airMode: true
            });

    </script>

    <script>
        // category by child category get
    jQuery('#cat_id').change(function(){
        var cat_id = $(this).val();
        $.ajax({
            url: "/admin/category/child/"+cat_id,
            type: "POST",
            data:{
                _token: "{{csrf_token()}}",
                cat_id: cat_id,
            },
            success:function(response){
                var html_option = "<option val=''>--- Select Child Category ----</option>";
                if (response.status) {
                    $.each(response.data, function(id,name){
                        html_option+= '<option val="'+id+'">'+name+'</option>';
                    })
                }

                $('#child_cat').html(html_option);
            }
        });
    });

    </script>

<style>
.badges.size {
    width: 13%;
    border: 1px solid orange;
    text-align: center;
    font-weight: bold;
    margin-top: 10px;
}

.badges.banner {
    width: 30%;
    border: 1px solid blue;
    text-align: center;
    text-transform: capitalize;
    font-weight: bold;
    margin-top: 10px;
}

.view_mult_img img {
    width: 100%;
    height: 200px;
}

.view_mult_img {
    position: relative;
    margin-top: 29px;
}

.view_mult_img a {
    position: absolute;
    top: -12px;
    right: -8px;
    background: ;
    color: red;
    background: yellow;
    width: 25px;
    height: 25px;
    line-height: 25px;
    text-align: center;
    border-radius: 5px;
    box-shadow: 0px 1px 6px 2px antiquewhite;
}

.view_mult_img a:hover {
    background: white;
    color: orange;
    transition: .3s;
}
</style>
@endsection