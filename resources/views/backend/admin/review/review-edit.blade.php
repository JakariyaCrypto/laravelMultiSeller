@extends('backend/admin/layouts/master')
@section('title','Admin | Review-Edit')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="py-3 d-flex justify-content-between align-items-center">
                <div class="header-left"><h5><i class="fa fa-bars"></i> Edit Review</h5></div>
                <div class="header-rith"><a href="{{route('review')}}" class="btn btn-success rounded"><i class="fa fa-arrow-left"></i> Back</a></div>
            </div>
            
        <div class="row">
            
            <div class="col-md-12">
                <div class="card table-responsive rounded">
                <div class="card-body card-block"> 
                       <form action="{{route('review.update',$edit->id)}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" name="product_id" value="{{$edit->product_id}}" id="rating_pro_id">
                         <input type="hidden" class="form-control" name="rating" id="rating_point" value="{{$edit->rating}}">
                          <?php 
                            $rating = $edit->rating + 1;
                            // echo $rating;exit;
                          ?>
                          
                          <div class="form-group mt-3 review-blank-star">
                            @for($i=1;$i<6;$i++)
                                @if($rating > $i)
                                    <img class="blank_star" src="{{asset('frontend/assets/images/star.png')}}" id="{{$i}}_star">
                                @else
                                 <img class="blank_star" src="{{asset('frontend/assets/images/blank_star.png')}}" id="{{$i}}_star">
                                @endif
                            @endfor


                            @error('rating')
                                <div class="alert alert-danger">
                                    <span>{{$message}}</span>
                                </div>
                            @enderror
                          </div>
                          <h6 style="margin-bottom: 5px">Comment  <span class="text text-info">*</span></h6>
                          <div class="form-group">
                            <input type="text" class="form-control" name="comment" id="comment" value="{{$edit->comment}}">
                            @error('comment')
                                <div class="alert alert-danger">
                                    <span>{{$message}}</span>
                                </div>
                            @enderror
                          </div>
                          <h6 style="margin-bottom: 5px">Description </h6>
                          <div class="form-group">
                            <textarea type="text" class="form-control" name="des">{{$edit->des}}</textarea>
                          </div>
                          <h6 style="margin-bottom: 5px">Status <span class="text text-info">*</span></h6>
                          <div class="form-group">
                            <select name="status" class="form-control">
                                <option value="">----- Select Status -----</option>
                                <option value="active" {{$edit->status == 'active' ? 'selected': ''}}>Active</option>
                                <option value="inactive" {{$edit->status == 'inactive' ? 'selected': ''}}>Inactive</option>
                            </select>
                            @error('status')
                                <div class="alert alert-danger">
                                    <span>{{$message}}</span>
                                </div>
                            @enderror
                          </div>
                          @csrf
                          <button type="submit" class="btn btn-primary">Update</button>
                       </form>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<style>
/*rating reviw*/
.rating-star {
    display: flex;
    align-items: center;
}

.rating-star img {
    width: 19px !important;
    height: 18px !important;
}
</style>
@endsection

@section('script')
<script src="{{asset('rating/rating.js')}}"></script>
@endsection