@extends('admin.template')
@section('content')
<div class="container jumbotron" style="margin-top: 50px;" > 
	<a href="{{route('type.create')}}" class="btn btn-info" style="margin-bottom: 20px;">
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
			@foreach($types as $type)
			<tr>
				<td>{{$type->id}}</td>
				<td>{{$type->name}}</td>
				<td>
					<div class="row">
						
	                    <a href="{{route('type.edit',$type->id)}}" class="btn btn-warning mr-3">
	                    Edit
	                    </a>
	                    <form method="post" action="{{route('type.destroy',$type->id)}}" class="d-inline-blocked">
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