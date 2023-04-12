@extends('backend/admin/layouts/master')
@section('title','Admin Coupon')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="py-3 d-flex justify-content-between align-items-center">
                <div class="header-left"><h5><i class="fa fa-bars"></i> Edit Coupon</h5></div>
                <div class="header-rith"><a href="{{route('coupon.index')}}" class="btn btn-success rounded"><i class="fa fa-arrow-left"></i> Back</a></div>
            </div>
            
        <div class="row">
            
            <div class="col-sm-12">
                <div class="card table-responsive rounded">
                <div class="card-body card-block"> 
                       <form action="{{route('coupon.update',$edit->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                       <div class="has-success form-group">
                            <label for="inputIsValid" class=" form-control-label">Coupon Code <strong class="text-primary"> *</strong></label>
                            <input value="{{$edit->code}}" type="text" id="code" name="code" class="is-valid form-control-success form-control">
                            @error('color')
                                <div class="alert alert-danger">
                                    <span>{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="has-success form-group">
                            <label for="inputIsValid" class=" form-control-label">Coupon Value <strong class="text-primary"> *</strong></label>
                            <input type="text" id="value" name="value" class="is-valid form-control-success form-control" placeholder="eg.10%" value="{{$edit->value}}">
                            @error('code')
                                <div class="alert alert-danger">
                                    <span>{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="has-success form-group">
                            <label for="inputIsValid" class=" form-control-label">Coupon Type <strong class="text-primary"> *</strong></label>
                            <select id="type" name="type" class="is-valid form-control-success form-control">
                                <option value="fixed" {{$edit->type == 'fixed' ? 'selected' : ''}}>Fixted</option>
                                <option value="percent" {{$edit->type == 'percent' ? 'selected' : ''}}>Percentage</option>
                            </select>
                            @error('code')
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