@extends('admin.template')
@section('content')
<div class="container jumbotron" style="margin-top: 50px;" >  
	<a href="{{route('floor.create')}}" class="btn btn-info" style="margin-bottom: 20px;">
	Add
	</a> 

	<table class="table">
		<thead>
			<tr>
				<th>No.</th>
				<th>Name</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($floor as $floors)
			<tr>
				<td>{{$floors->id}}</td>
				<td>{{$floors->name}}</td>
				<td>
					<div class="row">
						
	                    <a href="{{route('floor.edit',$floors->id)}}" class="btn btn-warning mr-3">
	                    Edit
	                    </a>
	                    <form method="post" action="{{route('floor.destroy',$floors->id)}}" class="d-inline-blocked">
							@csrf
							<input type="hidden" name="_method" value="DELETE">
							<button type="submit" class="btn btn-danger">DELETE</button>
						</form>
					</div>     
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection