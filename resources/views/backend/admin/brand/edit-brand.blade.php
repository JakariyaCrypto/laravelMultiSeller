@extends('backend/admin/layouts/master')
@section('title','Admin Brand')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="py-3 d-flex justify-content-between align-items-center">
                <div class="header-left"><h5><i class="fa fa-bars"></i> Edit Brand</h5></div>
                <div class="header-rith"><a href="{{route('banner.index')}}" class="btn btn-success rounded"><i class="fa fa-arrow-left"></i> Back</a></div>
            </div>
            
        <div class="row">
            
            <div class="col-md-6 offset-md-3">
                <div class="card table-responsive rounded">
                <div class="card-body card-block"> 
                       <form action="{{route('brand.update',$edit->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                       <div class="has-success form-group">
                            <label for="inputIsValid" class=" form-control-label">Name <strong class="text-primary"> *</strong></label>
                            <input type="text" id="name" name="name" class="is-valid form-control-success form-control" value="{{$edit->name}}">
                            @error('name')
                                <div class="alert alert-danger">
                                    <span>{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="has-success form-group">
                            <label for="inputIsValid" class=" form-control-label">Choose Banner <strong class="text-primary"> *</strong></label>
                            <input type="file" id="photo" name="photo" class="form-controll-success form-control">
                            <div class="edit-img">
                                <img src="{{asset($edit->photo)}}" style="width:200px;height: 150px;">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Update
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