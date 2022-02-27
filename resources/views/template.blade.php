<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">    
      <title>Home Property | Home</title>
      
      <!-- Favicon -->
      <link rel="icon" href="{{asset('img/icon.png')}}">

      <!-- Font awesome -->
      <link href="{{asset('frontend/css/font-awesome.css')}}" rel="stylesheet">
      <!-- Bootstrap -->
      <link href="{{asset('frontend/css/bootstrap.css')}}" rel="stylesheet">   

      


      <!-- slick slider -->
      <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/slick.css')}}">
      <!-- price picker slider -->
      <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/nouislider.css')}}">
      <!-- Fancybox slider -->
      <link rel="stylesheet" href="{{asset('frontend/css/jquery.fancybox.css')}}" type="text/css" media="screen" /> 
      <!-- Theme color -->
      <link id="switcher" href="{{asset('frontend/css/theme-color/default-theme.css')}}" rel="stylesheet">     

      <!-- Main style sheet -->
      <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">    

     
      <!-- Google Font -->
      <link href='https://fonts.googleapis.com/css?family=Vollkorn' rel='stylesheet' type='text/css'>    
      <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

      <!-- Summer Notes -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
    <style type="text/css">
      #map{position: relative;height: 350px;width: 100%;}
    </style>

    </head>
    
    <body class="aa-price-range">  
        <!-- Pre Loader -->
        <div id="aa-preloader-area">
          <div class="pulse"></div>
        </div>
        <!-- SCROLL TOP BUTTON -->
          <a class="scrollToTop" href="#"><i class="fa fa-angle-double-up"></i></a>
        <!-- END SCROLL TOP BUTTON -->
   
        <!-- Start header section -->
        @include('header')
        <!-- End menu section -->

          @yield('content')

        <!-- Footer -->
       @include('footer')
        <!-- / Footer -->

 
  
  <!-- jQuery library -->
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
  <!-- Bootstrap JS -->


  <script src="{{asset('frontend/js/jquery.min.js')}}"></script>   
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="{{asset('frontend/js/bootstrap.js')}}"></script>   
  <!-- slick slider -->
  <script type="text/javascript" src="{{asset('frontend/js/slick.js')}}"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="{{asset('frontend/js/nouislider.js')}}"></script>
   <!-- mixit slider -->
  <script type="text/javascript" src="{{asset('frontend/js/jquery.mixitup.js')}}"></script>
  <!-- Add fancyBox -->        
  <script type="text/javascript" src="{{asset('frontend/js/jquery.fancybox.pack.js')}}"></script>
  <!-- Custom js -->
  <script src="{{asset('frontend/js/custom.js')}}"></script> 

  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>

      <script type="text/javascript">
        $('#summernote').summernote({
            placeholder: 'Blog Post....',
            tabsize: 2,
            height: 100
        });
    </script>
    <!-- For Map -->
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.css' rel='stylesheet' />
    <style>
    </style>

    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css' type='text/css' />

    <script>
      var lat = document.getElementById('lat').value;
      var lng = document.getElementById('lng').value;
      var user_location = [lng,lat];
     
      

        mapboxgl.accessToken = 'pk.eyJ1IjoiZmFraHJhd3kiLCJhIjoiY2pscWs4OTNrMmd5ZTNra21iZmRvdTFkOCJ9.15TZ2NtGk_AtUvLd27-8xA';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v9',
            center: user_location,
            zoom: 18
        });
        //  geocoder here
        var geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            // limit results to Australia
            //country: 'IN',
        });

        var marker ;

        // After the map style has loaded on the page, add a source layer and default
        // styling for a single point.
        map.on('load', function() {
            addMarker(user_location,'load');
            // add_markers(saved_markers);

            // Listen for the `result` event from the MapboxGeocoder that is triggered when a user
            // makes a selection and add a symbol that matches the result.
            geocoder.on('result', function(ev) {
                // alert("aaaaa");
                // console.log(ev.result.center);

            });
        });
        
        function addMarker(ltlng,event) {

            if(event === 'click'){
                user_location = ltlng;
            }
            marker = new mapboxgl.Marker({draggable: true,color:"#d02922"})
                .setLngLat(user_location)
                .addTo(map)
                .on('dragend', onDragEnd);
        }
  
        document.getElementById('geocoder').appendChild(geocoder.onAdd(map));

    </script>

    <!-- End For Map -->

  </body>
</html>