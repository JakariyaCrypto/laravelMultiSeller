@extends('backend/admin/layouts/master')
@section('title','Admin/Edit Product')

@section('content')
<div class="content mb-5 mt-3">
    <div class="animated fadeIn">
        <div class="py-3 d-flex justify-content-between align-items-center">
            <div class="header-left"><h5><i class="fa fa-bars"></i> Edit Product</h5></div>
            <div class="header-rith"><a href="{{route('product.index')}}" class="btn btn-success rounded"><i class="fa fa-arrow-left"></i> Back</a></div>
        </div>
        <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
         @csrf     
         @method('patch')
            <div class="row">
                <div class="col-sm-12">
                    <div class="card table-responsive rounded">
                    <div class="card-body card-block"> 
                          
                           <div class="has-success form-group">
                                <label for="inputIsValid" class=" form-control-label">Product Name <strong class="text-primary"> *</strong></label>
                                <input type="text" id="name" name="name" class="is-valid form-control-success form-control" value="{{$product->name}}">
                                @error('name')
                                    <div class="alert alert-danger">
                                        <span>{{$message}}</span>
                                    </div>
                                @enderror 
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="has-success form-group">
                                        <label for="inputIsValid" class="form-control-label"> Parent Category <strong class="text-primary"> *</strong></label> 
                                        <select id="cat_id" name="category_id" class="form-control">
                                            <option value="">--- Select Parent Category ----</option>
                                            @foreach(App\models\Category::where('is_parent',1)->get() as $category)
                                            <option value="{{$category->id}}"
                                                {{$category->id == $product->category_id ? 'selected' : ''}}
                                                >{{$category->name}}</option>
                                                }
                                           @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div id="child_cat_div" class="has-success form-group">
                                        <label for="inputIsValid" class="form-control-label"> Child Category <strong class="text-primary"> </strong></label> 
                                        <select id="child_cat" name="child_category_id" class="form-control">
                                            <option value="">--- Select Child Category ----</option>

                                          
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="has-success form-group">
                                        <label for="inputIsValid" class="form-control-label"> Grand Child Category <strong class="text-primary"> </strong></label> 
                                        <select name="grand_child_category_id" class="form-control">
                                            <option value="">--- Select Grand Child Category ----</option>
                                            
                                            <option value="">category</option>
                                           
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="has-success form-group">
                                        <label for="inputIsValid" class="form-control-label"> Stock <strong class="text-primary"> *</strong></label> 
                                        <select name="stock" class="form-control">
                                            <option value="">--- Select Stock ----</option>
                                            
                                            <option value="yes" {{$product->stock == 'yes' ? 'selected' : ''}}>Yes </option>
                                            <option value="no" {{$product->stock == 'no' ? 'selected' : ''}}>No</option>
                                           
                                        </select>
                                    </div>
                                    @error('stock')
                                    <div class="alert alert-danger">
                                        <span>{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <div class="has-success form-group">
                                        <label for="inputIsValid" class="form-control-label">Size <strong class="text-primary"> *</strong></label> 
                                        <select  name="size_id" class="form-control">
                                            <option value="">--- Select Size ----</option>
                                          
                                            @foreach(App\models\backend\admin\Size::where('status','active')->get() as $size)
                                            <option value="{{$size->id}}"
                                                {{$size->id == $product->size_id ? 'selected' : ''}}
                                                >{{$size->size}}</option>
                                                }
                                            @endforeach
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="has-success form-group">
                                        <label for="people"> Color <strong class="text-primary">* </strong></label> 
                                        <select name="color_id" class="form-control">
                                            <option value="">--- Select Color ----</option>
                                            @foreach(App\models\backend\admin\Color::where('status','active')->get() as $color)
                                            <option value="{{$color->id}}"
                                                {{$color->id == $product->color_id ? 'selected' : ''}}
                                                >{{$color->color}}</option>
                                                }
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="has-success form-group">
                                        <label for="inputIsValid" class="form-control-label"> Brand <strong class="text-primary"> *</strong></label> 
                                        <select name="brand_id" class="form-control">
                                            <option value="">--- Select Brand ----</option>
                                            
                                            @foreach(App\models\backend\admin\Brand::where('status','active')->get() as $brand)
                                            <option value="{{$brand->id}}"
                                                {{$brand->id == $product->brand_id ? 'selected' : ''}}
                                                >{{$brand->name}}</option>
                                                }
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="has-success form-group">
                                        <label for="inputIsValid" class="form-control-label">Condition <strong class="text-primary"> *</strong></label> 
                                        <select name="condition" class="form-control">
                                            <option value="">--- Condition ----</option>
                                            
                                            <option value="new" {{$product->condition == 'new' ? 'selected' : ''}}>New</option>
                                            <option value="feature" {{$product->condition == 'feature' ? 'selected' : ''}}>Feature</option>
                                            <option value="best-seller" {{$product->condition == 'best-seller' ? 'selected' : ''}}>Best-Seller</option>  
                                        </select>
                                    </div>
                                    @error('condition')
                                    <div class="alert alert-danger">
                                        <span>{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <div class="has-success form-group">
                                        <label> Qty <strong class="text-primary">* </strong></label> 
                                        <input type="text" id="qty" name="qty" class="is-valid form-control-success form-control" value="{{$product->qty}}">
                                        @error('qty')
                                            <div class="alert alert-danger">
                                                <span>{{$message}}</span>
                                            </div>
                                        @enderror 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="has-success form-group">
                                        <label> Price <strong class="text-primary">* </strong></label> 
                                        <input type="text" id="price" name="price" class="is-valid form-control-success form-control" value="{{$product->price}}">
                                        @error('price')
                                            <div class="alert alert-danger">
                                                <span>{{$message}}</span>
                                            </div>
                                        @enderror 
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="has-success form-group">
                                        <label> Sell Price <strong class="text-primary">* </strong></label> 
                                        <input type="text" id="sell_price" name="sell_price" class="is-valid form-control-success form-control" value="{{$product->sell_price}}">
                                        @error('sell_price')
                                            <div class="alert alert-danger">
                                                <span>{{$message}}</span>
                                            </div>
                                        @enderror 
                                    </div>
                                </div>
                            </div>

                            <!-- 01710026083 -->
                            <div class="has-success form-group">
                                <label for="inputIsValid" class=" form-control-label">Choose Photo <strong class="text-primary"> </strong></label>
                                <input type="file" id="photo" name="photo" class="form-controll-success form-control">
                                @error('photo')
                                    <div class="alert alert-danger">
                                        <span>{{$message}}</span>
                                    </div>
                                @enderror
                                <div class="preview-img">
                                    <img src="{{asset($product->photo)}}" style="height: 300px;width: 350px;padding: 10px">
                                </div>
                            </div>
                            <div class="has-success form-group">
                                <label for="inputIsValid" class=" form-control-label">Description</label>
                               <textarea id="summernote" name="description" id="" cols="30" rows="6" class="form-control summernote">{{$product->description}}</textarea>
                                
                            </div>
                            
                           
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="product-btn btn btn-success btn-md rounded">
                <i class="fa fa-dot-circle-o"></i> Update Product
            </button>
        </form>
        <div class="row my-3">
            <div class="col-sm-12">
                <h5 class="mb-3">Upload Product Multiple Images </h5>
                <div class="card table-responsive rounded">
                    <div id="danger_msg">
                        
                    </div>
                    <div class="card-body card-block"> 
                        <form method="post" action="{{route('temp.store')}}" enctype="multipart/form-data" 
                  class="dropzone" id="dropzone">
                    @csrf
                </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
             <div class="col-sm-12">
                @include('backend/admin/layouts/partials/message')
                <div class="card table-responsive rounded">
                    <div class="card-body card-block"> 
                        <div class="row p-3">
                           @foreach(App\models\backend\admin\MutliProductImg::where('product_id',$product->id)->get() as $img)
                            <div class="col-sm-4">
                                <div class="view_mult_img">
                                    <img src="{{asset('upload/temp/'.$img->file)}}">
                                    <a href="{{url('admin/delete-product-image')}}/{{$img->id}}/{{$product->id}}">
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
        var category_id = JSON.parse("{!! json_encode($product->child_category_id) !!}");
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
                        html_option+= "<option value='"+id+"' "+(category_id==id ? 'selected' : '')+"> "+name+" </option>";
                    })
                }

                $('#child_cat').html(html_option);
            }
        });
    });

    if (category_id != null) {
        $('#cat_id').change();
    }

