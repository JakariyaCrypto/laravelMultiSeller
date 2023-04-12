@extends('backend/seller/layouts/master')
@section('title','Seller Product')

@section('content')
<div class="content mb-5 mt-3">
    <div class="animated fadeIn">
        <div class="py-3 d-flex justify-content-between align-items-center">
            <div class="header-left"><h5><i class="fa fa-bars"></i> Add Product</h5></div>
            <div class="header-rith"><a href="{{route('products.index')}}" class="btn btn-success btn-sm rounded"><i class="fa fa-arrow-left"></i> Back</a></div>
        </div>
        <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
         @csrf     
            <div class="row">
                <div class="col-sm-12">
                    <div class="card table-responsive rounded">
                    <div class="card-body card-block"> 
                          
                           <div class="has-success form-group">
                                <label for="inputIsValid" class=" form-control-label">Product Name <strong class="text-primary"> *</strong></label>
                                <input type="text" id="name" name="name" class="is-valid form-control-success form-control">
                                @error('name')
                                    <div class="alert alert-danger">
                                        <span>{{$message}}</span>
                                    </div>
                                @enderror 
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="has-success form-group">
                                        <label for="inputIsValid" class="form-control-label"> Category <strong class="text-primary"> *</strong></label> 
                                        <select id="cat_id" name="category_id" class="form-control">
                                            <option value="">--- Select Parent Category ----</option>
                                            @foreach(App\models\backend\admin\Category::where('status','active')->get() as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
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
                                        <select id="grand_child" name="grand_child_category_id" class="form-control">
                                            <option value="">--- Select Grand Child Category ----</option>
                                            
                                           
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
                                            
                                            <option value="yes">Yes </option>
                                            <option value="no">No</option>
                                           
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
                                            <option value="{{$size->id}}">{{$size->size}}</option>
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
                                            <option value="{{$color->id}}">{{$color->color}}</option>
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
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="has-success form-group">
                                        <label for="inputIsValid" class="form-control-label">Condition <strong class="text-primary"> *</strong></label> 
                                        <select name="condition" class="form-control">
                                            <option value="">--- Condition ----</option>
                                            
                                            <option value="new">New</option>
                                            <option value="feature">Feature</option>
                                            <option value="best-seller">Best-Seller</option>  
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
                                        <input type="text" id="qty" name="qty" class="is-valid form-control-success form-control">
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
                                        <input type="text" id="price" name="price" class="is-valid form-control-success form-control">
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
                                        <input type="text" id="sell_price" name="sell_price" class="is-valid form-control-success form-control">
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
                            </div>
                            <div class="has-success form-group">
                                <label for="inputIsValid" class=" form-control-label">Description</label>
                               <textarea id="summernote" name="description" id="" cols="30" rows="6" class="form-control summernote"></textarea>
                            </div>
                            <div class="has-success form-group">
                                <label for="inputIsValid" class=" form-control-label">Additional Information</label>
                               <textarea id="summernote" name="aditional" id="" cols="30" rows="6" class="form-control summernote"></textarea>
                            </div>
                            <div class="has-success form-group">
                                <label for="inputIsValid" class=" form-control-label">Return & Condition</label>
                               <textarea id="summernote" name="return" id="" cols="30" rows="6" class="form-control summernote"></textarea>
                            </div>
                            
                           
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="product-btn btn btn-success btn-md rounded">
                <i class="fa fa-dot-circle-o"></i> Create Product
            </button>
        </form>
        <div class="row my-3">
            <div class="col-sm-12">
                <h5 class="mb-3">Upload Product Multi Images </h5>
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
    </div><!-- .animated -->
</div><!-- .content -->

@endsection

@section('script')
    <script src="{{asset('backend/assets/dropzone/dropzone.min.js')}}" ></script>

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
                    $.each(response.data, function(arrKey,arrVal){
                        html_option+= '<option value="'+arrVal.id+'">'+arrVal.name+'</option>';
                    })
                }

                $('#child_cat').html(html_option);
            }
        });
    });

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
                        html_option+= '<option value="'+arrVal.id+'">'+arrVal.name+'</option>';
                    })
                }

                $('#grand_child').html(html_option);
            }
        });
    })
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
            acceptedFiles: ".jpeg,.jpg,.png,.gif,.webp",
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


</style>
@endsection