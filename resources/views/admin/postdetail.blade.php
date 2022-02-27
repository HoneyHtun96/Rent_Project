@extends('admin.template');
@section('content')
<div class="container py-5">

	<div class="row jumbotron">

		@php $images = json_decode($apartment->image); 
			
	  	@endphp
		
		<div class="col-md-6">
			<div class="carousel slide" data-ride="carousel" id="mycaroursel">
								<div class="carousel-inner">
									@foreach($images as $key => $image)
										@php $class = ($key == 0) ? 'active': '';
										@endphp
									<div class="carousel-item {{$class}}">
										<img class="card-img-top" src="{{asset($image)}}" alt="" width="300" height="350">
									</div>
									@endforeach	
								</div>
								<div>
									<a href="#mycaroursel" class="carousel-control-prev" data-slide="prev">
										<span class="carousel-control-prev-icon">
											
										</span>
									</a>
									<a href="#mycaroursel" class="carousel-control-next" data-slide="next">
										<span class="carousel-control-next-icon">

											
										</span>
									</a>
								</div>		           
	        </div>
		</div>
		<div class="col-md-6">
			<h3 style="margin-bottom: 25px; margin-left: 30px;">Detail Information</h3>
			<ul class="contact-info-list">
				<table class="table" cellpadding="8">
                      <tbody>
                        <tr>
                          <td>Price</td>
                          <td>{{$apartment->price}}</td>
                        </tr>
                        <tr>
                          <td>Type</td>
                          <td>{{$apartment->type->name}}</td>
                        </tr>
                        <tr>
                          <td>Township</td>
                          <td>{{$apartment->township->name}}</td>
                        </tr>
                        <tr>
                          <td>Floor</td>
                          <td>{{$apartment->floor->name}}</td>
                        </tr>
                      </tbody>
                </table>
	        </ul>
	    	<p style="margin-left: 30px;"> {{ $apartment->description }}</p>
		</div>		
	</div>
	@if(Auth::check() && ($apartment->user_id == Auth::user()->id))
		<div class="row">
			<div class="offset-5">
				<a href="{{route('posts.edit',$apartment->id)}}" class="btn btn-outline-info">Edit</a> 
			</div>
			<div class="col-md-6">
				<form method="post" action="{{route('posts.destroy',$apartment->id)}}">
					@csrf
					<input type="hidden" name="_method" value="DELETE">

					<input type="submit" value="Delete" class="btn btn-outline-danger">
				</form>
			</div>
		</div>
	@endif

</div>
@endsection


