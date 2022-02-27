        <!-- Advance Search -->
        <section id="aa-advance-search">
          <div class="container">
            <div class="aa-advance-search-area">

              <form action="{{route('search.store')}}" method="POST" role="search">
                @csrf
               <div class="aa-advance-search-top">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="aa-single-advance-search">
                        <select  name="township">
                          <option value="" selected>Choose Township</option>
                          @foreach($townships as $township)
                         <option value="{{$township->id}}">{{ $township->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="aa-single-advance-search">
                        <select  name="floor">
                          <option value="" selected>Choose Floor</option>
                          @foreach($floors as $floor)
                         <option value="{{$floor->id}}">
                          {{ $floor->name }}
                         </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="aa-single-advance-search">
                            <select  name="price1">
                               <option value="" selected>From</option>
                              @foreach($prices as $p)
                             <option value="{{$p->price}}">
                              {{ $p->price }}
                             </option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="aa-single-advance-search">
                            <select  name="price2">
                               <option value="" selected>To (Price)</option>
                             @foreach($prices as $p)
                             <option value="{{$p->price}}">
                              {{ $p->price }}
                             </option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="col-md-3">

                      <div class="aa-single-advance-search">
                        <input class="aa-search-btn" type="submit" value="Search">
                      </div>
                    </div>
                  </div>
                </div>
                </form>
              </div>
            </div>
          </div>
        </section>
        <!-- / Advance Search -->