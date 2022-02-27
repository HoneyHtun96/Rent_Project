<!DOCTYPE html>
<html>
<head>
    <title>Rental Apartment</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="{{asset('template/images/homeIcon.png')}}" type="template/image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('template/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS link -->
    <link rel="stylesheet" type="text/css" href="{{asset('fontawesome/css/all.min.css')}}">

    <!-- Summernote CDN CSS -->
     <link href="{{asset('dist/summernote-bs4.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('template/css/custom.css') }}">

    <!-- Jquery -->
    <script type="text/javascript" src="{{ asset('template/js/jquery.min.js') }}"></script>
    
    <!-- Bootstrap JS -->
    <script type="text/javascript" src="{{ asset('template/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Summernote CDN JS -->
   
    <script src="{{asset('dist/summernote-bs4.min.js')}}"></script>
    <!-- Fontawesome JS -->
    <script src="{{asset('fontawesome/js/all.min.js')}}"></script>

    <!-- For Map -->
    <style type="text/css">
        #map { position:absolute;height:430px ;width:400px; }
        
    </style>
</head>
<body>
    
    <!-- Header -->
    @include('owner.head')


    @yield('content')

    <?php 
    function get_saved_locations()
    {
        $locationArr = array();
        echo json_encode($locationArr);
    }
    ?>
    <!-- Footer -->
    @include('owner.footer')
    <script type="text/javascript">
        $("#summernote").summernote({
            placehoder:'Blog Post......',
            tabsize:2,
            height:100
        })
    </script>

    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.css' rel='stylesheet' />
    <style>
    </style>

    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css' type='text/css' />

    <script>
        var saved_markers = <?= get_saved_locations() ?>;
        var user_location = [96.1219935491892,16.84431419683304];
        mapboxgl.accessToken = 'pk.eyJ1IjoiZmFraHJhd3kiLCJhIjoiY2pscWs4OTNrMmd5ZTNra21iZmRvdTFkOCJ9.15TZ2NtGk_AtUvLd27-8xA';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v9',
            center: user_location,
            zoom: 10
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
            add_markers(saved_markers);

            // Listen for the `result` event from the MapboxGeocoder that is triggered when a user
            // makes a selection and add a symbol that matches the result.
            geocoder.on('result', function(ev) {
                //alert("aaaaa");
                console.log(ev.result.center);

            });
        });
        map.on('click', function (e) {
            marker.remove();
            addMarker(e.lngLat,'click');
            //console.log(e.lngLat.lat);
            document.getElementById("lat").value = e.lngLat.lat;
            document.getElementById("lng").value = e.lngLat.lng;

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
        function add_markers(coordinates) {

            var geojson = (saved_markers == coordinates ? saved_markers : '');

            console.log(geojson);
            // add markers to map
            geojson.forEach(function (marker) {
                console.log(marker);
                // make a marker for each feature and add to the map
                new mapboxgl.Marker()
                    .setLngLat(marker)
                    .addTo(map);
            });

        }

        function onDragEnd() {
            var lngLat = marker.getLngLat();
            document.getElementById("lat").value = lngLat.lat;
            document.getElementById("lng").value = lngLat.lng;
            console.log('lng: ' + lngLat.lng + '<br />lat: ' + lngLat.lat);
        }

        $('#signupForm').submit(function(event){
            event.preventDefault();
            var lat = $('#lat').val();
            var lng = $('#lng').val();
            var url = 'locations_model.php?add_location&lat=' + lat + '&lng=' + lng;
            $.ajax({
                url: url,
                method: 'GET',
                dataType: 'json',
                success: function(data){
                    alert(data);
                    location.reload();
                }
            });
        });

        document.getElementById('geocoder').appendChild(geocoder.onAdd(map));

    </script>
</body>
</html>