<!--Header-->
<header class="white_header">
    <div class="topbar default_clr">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    {{-- <p>We are Best in Town With 40 years of Experience.</p> --}}
                </div>

                <div class="col-md-8 text-right">

                    <ul class="social_share left15">
                        @if (isset($Dataa['allmainsettings']->facebookurl ))
                        <li><a href="{{ $Dataa['allmainsettings']->facebookurl }}" class="facebook"><i class="icon-facebook-1"></i></a></li>
                        @endif
                        @if (isset($Dataa['allmainsettings']->twitterurl ))
                        <li><a href="{{ $Dataa['allmainsettings']->twitterurl }}" class="twitter"><i class="icon-twitter-1"></i></a></li>
                        @endif
                        @if (isset($Dataa['allmainsettings']->googleplusurl))
                        <li><a href="{{ $Dataa['allmainsettings']->googleplusurl }}" class="google"><i class="icon-youtube"></i></a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-default navbar-sticky bootsnav">
        <div class="container">
            <div class="attr-nav">
                {{-- @if (isset($Dataa['allmainsettings']->mobilenumber))
                <div class="upper-column info-box first">
                    <div class="icons"><i class="icon-icons202"></i></div>
                    <ul>
                        <li><strong>Phone Number</strong></li>
                        <li>{{ $Dataa['allmainsettings']->mobilenumber }}</li>
                </ul>
            </div>
            @endif --}}
            {{-- @if (isset( $Dataa['allmainsettings']->email ))
                <div class="info-box">
                    <div class="icons"><i class="icon-icons142"></i></div>
                    <ul>
                        <li><strong>E-mail</strong></li>
                        <li>{{ $Dataa['allmainsettings']->email }}</li>
            </ul>
        </div>
        @endif --}}
        </div>
        <!-- Start Header Navigation -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ route('homePage') }}"><img src="{{url('site/img/logo.png')}}" class="logo" alt=""></a>
        </div><!-- End Header Navigation -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-right" data-in="fadeIn" data-out="fadeOut">
                <li><a href="{{ route('homePage') }}">الرئيسية</a></li>
                <li class="dropdown megamenu-fw">
                    <a href="#." class="dropdown-toggle" data-toggle="dropdown">عقارات</a>
                    <ul class="dropdown-menu megamenu-content bg" role="menu">
                        <li>
                            <div class="row">
                                @if (isset($Dataa['categoryForSale']))
                                <div class="col-menu col-md-6 pull-right rtl">
                                    <div class="row">
                                        <h5 class="title pull-right">عقارات للبيع</h5>
                                    </div>
                                    <div class="content">
                                        <ul class="menu-col pull-right ">
                                            @foreach ($Dataa['categoryForSale'] as $cat)
                                            @if ($cat->category()->name == 'مزارع' || $cat->category()->name =='مصانع' )
                                            @continue
                                            @endif
                                            <li class="">
                                                <a href="{{route('getlinting',['cat_id'=>$cat->cat_id,'type'=>'sale'])}}">
                                                    {{$cat->category()->name}}
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @endif
                                @if (isset($Dataa['categoryForRent']))
                                <div class="col-menu col-md-6 pull-right rtl">
                                    <div class="row">
                                        <h5 class="title pull-right">عقارات للإيجار</h5>
                                    </div>
                                    <div class="content">
                                        <ul class="menu-col">
                                            @foreach ($Dataa['categoryForRent'] as $cat)
                                            @if ($cat->category()->name == 'مزارع' || $cat->category()->name =='مصانع' )
                                            @continue
                                            @endif
                                            <li>
                                                <a href="{{route('getlinting',['cat_id'=>$cat->cat_id,'type'=>'rent'])}}">
                                                    {{$cat->category()->name}}
                                                </a>
                                            </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <!-- end row -->
                        </li>
                    </ul>
                </li>
                @if (isset($Dataa['farms']))
                <li><a href="{{route('getlinting',['cat_id'=>$Dataa['farms']->id])}}">مزارع</a></li>
                @endif
                @if (isset($Dataa['factories']))
                <li><a href="{{route('getlinting',['cat_id'=>$Dataa['factories']->id])}}">مصانع</a></li>
                @endif
                <li class="dropdown">
                    <a href="#." class="dropdown-toggle" data-toggle="dropdown">المشروعات </a>
                    <ul class="dropdown-menu">
                        @if (isset($allprojectscategory) && count($allprojectscategory))
                        @foreach ($allprojectscategory as $oneproductcategory)
                        <li class="dropdown">
                            <a href="{{route('filterprojectsbyprojectcategory_id',$oneproductcategory->id)}}">{{ $oneproductcategory->title }}</a>
                        </li>
                        @endforeach
                        @endif
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#." class="dropdown-toggle" data-toggle="dropdown">الأخبار و النصائح </a>
                    <ul class="dropdown-menu">

                        <li class="dropdown">
                            <a href="{{ route('getnewspage') }}">الأخبار العقارية
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="{{ route('getadvicespage') }}">نصائج عقارية</a>
                        </li>

                    </ul>
                </li>

                <li><a href="{{ route('getaboutuspage') }}">عن الشركة
                </a></li>
                <li><a href="{{ route('getcontactuspage') }}">تواصل معنا </a></li>

            </ul>
            <a class="btn-blue border_radius" href="{{ route('addrealestate')}}" style="float: left;position: relative;top: 17px; padding:14px 15px;">اضف عقارك</a>
        </div>
        </div>
    </nav>
