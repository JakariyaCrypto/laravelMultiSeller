<?php
    $product_id = session()->get('product_id');
?>
@if($product_id)
<h3>Reviews ({{count(App\Models\frontend\Review::where('product_id',$product_id)->get())}})</h3>
@foreach(App\Models\frontend\Review::where('product_id',$product_id)->orderBy('id','DESC')->get() as $review)
<div class="review">
    <div class="row no-gutters">
        <div class="col-auto">
            <h4><a href="#">{{App\Models\User::where('id',$review->customer_id)->value('name')}}</a></h4>
            <div class="ratings-container">
                <div class="rating-star">
                    
                        @for($i=0; $i<5; $i++ )
                            @if($review->rating > $i) 
                            <img src="{{asset('frontend/assets/images/star.png')}}">
                            @else
                                <img src="{{asset('frontend/assets/images/blank_star.png')}}">
                            @endif
                        @endfor
                </div>
            </div><!-- End .rating-container -->
            <span class="review-date">{{\Illuminate\Support\Carbon::parse($review->created_at)->format('M-d-y')}}</span>
        </div><!-- End .col -->
        <div class="col">
            <h4>{{$review->comment}}</h4>

            <div class="review-content">
                <p>{{$review->des}}</p>
            </div><!-- End .review-content -->

        </div><!-- End .col-auto -->
    </div><!-- End .row -->
</div><!-- End .review -->
@endforeach
@endif