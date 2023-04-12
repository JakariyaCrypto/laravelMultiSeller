@extends('backend/admin/layouts/master')
@section('title','Admin Color')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="py-3 d-flex justify-content-between align-items-center">
                <div class="header-left"><h5><i class="fa fa-bars"></i> Edit Color</h5></div>
                <div class="header-rith"><a href="{{route('color.index')}}" class="btn btn-success btn-sm rounded"><i class="fa fa-arrow-left"></i> Back</a></div>
            </div>
            
        <div class="row">
            
            <div class="col-sm-12">
                <div class="card table-responsive rounded">
                <div class="card-body card-block"> 
                       <form action="{{route('color.update',$edit->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                       <div class="has-success form-group">
                            <label for="inputIsValid" class=" form-control-label">Color <strong class="text-primary"> *</strong></label>
                            <input value="{{$edit->color}}" type="text" id="color" name="color" class="is-valid form-control-success form-control">
                            @error('color')
                                <div class="alert alert-danger">
                                    <span>{{$message}}</span>
                                </div>
                            @enderror
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