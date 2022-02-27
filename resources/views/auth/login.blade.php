<!DOCTYPE html>
<html>
<head>
    <title>MMIT Bootcamp</title>

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


<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#login").hide();
</script>

</body>
</html>
