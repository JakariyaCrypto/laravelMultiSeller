@extends('backend/admin/layouts/master')
@section('title','Admin Banner')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="py-3 d-flex justify-content-between align-items-center">
                <div class="header-left"><h5><i class="fa fa-bars"></i> Add Banner</h5></div>
                <div class="header-rith"><a href="{{route('banner.index')}}" class="btn btn-success rounded"><i class="fa fa-arrow-left"></i> Back</a></div>
            </div>
            
        <div class="row">
            
            <div class="col-md-6 offset-md-3">
                <div class="card table-responsive rounded">
                <div class="card-body card-block"> 
                       <form action="{{route('banner.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                       <div class="has-success form-group">
                            <label for="inputIsValid" class=" form-control-label">Baner Title <strong class="text-primary"> *</strong></label>
                            <input type="text" id="title" name="title" class="is-valid form-control-success form-control">
                            @error('title')
                                <div class="alert alert-danger">
                                    <span>{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="has-success form-group">
                            <label for="inputIsValid" class=" form-control-label">Choose Banner <strong class="text-primary"> *</strong></label>
                            <input type="file" id="photo" name="photo" class="form-controll-success form-control">
                            @error('photo')
                                <div class="alert alert-danger">
                                    <span>{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="has-success form-group">
                            <label for="inputIsValid" class=" form-control-label">Description</label>
                           <textarea name="description" id="" cols="30" rows="6" class="form-control"></textarea>
                            
                        </div>
                        <div class="has-success form-group">
                            <label for="inputIsValid" class="form-control-label">Banner Condition <strong class="text-primary"> *</strong></label> 
                            <select name="conditional" class="form-control">
                                <option value="">--- select condition ----</option>
                                <option value="banner">Banner</option>
                                <option value="promo">Promo</option>
                            </select>
                             @error('conditional')
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