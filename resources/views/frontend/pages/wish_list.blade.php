@extends('frontend/layouts/master')
@section('title','NS Mart | Wish-List')

@section('content')
<main class="main">
        	<div class="page-header text-center" style="background-image: url({{asset('frontend/assets/images/page-header-bg.jpg')}})">
        		<div class="container">
        			<h1 class="page-title">Wishlist<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('frontend')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('shop')}}">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="container">
                    @if(session()->has('success'))
                    <div class="alert alert-success">
                        <span>{{session()->get('success')}}</span>
                    </div>
                    @endif
                    <div id="wish_list">
                        @include('frontend/layouts/partials/wishlist')
                    </div>
            		
					
	            	<div class="wishlist-share">
	            		<div class="social-icons social-icons-sm mb-2">
	            			<label class="social-label">Share on:</label>
	    					<a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
	    					<a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
	    					<a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
	    					<a href="#" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
	    					<a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
	    				</div><!-- End .soial-icons -->
	            	</div><!-- End .wishlist-share -->
            	</div><!-- End .container -->
            </div><!-- End .page-content -->
        </main>



@endsection

@section('script')

<script>

$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});



    $(document).on('click','.wish_destroy', function(e){
        e.preventDefault();

        var url = "{{route('wish.destroy')}}";
        var rowId = $(this).data('row_id');
        var token = "{{csrf_token()}}";
        // alert(rowId);

        swal({
          title: "Are you sure?",
          text: "Delete the Brand",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
            
          if (willDelete) {

            $.ajax({
                url: url,
                type: "post",
                dataType: 'JSON',
                data: {
                    row_id : rowId,
                    _token : token,
                },
                success:function(data){
                    if (data['status'] == true) {
                     $('body #header_ajax').html(data['header']);
                     $('body #wish_list').html(data['wish_list']);
                    }
                }
            });

            swal("Done! Wishlist Product Deleted Successfull!", {
              icon: "success",
            });
      } else {
        swal("click to ok!");
      }
    });

    })
</script>

@endsection