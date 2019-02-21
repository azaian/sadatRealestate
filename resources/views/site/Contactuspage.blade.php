@extends('layouts.site.index')
@section('title')
Contact us
@endsection

@section('pagecontent')

<!-- Page Banner Start-->
<section class="page-banner page-banner-bg padding rtl">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="p-white text-uppercase">تواصل معنا</h1>
            </div>
        </div>
    </div>
</section>
<!-- Page Banner End -->



<!-- testimonials Start -->
<section id="contact-us" class="padding rtl">
    <div class="container">
        <div class="row">
            <div class="col-sm-7 margin40 pull-right">
                <div class="our-agent-box bottom30">
                    <h2>تواصل برساله</h2>
                </div>
                <form method="post" action="{{ route('sendnewpost') }}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 pull-right">
                            <div class="form-group">
                                <input required type="text" class="form-control" placeholder="الاسم" name="name">
                            </div>
                            <div class="form-group">
                                <input required type="tel" class="form-control" placeholder="رقم الهاتف" name="mobilenumber">
                            </div>
                            <div class="form-group">
                                <input required type="email" class="form-control" placeholder="الايميل" name="email">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <textarea required class="form-control" placeholder="الرساله" name="message" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 row">
                            <div class="row">
                                <div class="">
                                    <input required class="btn-blue uppercase border_radius" value="ارسال" type="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-5 margin40">
                <div class="agent-p-contact">
                    <div class="our-agent-box bottom30">
                        <h2>تواصل معنا</h2>
                    </div>
                    <div class="agetn-contact-2 bottom30">
                        @if (isset($Dataa['allmainsettings']))
                        @foreach (explode("/",$Dataa['allmainsettings']->mobilenumber) as $value)
                        <p><i class="icon-telephone114"></i> {{ $value }}</p>
                        @endforeach
                        @endif

                        <p><i class=" icon-icons142"></i>{{$Dataa['allmainsettings']->email}}</p>
                        <p><i class="icon-browser2"></i>{{route('homePage')}}</p>
                        <p><i class="icon-icons74"></i> {{$Dataa['allmainsettings']->address}}</p>
                    </div>
                    <ul class="social_share bottom20">
                        <li><a href="{{$Dataa['allmainsettings']->facebookurl}}" class="facebook"><i class="icon-facebook-1"></i></a></li>
                        <li><a href="{{$Dataa['allmainsettings']->twitterurl}}" class="twitter"><i class="icon-twitter-1"></i></a></li>
                        <li><a href="{{$Dataa['allmainsettings']->googleplusurl}}" class="google"><i class="icon-youtube"></i></a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- testimonials End -->

@endsection