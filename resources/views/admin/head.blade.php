<nav class="navbar navbar-expand-lg navbar-light bg-mylight sticky-top">
		<div class="container">
			<a class="navbar-brand" href="#">
			    <img src="{{asset('template/images/homeIcon.png')}}" width="30" height="30" class="d-inline-block align-top" style="border-radius: 2rem;" alt="">
			    <i class="text-white">Rental Apartment</i>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav ml-auto">
				    
				    @if(Auth::check() && Auth::user()->role=='admin')
				    <li class="nav-item dropdown mx-2">
				    	
				    </li>
				    @endif
				    <li class="nav-item dropdown mx-2">
				    	<a href="{{route('owner.index')}}" class="nav-link mx-2 active text-white">Home</a>
				    </li>
				   
				  	<li class="nav-item active">
				        <a class="nav-link mx-2 text-white" href="#">About</a>
				    </li>
				 
				   	@guest
				    <li class="nav-item">
				       	<a class="nav-link mx-2 text-white" href="{{route('login')}}" tabindex="-1" aria-disabled="true" id="login">Login</a>
				    </li>
				    <li class="nav-item">
				        <a class="btn btn-outline-light btn-sm my-2 ml-2" href="{{route('register')}}" tabindex="-1" aria-disabled="true">Register</a>
				    </li>
				      @else

			      			<a href="{{route('posts.create')}}" class="nav-link mx-2 text-white" tabindex="-1" aria-disabled="true">Post</a>
			      			<a href="{{route('owner.index')}}" class="nav-link mx-2 text-white" tabindex="-1" aria-disabled="true">Apartment</a>
			      			
			      			<a class="nav-link mx-2" tabindex="-1" aria-disabled="true" href="{{route('logout')}}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;" class="text-white">
                                @csrf
                            </form>

			      		
			      </li>
			      @endguest
				    
				  
				   
				    
			    </ul>
			</div>
		</div>
	</nav>