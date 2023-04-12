@extends('backend/admin/layouts/master')
@section('title','Admin Coupon')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="py-3 d-flex justify-content-between align-items-center">
                <div class="header-left"><h5><i class="fa fa-bars"></i> Add Coupon</h5></div>
                <div class="header-rith"><a href="{{route('coupon.index')}}" class="btn btn-success rounded"><i class="fa fa-arrow-left"></i> Back</a></div>
            </div>
            
        <div class="row">
            
            <div class="col-sm-12">
                <div class="card table-responsive rounded">
                <div class="card-body card-block"> 
                       <form action="{{route('coupon.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                       <div class="has-success form-group">
                            <label for="inputIsValid" class=" form-control-label">Coupon Code <strong class="text-primary"> *</strong></label>
                            <input type="text" id="code" name="code" class="is-valid form-control-success form-control">
                            @error('code')
                                <div class="alert alert-danger">
                                    <span>{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="has-success form-group">
                            <label for="inputIsValid" class=" form-control-label">Coupon Value <strong class="text-primary"> *</strong></label>
                            <input type="text" id="value" name="value" class="is-valid form-control-success form-control" placeholder="eg.10% or 100">
                            @error('code')
                                <div class="alert alert-danger">
                                    <span>{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="has-success form-group">
                            <label for="inputIsValid" class=" form-control-label">Coupon Type <strong class="text-primary"> *</strong></label>
                            <select id="type" name="type" class="is-valid form-control-success form-control">
                                <option value="fixed">Fixted</option>
                                <option value="percent">Percentage</option>
                            </select>
                            @error('code')
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