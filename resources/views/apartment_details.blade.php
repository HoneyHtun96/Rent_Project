@extends('template')
@section('content')


  <!-- Start Proerty header  -->
  <section id="aa-property-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-property-header-inner">
            <h2>Apartment Details Page</h2>
            <ol class="breadcrumb">
            <li><a href="#">Home</a></li>            
            <li class="active">Apartment Deatils</li>
          </ol>
          </div>
        </div>
      </div>
    </div>
  </section> 
  <!-- End Proerty header  -->

  <section id="aa-contact">
   <div class="container">
     <div class="row">


          
          @php $images = json_decode($apartment->image); 
          @endphp
      
          <div class="aa-contact-area">
            <div class="aa-contact-top">
              <div class="row jumbotron">
                <div class="aa-contact-top-left col-md-6">
                  @foreach ($images as $key => $image)
                  <div class="row">
                     @if($key == 0)
                      <div class="aa-about-us-left" id="a" align="center">
                          <img src="{{asset($image)}}"  width="450" alt="image" height="370"> 
                      </div> 
                      @elseif($key == 1)
                      <div class="aa-about-us-left" id="aa" align="center">
                          <img src="{{asset($image)}}"  width="450" alt="image" height="370"> 
                      </div>
                      @else
                      <div class="aa-about-us-left" id="aaa" align="center">
                          <img src="{{asset($image)}}"  width="450" alt="image" height="370"> 
                      </div>
                      @endif
                  </div>
                   @endforeach
                 <br>
                   
                    <div class="row">
                      <div class="col-md-3"></div>
                      @foreach ($images as $key => $image) 
                       @if($key == 0)
                      <div class="col-md-2">
                        <img src="{{asset($image)}}" id="a1" width="100" alt="image" height="65"> 
                      </div>
                      @endif
                      @endforeach

                      @foreach ($images as $key => $image)
                      @if($key == 1)
                      <div class="col-md-2">
                        <img src="{{asset($image)}}" id="a2" width="100" alt="image" height="65"> 
                      </div>
                      @endif
                      @endforeach
                     
                      @foreach ($images as $key => $image)
                      @if($key == 2)
                      <div class="col-md-2">
                        <img src="{{asset($image)}}" id="a3" width="100" alt="image" height="65"> 
                      </div>
                      @endif
                      @endforeach
                      <div class="col-md-3"></div> 
                      
                    </div> 
                   
                    <br>              
                </div>
                <div class="aa-contact-top-right col-md-6">
                  <h2>အ ေသးစိတ္ အခ်က္အလက္မ်ား</h2>
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
                  <p> {{ $apartment->description }}</p>
                </div>
              </div>

               <div class="row jumbotron" >
                <div class="col-md-4" style="margin-top: 30px;">
                  <div class="aa-title">
                  <h2 style="color: #294050">Contact Me!</h2>
                  <span></span>
                  <div>
                  @foreach ($user as $u)

        @if($u->address == 'null')
            
              <img src="{{asset('template/images/profile.png')}}" width="120" height="120" style="border-radius: 7rem;">
              
            
          @else
            
              <img src="{{asset($u->address)}}" width="120" height="120" style="border-radius: 7rem;">
              
          
        @endif
                  
                  <h4 style="line-height: 3rem;">{{$u->name}}</h4>
                  <h4 style="line-height: 3rem;">{{$u->email}}</h4>
                  <h4 style="line-height: 3rem;">{{$u->phone}}</h4>
                  @endforeach

                  </div>
                </div>
                </div>
                <div class="col-md-8">
                  <div class="row" style="margin-top: 30px;">
                   <div class="col-md-3"></div>
                    <div class="col-md-8
                    ">
                      <h2 id="alert" style="color: #294050">Map For Apartment</h2>
                    </div>
                    <div class="col-md-1"></div>
                    
                  </div>
                  <span></span>
                  <div>
                  <input type="hidden" name="lat" id="lat" value="{{$apartment->lat}}">
                  <input type="hidden" name="lng" id="lng" value="{{$apartment->lng}}">
                  <div id="map"></div>
                </div>
                </div> 
              </div>
              <div class="aa-contact-bottom">
                
              @include('comment')
        
              </div>
            </div>
          </div>
       </div>
     </div>
   </div>
 </section>


  <!-- related search apartment -->
    <section id="aa-latest-property">
      <div class="container jumbotron">
        <div class="aa-latest-property-area">
          <div class="aa-title">
            <h2>Related Apartments</h2>
            <span></span>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit ea nobis quae vero voluptatibus.</p>         
          </div>

            <div class="aa-latest-properties-content">
                <div class="row">
                  @foreach($related_data as $apartment)

                  @php $images = json_decode($apartment->image); 
                  @endphp

                  <div class="col-md-4">
                    <article class="aa-properties-item">
                      <p class="text-danger">{{$apartment->created_at}}</p>
                      <a href="#" class="aa-properties-item-img">
                        @foreach ($images as $key => $image)
                         

                        @if($key==0)
                         
                        <img src="{{asset($image)}}" alt="img" width="276" height="183">
                        @endif
                        @endforeach


                      </a>
                      <div class="aa-properties-item-content">
                        <div class="aa-properties-about">
                          <p>
                            {{$apartment->description}}
                          </p>                      
                        </div>
                        <div class="aa-properties-detial">
                          <span class="aa-price">
                            {{$apartment->price}}
                            <!-- {{$apartment->id}} -->
                          </span>
                          <a href="{{route('apartmentdetail.show',$apartment->id)}}" class="aa-secondary-btn">View Details</a>
                        </div>
                      </div>
                    </article>
                  </div>  
                  @endforeach
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