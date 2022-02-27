@extends('owner.template')
@section('content')
<div class="container py-5">
	<div class="row">
		<div class="col-md-12 jumbotron">
			<center><h2 class="py-3">Post Form</h2></center>
			<div class="row">
				<div class="col-md-6">
					<form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
						@csrf
						
						<div class="form-group">
							<label>ၿမိဳ႕နယ္​</label>
							<select class="form-control" name="township">
								@foreach($townships as $town)
								<option value="{{$town->id}}">{{$town->name}}</option>
								@endforeach
								
							</select>
						</div>
						<div class="form-group">
							<label>အမ်ိဳးအစား</label>
							<select class="form-control" name="type">
								@foreach($types as $t)
								<option value="{{$t->id}}">{{$t->name}}</option>
								@endforeach
								
							</select>
							
						</div>
						<div class="form-group">
							<label>အလႊာ</label>
							<select class="form-control" name="floor">
								@foreach($floors as $f)
								<option value="{{$f->id}}">{{$f->name}}</option>
								@endforeach
								
							</select>
							
						</div>
						<div class="form-group">
							<label>ေစ်းႏွဳန္း</label>
							<input type="number" name="price" placeholder="တစ္လစာ ေစ်းႏွဳန္း">
							
						</div>
						<div class="form-group">
								<label>ဓာတ္ပုံ</label>

							<input type="file" name="photo[]" class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" multiple="">

	   						@if ($errors->has('photo'))
	                            <span class="invalid-feedback" role="alert">
	                                <strong>အနည္​းဆံုး ဓာတ္​ပံုသံုးပံုျဖစ္​သင္​့သည္​</strong>
	                            </span>
	                        @endif


						</div>
						<div class="form-group">
							<label>ေဖာ္​ျပခ်က္</label>
							<textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" placeholder="ကိုယ္​့တိုက္​ခန္​းရဲ႕အ​ေသးစိပ္​ကို​ေဖာ္​ျပပါရန္​..."></textarea>
							@if ($errors->has('description'))
	                            <span class="invalid-feedback" role="alert">
	                                <strong>အနည္​းဆံုး စာလံုး​ေရႏွစ္​ဆယ္​​ေလာက္​​ေတာ့႐ွိသင္​​့တယ္​</strong>
	                            </span>
	                        @endif

						</div>
						<div class="form-row my-3" style="display: none;">
							<div class="col-md-6">
								<label>Latitude</label>
								<input type="text" id="lat" name="lat" placeholder="Yor Latitude...." class="form-control" >
							</div>
							<div class="col-md-6">
								<label>Longitude</label>
								<input type="text" id="lng" name="lng" placeholder="Yor Longitude...." class="form-control" >
							</div>
						</div>

						<button type="submit" class="btn btn-lg btn-success offset-10" style="margin-top: 30px;">Post</button>
					</form>
				</div>
				<div class="col-md-6">
					<div class="geocoder float-right py-3">
						<div id="geocoder"></div>
					</div>
					<div id="map" class="py-5"></div>
				</div>	
			</div>
			
		</div>
	</div>
</div>
@endsection