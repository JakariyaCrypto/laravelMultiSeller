@extends('backend/admin/layouts/master')
@section('title','Admin Setting Edit')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="py-3 d-flex justify-content-between align-items-center">
                <div class="header-left"><h5><i class="fa fa-bars"></i> Setting Edit</h5></div>
                <div class="header-rith"><a href="{{route('section.index')}}" class="btn btn-success rounded"><i class="fa fa-arrow-left"></i> Back</a></div>
            </div>
            
        <div class="row">
            
            <div class="col-sm-12">
                @include('backend/admin/layouts/partials/message')
                <div class="card table-responsive rounded">
                <div class="card-body card-block"> 
                       <form action="{{route('section.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                       <div class="row">
                           <div class="col-sm-4">
                               <div class="has-success form-group">
                                    <label for="inputIsValid" class=" form-control-label">Software Name <strong class="text-primary"> *</strong></label>
                                    <input type="text" id="name" name="name" class="is-valid form-control-success form-control">
                                    @error('name')
                                        <div class="alert alert-danger">
                                            <span>{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                           </div>
                           <div class="col-sm-4">
                               <div class="has-success form-group">
                                    <label for="inputIsValid" class=" form-control-label">Mobile <strong class="text-primary"> *</strong></label>
                                    <input type="text" id="mobile" name="mobile" class="is-valid form-control-success form-control">
                                    
                                </div>
                           </div>
                           <div class="col-sm-4">
                               <div class="has-success form-group">
                                    <label for="inputIsValid" class=" form-control-label">E-mail <strong class="text-primary"> *</strong></label>
                                    <input type="text" id="email" name="email" class="is-valid form-control-success form-control">
                                    
                                </div>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-sm-4">
                               <div class="has-success form-group">
                                    <label for="inputIsValid" class=" form-control-label">Main Logo <strong class="text-primary"> *</strong></label>
                                    <input type="file" name="logo" class="is-valid form-control-success form-control">
                                </div>
                           </div>
                           <div class="col-sm-4">
                               <div class="has-success form-group">
                                    <label for="inputIsValid" class=" form-control-label">Footer Logo <strong class="text-primary"> *</strong></label>
                                    <input type="file" name="footer_logo" class="is-valid form-control-success form-control">
                                </div>
                           </div>
                           <div class="col-sm-4">
                               <div class="has-success form-group">
                                    <label for="inputIsValid" class=" form-control-label">Footer Discription <strong class="text-primary"> *</strong></label>
                                    <textarea type="file" name="footer_logo" class="is-valid form-control-success form-control"></textarea>
                                </div>
                           </div>
                       </div>
                        <div class="has-success form-group">
                            <label for="inputIsValid" class=" form-control-label">Category <strong class="text-primary"> *</strong></label>
                            <select name="category_id" class="form-control-success form-control">
                                <option>--- select category ---</option>
                                @foreach(\App\Models\backend\admin\Category::orderBy('id','desc')->get() as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                            @error('name')
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
    </script>
@endsection