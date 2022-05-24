@extends('backend/admin/layouts/master')
@section('title','Verify')
@section('content')


        
<div class="mail-form mt-3">
	@if(session()->has('message'))
		<div class="alert alert-success">
			<span>{{session()->get('message')}}</span>
		</div>
		@endif
	<div class="row">

		<div class="col-sm-6 offset-sm-3" >
			<div class="card rounded">
				<div class="card-header bg-primary">
					<h4>Verification With Mobile</h4>
				</div>
				<div class="card-body">
					<form action="{{route('store')}}" method="post">
						@csrf
						<div class="form-group">
							<label>Enter Mobile</label>
							<input type="number" name="number" class="form-control">
						</div>
						<div class="form-group">
							<button class="btn btn-warning rounded" type="submit">Verify</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection