@extends('admin.template')
@section('content')

<div class="container py-5">
 
<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6 jumbotron">
    <form action="{{route('type.update',$type->id)}}" method="post" enctype ="multipart/form-data">
      <input type="hidden" name="_method" value="PUT">
      @csrf
      <legend style="text-align: center;">Type Form</legend>
          
        <div class="form-group">
          <label>Type Name</label>

          <input type="text" name="type" class="form-control {{ $errors->has('type') ? ' is-invalid' : '' }}"  placeholder="Type..." value="{{$type->name}}">
          @if ($errors->has('type'))
          <span class="invalid-feedback" role="alert">
            <strong>{{$errors->first('type')}}</strong>
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