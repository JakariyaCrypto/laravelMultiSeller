
@extends('frontend/layouts/master')
@section('title','NS Mart | Login&Registration')

@section('content')
<main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Login</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('assets/images/backgrounds/login-bg.jpg')">
            	<div class="container">
            		<div class="form-box">
            			@include('backend/admin/layouts/partials/message')
            			<div>
            				<span id="success" class="warning"></span>
            			</div>
            			<div class="form-tab">
	            			<ul class="nav nav-pills nav-fill" role="tablist">
	            				@if(session()->has('customer'))
							    
							    @else
							    <li class="nav-item">
							        <a class="nav-link active" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab" aria-controls="signin-2" aria-selected="false">Sign In</a>
							    </li>
							    @endif
							    <li class="nav-item">
							        <a class="nav-link {{session()->has('customer') == true ? 'active' : ''}} id="register-tab-2" data-toggle="tab" href="#register-2" role="tab" aria-controls="register-2" aria-selected="true">Register</a>
							    </li>
							</ul>
							<div class="tab-content">
								@if(session()->has('customer'))
							    
							    @else
							    <div class="tab-pane fade show active" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
							    	<form action="{{route('customer.login')}}" method="POST">
							    		@csrf
							    		<div class="form-group">
							    			<label for="singin-email-2">Username or email address *</label>
							    			<input type="text" class="form-control" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
							    			<input type="hidden" name="token" value="verify">
							    		</div><!-- End .form-group -->
							    		@error('email')
	                                    <div class="alert alert-danger">
	                                    	<strong>{{ $message }}</strong>
	                                    </div>
	                                	@enderror
							    		<div class="form-group">
							    			<label for="singin-password-2">Password *</label>
							    			<input type="password" class="form-control" name="password" autocomplete="current-password">
							    		</div><!-- End .form-group -->
							    		@error('password')
	                                    <div class="alert alert-danger">
	                                    	<strong>{{ $message }}</strong>
	                                    </div>
	                                	@enderror
							    		<div class="form-footer">
							    			<button type="submit" class="btn btn-outline-primary-2">
			                					<span>SIGN IN</span>
			            						<i class="icon-long-arrow-right"></i>
			                				</button>

			                				<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="signin-remember-2">
												<label class="custom-control-label" for="signin-remember-2">Remember Me</label>
											</div><!-- End .custom-checkbox -->

											<a href="#" class="forgot-link">Forgot Your Password?</a>
							    		</div><!-- End .form-footer -->
							    	</form>
							    	<div class="form-choice">
								    	<p class="text-center">or sign in with</p>
								    	<div class="row">
								    		<div class="col-sm-6">
								    			<a href="#" class="btn btn-login btn-g">
								    				<i class="icon-google"></i>
								    				Login With Google
								    			</a>
								    		</div><!-- End .col-6 -->
								    		<div class="col-sm-6">
								    			<a href="#" class="btn btn-login btn-f">
								    				<i class="icon-facebook-f"></i>
								    				Login With Facebook
								    			</a>
								    		</div><!-- End .col-6 -->
								    	</div><!-- End .row -->
							    	</div><!-- End .form-choice -->
							    </div><!-- .End .tab-pane -->
							    @endif
							    <div class="tab-pane fade {{session()->has('customer') == true ? 'show active' : ''}}" id="register-2" role="tabpanel" aria-labelledby="register-tab-2">
							    	<form action="" id="RegistrationForm">
							    		@csrf
							    		<div class="form-group">
							    			<label for="register-email-2">Your Full Name *</label>
							    			<input type="text" class="form-control" id="name" name="name">
							    		</div><!-- End .form-group -->
							    		<span id="name_error"></span>
							    		<div class="form-group">
							    			<label for="register-email-2">E-mail Address  *</label>
							    			<input type="email" class="form-control" id="email" name="email">
							    		</div>
							    		<span id="email_error"></span>
							    		<div class="form-group">
							    			<label for="register-password-2">Password *</label>
							    			<input type="password" class="form-control" id="password" name="password">
							    		</div>
							    		<span id="password_error"></span>
							    		<div class="form-group">
							    			<label for="register-password-2">Confirm Password *</label>
							    			<input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
							    		</div><!-- End .form-group -->
							    		<span id="password_confirmation_error"></span>
							    		<div class="form-footer">
							    			<button type="submit" class="btn btn-outline-primary-2">
			                					<span>SIGN UP</span>
			            						<i class="icon-long-arrow-right"></i>
			                				</button>

			                				<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="register-policy-2" required>
												<label class="custom-control-label" for="register-policy-2">I agree to the <a href="#">privacy policy</a> *</label>
											</div><!-- End .custom-checkbox -->
							    		</div><!-- End .form-footer -->
							    	</form>

							    	<div class="form-choice">
								    	<p class="text-center">or sign in with</p>
								    	<div class="row">
								    		<div class="col-sm-6">
								    			<a href="#" class="btn btn-login btn-g">
								    				<i class="icon-google"></i>
								    				Login With Google
								    			</a>
								    		</div><!-- End .col-6 -->
								    		<div class="col-sm-6">
								    			<a href="#" class="btn btn-login  btn-f">
								    				<i class="icon-facebook-f"></i>
								    				Login With Facebook
								    			</a>
								    		</div><!-- End .col-6 -->
								    	</div><!-- End .row -->
							    	</div><!-- End .form-choice -->
							    </div><!-- .End .tab-pane -->
							</div><!-- End .tab-content -->
						</div><!-- End .form-tab -->
            		</div><!-- End .form-box -->
            	</div><!-- End .container -->
            </div><!-- End .login-page section-bg -->
        </main><!-- End .main -->

@endsection

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
.bg-image {
	background-color: transparent !important;
}
</style>

@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
$('#RegistrationForm').submit(function(e){
	
	e.preventDefault();
	$.ajax({
		url:'/customer/registration',
		data: $('#RegistrationForm').serialize(),
		type: 'post',
		success:function(result){
			if (result.status == "errors") {
				jQuery.each(result.errors,function(key,val){
					$('#'+key+'_error').html('<div class="alert alert-danger"role="alert"><span>'+val[0]+'</span></div>');
				})
			}
		if (result.status == 'success') {
			$('#success').html("<div class='alert alert-success'>"+result.msg+"<span></div>");
          toastr.success('Registration Success .', 'Please ! Login Now', {timeOut: 3000})
          jQuery('#RegistrationForm')[0].reset();
        }
        if (result.status == 'warning') {
        	$('.warning').html("<div class='alert alert-danger'>"+result.msg+"<span></div>");
        }
		}
	});
});


</script>
@endsection


