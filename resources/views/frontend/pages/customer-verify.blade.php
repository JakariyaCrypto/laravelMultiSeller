
@extends('frontend/layouts/master')
@section('title','NS Mart | Verification')

@section('content')
<main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('frontend')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('customer.auth')}}">Registration</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Verification</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('assets/images/backgrounds/login-bg.jpg')">
            	<div class="container">
            		@include('backend/admin/layouts/partials/message')
            		<div class="form-box">
            			<div>
            				<span id="success" class="warning"></span>
            			</div>
            				<form action="{{route('customer.verify')}}" method="POST">
						    		@csrf
						    		<div class="form-group">
						    			<label for="singin-email-2">Enter 5 Digit Verification Code *</label>
						    			<input type="text" class="form-control" name="token" value="" autocomplete="email" autofocus>
                                        <input type="hidden" name="token" value="{{$token}}">
						    		</div><!-- End .form-group -->
						    		@error('token')
                                    <div class="alert alert-danger">
                                    	<strong>{{ $message }}</strong>
                                    </div>
                                	@enderror

						    		<div class="form-footer">
					    			<button type="submit" class="btn btn-outline-primary-2">
	                					<span>Verify Now</span>
	            						<i class="icon-long-arrow-right"></i>
	                				</button>		
						    	</form>
							</div><!-- End .tab-content -->
						</div><!-- End .form-tab -->
            		</div><!-- End .form-box -->
            	</div><!-- End .container -->
            </div><!-- End .login-page section-bg -->
        </main><!-- End .main -->

@endsection

@section('style')

<style>
.bg-image {
	background-color: transparent !important;
}
</style>

@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>


<script>

</script>
@endsection