var grand_id = JSON.parse("{!! json_encode($product->grand_child_category_id) !!}");
    jQuery('#child_cat').change(function(){
        var sub_cat_id = $(this).val();
        $.ajax({
            url: "/admin/category/grand-child/"+sub_cat_id,
            type: "POST",
            data:{
                _token: "{{csrf_token()}}",
                sub_cat_id: sub_cat_id,
            },
            success:function(response){
                var html_option = "<option val=''>--- Select Grand Child Category ----</option>";
                if (response.status) {
                    $.each(response.data, function(arrKey,arrVal){
                        html_option+= '<option value="'+arrVal.id+'" "+(grand_id==id ? 'selected' : '')+">'+arrVal.name+'</option>';
                    })
                }

                $('#grand_child').html(html_option);
            }
        });
    })

     if (category_id != null) {
        $('#cat_id').change();
    }

    </script>

<script>
 Dropzone.options.dropzone =
         {
            maxFilesize: 12,
            renameFile: function(file) {
                // var dt = new Date();
                // var time = dt.getTime();
               return file.name;
               
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 50000,

            removedfile: function(file) 
            {
                var name = file.name;

                $.ajax({
                    headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                    type: 'POST',
                    url: '{{ route("temp.destroy") }}',
                    data: {filename: name},
                    success: function (data){
                        console.log("File has been successfully removed!!");
                    },
                    error: function(e) {
                        console.log(e);
                    }});

                    var fileRef;
                    return (fileRef = file.previewElement) != null ? 
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
       
            success: function(file, response) 
            {
                if (response.status) {
                    alert(response.msg);
                }

                console.log(response);
            },
            error: function(file, response)
            {
               return false;
            }
};

</script>

<style>
.product-btn {
    position: absolute;
    bottom: -34px;
    left: 0;
}

.animated.fadeIn {
    position: relative;
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