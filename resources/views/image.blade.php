@extends('template')
@section('content')

<section class="py-5 bg-mylight">
    <div class="container">
      <div class="row">
        <div class="col-md-6" >
            <div class="aa-about-us-left" id="a" align="center">
                <img src="{{asset('frontend/img/p2.jpg')}}"  width="350" alt="image"> 
            </div> 
            <div class="aa-about-us-left" id="aa" align="center">
                <img src="{{asset('frontend/img/p3.jpg')}}"  width="350" alt="image"> 
            </div>
            <div class="aa-about-us-left" id="aaa" align="center">
                <img src="{{asset('frontend/img/p4.jpg')}}"  width="350" alt="image"> 
            </div>
            <br>
            <div class="row col-md-12">
                <div class="col-md-4">
                    <div class="aa-about-us-lef">
                        <img src="{{asset('frontend/img/p2.jpg')}}" id="a1" width="100" alt="image"> 
                    </div> 
                </div>
                <div class="col-md-4">
                    <div class="aa-about-us-left">
                        <img src="{{asset('frontend/img/p3.jpg')}}" id="a2" width="100" alt="image"> 
                    </div> 
                </div>
                <div class="col-md-4">
                    <div class="aa-about-us-left">
                        <img src="{{asset('frontend/img/p4.jpg')}}" id="a3" width="100" alt="image"> 
                    </div> 
                </div>
            </div>             
                                            
        </div>
        <div class="col-md-6" align="center">
            <form>
              <div class="form-group row">
                <label for="floor" class="col-sm-2 col-form-label">Floor</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="floor" placeholder="Choose Floor">
                </div>
              </div>
              <div class="form-group row">
                <label for="type" class="col-sm-2 col-form-label">Type</label>
                <div class="col-sm-10">
                  <select id="type" class="form-control">
                    <option selected>room</option>
                    <option>hall</option>
                  </select>
                </div>
             </div>
            </form>
        </div>
        </div>
     <br>
    <div class="row ">
        <div class="col-md-12">
            <form method="post" action="">                       
                <div class="form-group">
                    <textarea class="form-control" name="comment" rows="5"
                     placeholder="write comment" id="comment"></textarea> 
                </div>                                                                   
            <input type="submit" class="btn btn-success" value="post">
            </form>
        </div>
    </div> 
    <div class="row">
    <div class="card-body">
       
        <div class="media mb-4">
            <img src="{{asset('template/images/business.jpg')}}" width="50">
        </div>
        <div class="media-body">
            <h3> media heading </h>
            <small class="float-right">5 hours ago</small>
            <h5>comment</h5>
        </div>              
    
    </div>
    </div> 
    </div> 
</section>
<script type="text/javascript" src="{{ asset('template/js/jquery.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('#aa').hide();
        $('#aaa').hide();
    $('#a1').click(function(){
           //im=$('#a').val();
           $('#a').show();
           $('#aa').hide();
           $('#aaa').hide();
           //$('#a').show($('#a1').val());
        
        });
    $('#a2').click(function(){
            $('#a').hide();
           $('#aa').show();
           $('#aaa').hide();
            /*$('#a').hide();
            $('#a').show($('#a2').val());
            */
            
        });
    $('#a3').click(function(){
            $('#a').hide();
           $('#aa').hide();
           $('#aaa').show();
            /*$('#a').hide();
            $('#a').show($('#a3').val());*/
            
        });
            
    });
</script>
@endsection