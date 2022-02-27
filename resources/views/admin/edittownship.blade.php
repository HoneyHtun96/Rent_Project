@extends('admin.template')
@section('content')

<div class="container py-5">
 
<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6 jumbotron">
    <form action="{{route('town.update',$township->id)}}" method="post" enctype ="multipart/form-data">
      <input type="hidden" name="_method" value="PUT">
      @csrf
      <legend style="text-align: center;">Township Form</legend>
          
        <div class="form-group">
          <label>Township Name</label>

          <input type="text" name="township" class="form-control {{ $errors->has('township') ? ' is-invalid' : '' }}"  placeholder="Township..." value="{{$township->name}}">
          @if ($errors->has('township'))
          <span class="invalid-feedback" role="alert">
            <strong>{{$errors->first('township')}}</strong>
          </span>
          @endif

        </div>
      <div class="form-group">
        <input type="submit" class="btn btn-success" value="Update">
      </div>
      
    </form>
  </div>
  <div class="col-md-3"></div>
</div>
</div>



@endsection