</header>
<!--Header Ends-->

{{-- ////////////////////////////////////////////////////////////////////////////////////////// --}}

{{-- old nav-bar --}}

{{-- <!--Header-->
<header class="layout_default">
    <div class="topbar grey">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <p>We are Best in Town With 40 years of Experience.</p>
                </div>
                <div class="col-md-7 text-right">
                    <ul class="breadcrumb_top text-right">
                        <li><a href="favorite_properties.html"><i class="icon-icons43"></i>Favorites</a></li>
                        <li><a href="submit_property.html"><i class="icon-icons215"></i>Submit Property</a></li>
                        <li><a href="my_properties.html"><i class="icon-icons215"></i>My Property</a></li>
                        <li><a href="profile.html"><i class="icon-icons230"></i>Profile</a></li>
                        <li><a href="login.html"><i class="icon-icons179"></i>Login / Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header-upper">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <div class="logo"><a href="index3.html"><img alt="" src="{{url('site/img/logo.png')}}"></a></div>
</div>
<!--Info Box-->
<div class="col-md-9 col-sm-12 right">
    <div class="info-box first">
        <div class="icons"><i class="icon-telephone114"></i></div>
        <ul>
            <li><strong>رقم الهاتف</strong></li>
            <li>{{ $Dataa['allmainsettings']->mobilenumber }}</li>
        </ul>
    </div>
    <div class="info-box">
        <div class="icons"><i class="icon-icons74"></i></div>
        <ul>
            <li><strong>العنوان</strong></li>
            <li>{{ unserialize($Dataa['allmainsettings']->address)[config('app.locale')] }}</li>
        </ul>
    </div>
    <div class="info-box">
        <div class="icons"><i class="icon-icons142"></i></div>
        <ul>
            <li><strong>البريد الالكترونى</strong></li>
            <li>{{ $Dataa['allmainsettings']->email }}</li>
        </ul>
    </div>
</div>
</div>
</div>
</div>
<nav class="navbar navbar-default navbar-sticky bootsnav">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="attr-nav">
                    <ul class="social_share clearfix">
                        <li><a href="{{ $Dataa['allmainsettings']->facebookurl }}" class="facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="{{ $Dataa['allmainsettings']->twitterurl }}" class="twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="google" href="{{ $Dataa['allmainsettings']->googleplusurl }}"><i class="icon-google4"></i></a></li>
                    </ul>
                </div>
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand sticky_logo" href="index3.html"><img src="{{url('site/img/logo-white.png')}}" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav" data-in="fadeIn" data-out="fadeOut">
                        <li><a href="{{ route('getaboutuspage') }}">عن الشركة
                        </a></li>
                        <li><a href="{{ route('getcontactuspage') }}">تواصل معنا </a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
</header>
<!--Header Ends--> --}}