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

   
</body>
</html>