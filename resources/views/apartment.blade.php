@extends('template')
@section('content')

  <!-- Start Proerty header  -->
  <section id="aa-property-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-property-header-inner">
            <h2>Apartment Page</h2>
            <ol class="breadcrumb">
            <li><a href="#">Home</a></li>            
            <li class="active">Apartment</li>
          </ol>
          </div>
        </div>
      </div>
    </div>
  </section> 
  <!-- End Proerty header  -->

  <!-- Start Properties  -->
  <section id="aa-properties">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="aa-properties-content">
            <div class="aa-properties-content-body">
              <ul class="aa-properties-nav">
                @foreach($apartments as $apartment)

                  @php $images = json_decode($apartment->image); 
                  @endphp
                <li>
                  <article class="aa-properties-item">
                    <p class="text-danger">{{$apartment->created_at->diffForHumans()}}</p>
                      <a href="#" class="aa-properties-item-img">
                        @foreach ($images as $key => $image)
                        @if($key==0)
              
                        <img src="{{asset($image)}}" alt="img" width="276" height="183">
                        
                        @endif
                        @endforeach
                      </a>
                      <div class="aa-properties-item-content">
                        <div class="aa-properties-about">
                          <p>{{$apartment->description}}</p>                      
                        </div>
                        <div class="aa-properties-detial">
                          <span class="aa-price">
                            {{$apartment->price}}
                          </span>
                          <a href="{{route('apartmentdetail.show',$apartment->id)}}" class="aa-secondary-btn">View Details</a>
                        </div>
                      </div>
                    </article>
                </li>
                @endforeach
              </ul>
            </div>
            <!-- Start Pagination -->
            {{ $pagination->links() }}
            
          </div>
        </div>
       
          <!-- Search sidebar -->
        <div class="col-md-4">
          <div class="row ">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <table class="table">
                <thead>
                <th class="text-center">
                  Search By Townships
                </th>
                </thead>
                <tbody>
                <tr>
                  <td>
                    <a href="" class="form-control text-center">All</a>
                  </td>
                </tr>
                   @foreach($townships as $ts)
                  <tr>
                  <td>
                        <a value="{{$ts->id}}" class="text-center btn btn-success btn-sm form-control" href="{{route('apartment.show',$ts->id)}}">
                         {{ $ts->name }} 
                        </a>
                  </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          <div class="col-md-3"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Properties  -->

@endsection