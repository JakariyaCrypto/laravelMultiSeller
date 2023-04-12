@extends('backend/admin/layouts/master')
@section('title','Admin Grand Child Category')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="py-3 d-flex justify-content-between align-items-center">
                <div class="header-left"><h5><i class="fa fa-bars"></i> Add Grand Child Category</h5></div>
                <div class="header-rith"><a href="{{route('grand-child-category.index')}}" class="btn btn-success btn-sm rounded"><i class="fa fa-arrow-left"></i> Back</a></div>
            </div>
            
        <div class="row">
            
            <div class="col-sm-12">
                <div class="card table-responsive rounded">
                <div class="card-body card-block"> 
                       <form action="{{route('grand-child-category.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="has-success form-group">
                            <label for="inputIsValid" class=" form-control-label">Select Child Category <strong class="text-primary"> </strong></label>
                            <select name="sub_cat_id" class="form-control-success form-control">
                                <option value="">--- Select Child Category ---</option>

                                @foreach($Categories as $cat)
                                <option value="{{$cat->id}}">----{{$cat->name}}----</option>
                                @foreach(\App\Models\backend\admin\SubCategory::where('category_id',$cat->id)->get() as $subcat)
                                    <option value="{{$subcat->id}}">{{$subcat->name}}</option>
                                @endforeach
                                @endforeach

                            </select>

                            @error('sub_cat_id')
                                <div class="alert alert-danger">
                                    <span>{{$message}}</span>
                                </div>
                            @enderror
                        </div>


                       <div class="has-success form-group">
                            <label for="inputIsValid" class=" form-control-label">Grand Child Category Name <strong class="text-primary"> *</strong></label>
                            <input type="text" id="name" name="name" class="is-valid form-control-success form-control">
                            @error('name')
                                <div class="alert alert-danger">
                                    <span>{{$message}}</span>
                                </div>
                            @enderror 
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

                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                       </form>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->

@endsection

@section('script')
    <script>
        $(document).ready(function() {
        $('#summernote').summernote();
        });


        $('#is_parent').change(function(e){
            e.preventDefault();

            var is_checked = $('#is_parent').prop('checked');
            if (is_checked) {
                $('.parent_div').removeClass('d-none');
                
            }else{
                $('.parent_div').addClass('d-none');
            }
        });
    </script>
@endsection