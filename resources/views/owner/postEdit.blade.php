@extends('owner.template')
@section('content')
<div class="container py-5">
	<div class="row">
		<div class="col-md-8 offset-2">
			<h2>Post Form</h2>
				<form action="{{route('posts.update',$apartment->id)}}" method="post" enctype="multipart/form-data" class="jumbotron">
					<input type="hidden" name="_method" value="PUT">
					@csrf
					
					<div class="form-group">
						<label>ၿမိဳ႕နယ္​</label>
						<select class="form-control" name="township">
							@foreach($townships as $town)
							<option value="{{$town->id}}" @if($town->id == $apartment->township_id)
								{{'selected'}}
								@endif>{{$town->name}}</option>
							@endforeach
							
						</select>
					</div>
					<div class="form-group">
						<label>အမ်ိဳးအစား</label>
						<select class="form-control" name="type">
							@foreach($types as $t)
							<option value="{{$t->id}}" @if($t->id == $apartment->type_id)
								{{'selected'}}
								@endif>{{$t->name}}</option>
							@endforeach
						</select>
						
					</div>
					<div class="form-group">
						<label>အလႊာ</label>
						<select class="form-control" name="floor">
							@foreach($floors as $f)
							<option value="{{$f->id}}">{{$f->name}}</option>
							@endforeach

							@foreach($floors as $f)
							<option value="{{$f->id}}" @if($f->id == $apartment->floor_id)
								{{'selected'}}
								@endif>{{$f->name}}</option>
							@endforeach
							
						</select>
						
					</div>
					<div class="form-group">
						<label>ေစ်းႏွဳန္း</label>
						<input type="number" name="price" value="{{$apartment->price}}">
						
					</div>
					<div class="form-group">
							<label>ဓာတ္ပုံ</label>


<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Old Image</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New Image</a>
    
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
  	@php $images = json_decode($apartment->image);
  	@endphp
	    <div class="row">
	    	@foreach ($images as $key => $image)
	      <img src="{{asset($image)}}" id="a1" width="100" alt="image" height="100" class="col-md-4">
	      @endforeach 
	    </div>
  	<!-- Old Image File -->
  	<input type="hidden" name="oldimage[]" value="{{$apartment->image}}">
  </div>


  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

  	<!-- New Image File -->
  	<input type="file" name="photo[]" class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" multiple="">

	@if ($errors->has('photo'))
	    <span class="invalid-feedback" role="alert">
	        <strong>အနည္​းဆံုး ဓာတ္​ပံုသံုးပံုျဖစ္​သင္​့သည္​</strong>
	    </span>
	@endif
  </div>
  
</div>

					</div>
					<div class="form-group">
						<label>ေဖာ္​ျပခ်က္</label>
						<textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" placeholder="ကိုယ္​့တိုက္​ခန္​းရဲ႕အ​ေသးစိပ္​ကို​ေဖာ္​ျပပါရန္​...">
							{{$apartment->description}}
						</textarea>
						@if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                <strong>အနည္​းဆံုး စာလံုး​ေရႏွစ္​ဆယ္​​ေလာက္​​ေတာ့႐ွိသင္​​့တယ္​</strong>
                            </span>
                        @endif

					</div>
					<input type="hidden" name="lat" value="{{$apartment->lat}}">
					<input type="hidden" name="longitude" value="{{$apartment->lng}}">
					<button type="submit" class="btn btn-success offset-5">Update</button>
				</form>
		</div>
	</div>
</div>
@endsection