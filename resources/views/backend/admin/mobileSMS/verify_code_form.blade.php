@extends('backend/admin/layouts/master')
@section('title','Verify')
@section('content')


<div class="mail-form mt-3">
	@if(session()->has('message'))
		<div class="alert alert-warning">
			<span>{{session()->get('message')}}</span>
		</div>
		@endif
	<div class="row">

		<div class="col-sm-6 offset-sm-3" >
			<div class="card rounded">
				<div class="card-header bg-primary">
					<h4>Verify with 6 digits</h4>
				</div>
				<div class="card-body">
					<form action="{{route('verify')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label>Enter Code</label>
							<input type="number" name="code" class="form-control" placeholder="258945">
						</div>
						<div class="form-group">
							<button class="btn btn-warning rounded" type="submit">Conform</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection