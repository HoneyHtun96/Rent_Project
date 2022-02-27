@extends('admin.template')
@section('content')

<div class="container py-5">
 
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6 jumbotron">
		<form action="{{route('floor.store')}}" method="post" enctype="multipart/form-data">
			<legend style="text-align: center;">Floor Form</legend>
			    @csrf
				<div class="form-group">
					<label>Floor Name</label>

					<input type="text" name="floor" class="form-control {{ $errors->has('floor') ? ' is-invalid' : '' }}"  placeholder="floor...">
					@if ($errors->has('floor'))
					<span class="invalid-feedback" role="alert">
						<strong>{{$errors->first('floor')}}</strong>
					</span>
					@endif

				</div>
			<div class="form-group">
				<input type="submit" class="btn btn-success" value="Add">
			</div>
			
		</form>
	</div>
	<div class="col-md-3"></div>
</div>
</div>



@endsection