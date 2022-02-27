@extends('owner.template')
@section('content')
<div class="container py-4">
	<div class="row">
		<div class="col-md-8 offset-2">
			<h2>Your Profile</h2>

				<form action="{{route('profiles.update',$user->id)}}" method="post" enctype="multipart/form-data" class="jumbotron">
					
					<input type="hidden" name="_method" value="PUT">
					@csrf
          <!-- <div class="form-group">
            <a class="btn btn-danger text-white" id="changePassword">Change Password</a>
          </div> -->
									<div class="form-group">
						<label>Photo</label>
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Old Image</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New Image</a>
    
  </div>
</nav>


<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

  	@if(Auth::user()->address == 'null')

  	<img src="{{asset('template/images/profile.png')}}" width="200" height="200">
  	
  	<input type="hidden" name="oldphoto" value="{{$user->address}}">

  	@else
  	
  	<img src="{{asset($user->address)}}" width="200" height="200">
  	<input type="hidden" name="oldphoto" value="{{$user->address}}">
  	@endif
  	
  	<!-- Old Image File -->
  	
  </div>


  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

  	<!-- New Image File -->
  	<input type="file" name="newphoto" class="form-control">
  </div>
  
</div>
						
	</div>

						
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" value="{{$user->name}}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">
						@if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                <strong>အနည္​းဆံုး စာလံုး​ေရႏွစ္​ဆယ္​​ေလာက္​​ေတာ့႐ွိသင္​​့တယ္​</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{$user->email}}">
						@if ($errors->has('eamil'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$errors}}<strong>
                            </span>
                        @endif
					</div>
					<div class="form-group" style="display: none;">
						<label>Password</label>
						<input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{$user->password}}">
						@if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$errors}}</strong>
                            </span>
                        @endif
					</div>
          <!-- <div class="form-group" id="newPassword" style="display: none;">
            <label>Password</label>
            <input type="password" name="newpassword" class="form-control{{ $errors->has('newpassword') ? ' is-invalid' : '' }}">
            @if ($errors->has('newpassword'))
                            <span class="invalid-feedback" role="alert">
                                <strong>Password is required</strong>
                            </span>
                        @endif
          </div> -->
					<div class="form-group">
						<label>Phone Number</label>
						<input type="number" name="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{$user->phone}}">
						@if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>Phone number is 11</strong>
                            </span>
                        @endif
					</div>
	
	<button type="submit" class="btn btn-success offset-5">Update</button>
				</form>
		</div>
	</div>
</div>
<!-- <script type="text/javascript">
  
    
    $("#changePassword").on('click',function(){
      $("#newPassword").show();
  });

  
</script> -->
@endsection