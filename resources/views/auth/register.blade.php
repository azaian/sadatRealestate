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

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Bracket Responsive Bootstrap 4 Admin Template</title>

    <!-- vendor css -->
    <link href="{{url('lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{url('lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{url('css/bracket.css')}}">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">


      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> SadatRealstat <span class="tx-normal">]</span></div>
        <div class="tx-center mg-b-60">لوجه التحكم</div>
        <form method="POST" action="{{ route('register') }}">
            @csrf

              <div class="form-group">
                <input type="text" class="form-control" placeholder="ادخل البريد الالكترونى" name="email">
              </div><!-- form-group -->
              <div class="form-group">
                <input type="text" class="form-control" placeholder="ادخل الاسم" name="name">
              </div><!-- form-group -->
              <div class="form-group">
                <input type="password" name="password"class="form-control" placeholder="ادخل الرقم السرى" >
                {{-- <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a> --}}
              </div><!-- form-group -->
              <div class="form-group">
                <input type="password" name="password_confirmation" class="form-control" placeholder="ادخل الرقم السرى">
                {{-- <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a> --}}
              </div><!-- form-group -->
              <button type="submit" class="btn btn-info btn-block">ادخل</button>

        </form>

      </div><!-- login-wrapper -->
    </div><!-- d-flex -->

    <script src="{{url('lib/jquery/jquery.js')}}"></script>
    <script src="{{url('lib/popper.js/popper.js')}}"></script>
    <script src="{{url('lib/bootstrap/bootstrap.js')}}"></script>

  </body>
</html>
