@extends('template')
@section('content')
	
  <section id="aa-property-header">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-12">
	          <div class="aa-property-header-inner">
	            <h2>Gallery</h2>
	            <ol class="breadcrumb">
	            <li><a href="#">HOME</a></li>            
	            <li class="active">Gallery</li>
	          </ol>
	          </div>
	        </div>
	      </div>
	    </div>
    </section> 
  <!-- End Proerty header  -->

  <section id="aa-gallery">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-gallery-area">
            <div class="aa-title">
              <h2>Gallery View</h2>
              <span></span>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi commodi eum dolorem aut eos, debitis quaerat reiciendis, officiis consectetur ducimus atque suscipit ab at tempora!</p>
            </div>
            <!-- Start gallery -->
            <div class="aa-gallery-content">
              <div class="aa-gallery-top">
                <!-- Start gallery menu -->
                <ul>
                  @foreach($township as $ts)

                  <li data-filter="{{$ts->id}}" class="filter">{{ $ts->name }}</li>

                  @endforeach
                </ul>
              </div>

              <!-- Start gallery image -->
              <div id="mixit-container" class="aa-gallery-body">
                <!-- start single gallery image -->
                <div class="aa-single-gallery mix apartment">                  
                  <div class="aa-single-gallery-item">
                    <div class="aa-single-gallery-img">
                      <a href="#"><img src="{{asset('frontend/img/p3.jpg')}}" alt="img"></a>
                    </div>
                    <div class="aa-single-gallery-info">
                      <a class="fancybox" data-fancybox-group="gallery" href="img/gallery/big/1.jpg"><span class="fa fa-eye">
                      <a class="aa-link" href="#"><span class="fa fa-link"></span></a>
                    </div>                  
                  </div>
                </div>
        
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection