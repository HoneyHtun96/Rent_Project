@extends('template')
@section('content')

	@include('slidebar')
    @include('search')
    <!--................ search Result.............. -->

    <!-- ..........Show Apartment............. -->
    <section id="aa-latest-property">
      <div class="container">
        <div class="aa-latest-property-area">
          <div class="aa-title">
            <h2>Search Apartments</h2>
            <span></span>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit ea nobis quae vero voluptatibus.</p>         
          </div>


              <div class="aa-latest-properties-content">
                <div class="row">
                  @foreach($item as $i)
                  <div class="col-md-4">
                    <article class="aa-properties-item">
                      
                      <a href="#" class="aa-properties-item-img">
                        <img src="{{asset('frontend/img/images.jpg')}}" alt="img">
                      </a>
                      <div class="aa-properties-item-content">
                        <div class="aa-properties-about">
                          <p>
                            {{ $i->description }}
                          </p>                      
                        </div>
                        <div class="aa-properties-detial">
                          <span class="aa-price">
                            {{ $i->price }}
                          </span>
                          <a href="{{route('apartmentdetail.show',$i->id)}}" class="aa-secondary-btn">View Details</a>
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
    <!-- ..........end Apartment.............. -->

    

@endsection