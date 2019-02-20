<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    @yield('custommetatags')


    <link href="{{url('lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('site/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('site/css/reality-icon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('site/css/bootsnav.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('site/css/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('site/css/owl.transitions.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('site/css/cubeportfolio.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('site/css/settings.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('site/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('site/css/range-Slider.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('site/css/search.css')}}">
    <link rel="icon" href="{{url('site/img/icon.png')}}">
    {{-- <link rel="stylesheet" type="text/css" href="{{url('site/css/font-awesome.min.css')}}"> --}}



</head>

<body>
    <!--Loader-->
    <div class="loader">
        <div class="span">
            <div class="location_indicator"></div>
        </div>
    </div>
    <!--Loader-->

    @include('layouts.site.header')


    @yield('pagecontent')


    @include('layouts.site.footer')

    <script src="{{url('site/js/jquery-2.1.4.js')}}"></script>
    <script src="{{url('site/js/bootstrap.min.js')}}"></script>
    <script src="{{url('site/js/bootsnav.js')}}"></script>
    <script src="{{url('site/js/jquery.parallax-1.1.3.js')}}"></script>
    <script src="{{url('site/js/jquery.appear.js')}}"></script>
    <script src="{{url('site/js/jquery-countTo.js')}}"></script>
    <script src="{{url('site/js/masonry.pkgd.min.js')}}"></script>
    <script src="{{url('site/js/range-Slider.min.js')}}"></script>
    <script src="{{url('site/js/owl.carousel.min.js')}}"></script>
    <script src="{{url('site/js/jquery.cubeportfolio.min.js')}}"></script>
    <script src="{{url('site/js/selectbox-0.2.min.js')}}"></script>
    <script src="{{url('site/js/zelect.js')}}"></script>
    <script src="{{url('site/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{url('site/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script src="{{url('site/js/revolution.extension.navigation.min.js')}}"></script>
    <script src="{{url('site/js/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{url('site/js/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{url('site/js/revolution.extension.parallax.min.js')}}"></script>
    <script src="{{url('site/js/revolution.extension.video.min.js')}}"></script>
    <script src="{{url('site/js/neary-by-place.js')}}"></script>
    <script src="http://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
    <script src="{{url('site/js/google-map.js')}}"></script>
    <script src="{{url('site/js/custom.js')}}"></script>
    <script src="{{url('site/js/autocomplete.js')}}"></script>
    <script src="{{url('site/js/functions.js')}}"></script>
    <script src="{{url('site/js/fontawesome.min.js')}}"></script>

<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId            : '637213456709782',
            autoLogAppEvents : true,
            xfbml            : true,
            version          : 'v3.2'
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

    @yield('extraJS')
</body>

</html>