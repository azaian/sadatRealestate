<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bracket">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/bracket/img/bracket-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/bracket">
    <meta property="og:title" content="Bracket">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <title>Admin | @yield('title')</title>
    {{-- <script src="{{url('ckeditor/ckeditor.js')}}"></script> --}}
    {{-- <link rel="stylesheet" href="{{url('ckeditor/sample.css')}}"> --}}
    {{-- <script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script> --}}
      <script src="{{ url('ckeditor/ckeditor.js') }}"></script>
    <!-- vendor css -->
    <link href="{{url('lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{url('lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">
    <link href="{{url('lib/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="{{url('lib/jquery-switchbutton/jquery.switchButton.css')}}" rel="stylesheet">
    <link href="{{url('lib/codemirror/codemirror.css')}}" rel="stylesheet">
    <link href="{{url('lib/codemirror/theme/eclipse.css')}}" rel="stylesheet">
    <link href="{{url('lib/codemirror/theme/dracula.css')}}" rel="stylesheet">
    <link href="{{url('lib/codemirror/theme/base16-light.css')}}" rel="stylesheet">
    <link href="{{url('lib/codemirror/theme/lesser-dark.css')}}" rel="stylesheet">
    <link href="{{url('lib/codemirror/addon/scroll/simplescrollbars.css')}}" rel="stylesheet">
    <link href="{{url('lib/rickshaw/rickshaw.min.css')}}" rel="stylesheet">
    {{-- <link href="{{url('lib/chartist/chartist.css')}}" rel="stylesheet"> --}}
    <link href="{{url('lib/highlightjs/github.css')}}" rel="stylesheet">
    <link href="{{url('lib/datatables/jquery.dataTables.css')}}" rel="stylesheet">
    <link href="{{url('lib/medium-editor/medium-editor.css')}}" rel="stylesheet">
    <link href="{{url('lib/medium-editor/default.css')}}" rel="stylesheet">
    <link href="{{url('lib/summernote/summernote-bs4.css')}}" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{url('css/bracket.css')}}">
</head>

<body>

<!-- ########## START: LEFT PANEL ########## -->
@include('layouts.cpanel.sidebar')
<!-- ########## END: LEFT PANEL ########## -->

<!-- ########## START: HEAD PANEL ########## -->
@include('layouts.cpanel.headpanel')
<!-- ########## END: HEAD PANEL ########## -->

<!-- ########## START: RIGHT PANEL ########## -->
@include('layouts.cpanel.rightpanel')
<!-- ########## END: RIGHT PANEL ########## --->

<!-- ########## START: MAIN PANEL ########## -->
@yield('content')
<!-- ########## END: MAIN PANEL ########## -->




<script src="{{url('lib/jquery/jquery.js')}}"></script>
<script src="{{url('lib/popper.js/popper.js')}}"></script>
<script src="{{url('lib/bootstrap/bootstrap.js')}}"></script>
<script src="{{url('lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
<script src="{{url('lib/moment/moment.js')}}"></script>
<script src="{{url('lib/jquery-ui/jquery-ui.js')}}"></script>
<script src="{{url('lib/jquery-switchbutton/jquery.switchButton.js')}}"></script>
<script src="{{url('lib/peity/jquery.peity.js')}}"></script>
{{-- <script src="{{url('lib/chartist/chartist.js')}}"></script> --}}
<script src="{{url('lib/jquery.sparkline.bower/jquery.sparkline.min.js')}}"></script>
<script src="{{url('lib/d3/d3.js')}}"></script>
{{-- <script src="{{url('lib/rickshaw/rickshaw.min.js')}}"></script> --}}


<script src="{{url('js/ResizeSensor.js')}}"></script>
<script src="{{url('js/dashboard.js')}}"></script>



    <script src="{{url('lib/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{url('lib/medium-editor/medium-editor.js')}}"></script>
    <script src="{{url('lib/highlightjs/highlight.pack.js')}}"></script>
    <script src="{{url('js/bracket.js')}}"></script>

<script>
    $(function(){
        'use strict'

        // FOR DEMO ONLY
        // menu collapsed by default during first page load or refresh with screen
        // having a size between 992px and 1299px. This is intended on this page only
        // for better viewing of widgets demo.
        $(window).resize(function(){
            minimizeMenu();
        });

        minimizeMenu();

        function minimizeMenu() {
            if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
                // show only the icons and hide left menu label by default
                $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
                $('body').addClass('collapsed-menu');
                $('.show-sub + .br-menu-sub').slideUp();
            } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
                $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
                $('body').removeClass('collapsed-menu');
                $('.show-sub + .br-menu-sub').slideDown();
            }
        }

    });
</script>

  @yield('extraJS')
</body>
</html>
