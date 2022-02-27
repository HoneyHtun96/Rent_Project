@extends('admin.template')
@section('content')

<div class="container py-5">
 
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6 jumbotron">
		<form action="{{route('town.store')}}" method="post" enctype="multipart/form-data">
			<legend style="text-align: center;">Township Form</legend>
			    @csrf
				<div class="form-group">
					<label>Township Name</label>

					<input type="text" name="township" class="form-control {{ $errors->has('township') ? ' is-invalid' : '' }}"  placeholder="Township.....">
					@if ($errors->has('township'))
					<span class="invalid-feedback" role="alert">
						<strong>{{$errors->first('township')}}</strong>
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