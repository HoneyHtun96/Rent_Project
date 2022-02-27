
              <div class="aa-latest-properties-content">
                <div class="row">
                  @foreach($apartments as $apartment)

                  @php $images = json_decode($apartment->image); 
                  @endphp

                  <div class="col-md-4">
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
           