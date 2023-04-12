@extends('backend/admin/layouts/master')
@section('title','Admin Currency')
@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="py-3 d-flex justify-content-between align-items-center">
                <div class="header-left"><h5><i class="fa fa-bars"></i> Edit Currency</h5></div>
                <div class="header-rith"><a href="{{route('currency.index')}}" class="btn btn-success rounded btn-sm"><i class="fa fa-arrow-left"></i> Back</a></div>
            </div>
            
        <div class="row">
            
            <div class="col-sm-12">
                <div class="card table-responsive rounded">
                <div class="card-body card-block"> 
                       <form action="{{route('currency.update',$edit->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                       <div class="has-success form-group">
                            <label for="inputIsValid" class=" form-control-label">Name <strong class="text-primary"> *</strong></label>
                            <input value="{{$edit->name}}" type="text" id="name" name="name" class="is-valid form-control-success form-control">
                            @error('name')
                                <div class="alert alert-danger">
                                    <span>{{$message}}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="has-success form-group">
                            <label for="inputIsValid" class=" form-control-label">Symbol <strong class="text-primary"> *</strong></label>
                            <input type="text" id="symbol" name="symbol" class="is-valid form-control-success form-control" value="{{$edit->symbol}}">
                            @error('symbol')
                                <div class="alert alert-danger">
                                    <span>{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="has-success form-group">
                            <label for="inputIsValid" class=" form-control-label">Price <strong class="text-primary"> *</strong></label>
                            <input type="text" id="exchange_rate" name="exchange_rate" class="is-valid form-control-success form-control" value="{{$edit->exchange_rate}}">
                            @error('exchange_rate')
                                <div class="alert alert-danger">
                                    <span>{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="has-success form-group">
                            <label for="inputIsValid" class=" form-control-label">Code <strong class="text-primary"> *</strong></label>
                            <input type="text" id="code" name="code" class="is-valid form-control-success form-control" value="{{$edit->code}}">
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