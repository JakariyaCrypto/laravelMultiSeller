@extends('backend/admin/layouts/master')

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
				<div class="card-header bg-info">
					<h4>Mail with Attach File</h4>
				</div>
				<div class="card-body">
					<form action="{{route('send.mail')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label >file name</label>
							<input type="email" name="title" class="form-control" required="">
						</div>
						<div class="form-group">
							<label >Attach file(jpg,png,jpeg,pdf)</label>
							<input type="file" name="file" class="form-control">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-outline-success rounded">Upload</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
