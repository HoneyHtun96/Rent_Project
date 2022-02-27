
	@extends('owner.template')
	@section('content')

	<nav class="navbar navbar-expand navbar-light bg-white">
		<div class="container">
			<a class="navbar-brand mx-3" href="#"><small>All Posts</small></a>

			@if(Auth::check())
			 	@if(Auth::user()->address == 'null')
		  			<a href="{{route('profiles.create')}}" class="nav-link mx-2" tabindex="-1" aria-disabled="true">
		  				<img src="{{asset('template/images/profile.png')}}" width="50" height="50" style="border-radius: 2rem;">
		  				
		  			</a>
	  			@else
	  				<a href="{{route('profiles.create')}}" class="nav-link mx-2" tabindex="-1" aria-disabled="true">
		  				<img src="{{asset(Auth::user()->address)}}" width="50" height="50" style="border-radius: 2rem;">
		  				
		  			</a>
	  			@endif
  			@endif
		</div>
	</nav>

	<section class="py-5 bgcolor">   
		<div class="container">
		    <div class="row">
		    	@foreach($apartments as $apartment)
		    	
    	
		    	@php $images = json_decode($apartment->image); 
		    	@endphp
				 			 
		    	<div class="col-md-4 py-3">
					<div class="card" style="border-radius: 1rem;">
						<p class="text-danger">{{$apartment->created_at->diffForHumans()}}</p>
						@foreach ($images as $key => $image)
							@if($key == 0)
						<img class="card-img-top" src="{{asset($image)}}" width="200" height="200" />
						@endif
						@endforeach
				        <div class="card-body">

						  	<p class="text-dark">
						  	  {{$apartment->price}} Kyats
						  	</p>
						  	@if(Auth::user()->role == 'owner')

						    	<center><a href="{{route('posts.show',$apartment->id)}}" class="btn btn-info">Post Detail</a></center>
						    @elseif(Auth::user()->role == 'admin')
						    <div class="row">
						    	<div class="col-md-6">
						    		<form method="post" action="{{route('post.destroy',$apartment->id)}}">
									@csrf
										<input type="hidden" name="_method" value="DELETE">

										<input type="submit" value="Delete" class="btn btn-danger">
									</form>
						    	</div>
						    	<div class="col-md-6">
						    		<center><a href="{{route('posts.show',$apartment->id)}}" class="btn btn-info"> Detail</a></center>
						    	</div>
						    	
							</div>
						    @endif
						</div>

					</div>
			    </div>

					@endforeach	
					
		    </div>
		</div>   
	</section>

	

	@endsection