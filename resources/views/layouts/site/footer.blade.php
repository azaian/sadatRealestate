<!--Footer-->
<footer class="padding_top footer2 rtl">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-12 pull-right">
                <div class="footer_panel bottom30">
                    <a href="" class="logo bottom30"><img src="{{url('site/img/logo.png')}}" alt="logo"></a>
                    <p class="bottom15">عقار السادات ... هو أول وأكبر تجمع للعقارات على مستوى مدينة السادات.
                        <br> ملكيه الموقع لشركة <span style="display: block;font-size: 16px;font-weight:bold;color:#936e55;">السادات العقاريه المتحده</span>
                    </p>

                    <p class="bottom15"> <a href="javascript:void(0)"></a></p>
                    <ul class="social_share">
                        <li><a href="{{$Dataa['allmainsettings']->facebookurl}}" class="facebook"><i class="icon-facebook-1"></i></a></li>
                        <li><a href="{{$Dataa['allmainsettings']->twitterurl}}" class="twitter"><i class="icon-twitter-1"></i></a></li>
                        <li><a href="{{ $Dataa['allmainsettings']->googleplusurl}}" class="google"><i class="icon-youtube"></i></a></li>
                    </ul>

                    <form class="top30" method="post" action="{{route('addemail')}}">
                        @csrf
                        <input class="search" name="email" placeholder="أدخل بريدك الالكترونى لمتابعتنا" type="email">
                        <a class="button_s" href="#">
                            <i class="icon-mail-envelope-open"></i>
                        </a>
                    </form>

                </div>
            </div>
            {{-- <div class="col-md-3 col-sm-6 pull-right">
                <div class="footer_panel bottom30">
                    <h4 class="bottom30"></h4>
                    <ul class="area_search">
                        <li><a href="javascript:void(0)"><i class="icon-icons74"></i>Bayonne, New Jersey</a></li>
                        <li class="active"><a href="javascript:void(0)"><i class="icon-icons74"></i>Greenville, New Jersey</a></li>
                        <li><a href="javascript:void(0)"> <i class="icon-icons74"></i>The Heights, New Jersey</a></li>
                        <li><a href="javascript:void(0)"><i class="icon-icons74"></i>West Side, New York</a></li>
                        <li><a href="javascript:void(0)"><i class="icon-icons74"></i>Upper East Side, New York</a></li>
                    </ul>
                </div>
            </div> --}}
            <div class="col-md-2 col-sm-6 pull-right">
                <div class="footer_panel bottom30">
                    <h4 class="bottom15">عقارات للبيع</h4>
                    @if (isset( $Dataa['categoryForSale']))
                    @foreach ( $Dataa['categoryForSale'] as $rsForSale)
                    <div class="media" style="margin-top:0px;">
                        <div class="media-body">
                            <a href="{{route('getlinting',['cat_id'=>$rsForSale->cat_id,'type'=>'sale'])}}">
                                {{$rsForSale->category()->name}}
                            </a> </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-2 col-sm-6 pull-right">
                <div class="footer_panel bottom30">
                    <h4 class="bottom15">عقارات للايجار</h4>
                    @if (isset( $Dataa['categoryForRent']))
                    @foreach ( $Dataa['categoryForRent'] as $rsForSale)
                    <div class="media" style="margin-top:0px;">
                        <div class="media-body">
                            <a href="{{route('getlinting',['cat_id'=>$rsForSale->cat_id,'type'=>'sale'])}}">
                                {{$rsForSale->category()->name}}
                            </a> </div>
                    </div>
                    @endforeach
                    @endif

                    <h4 class="bottom15 top30">المشروعات</h4>
                    @if (isset($allprojectscategory) && count($allprojectscategory))
                    @foreach ($allprojectscategory as $oneproductcategory)
                    <div class="media" style="margin-top:0px;">
                        <div class="media-body">
                            <a href="{{route('filterprojectsbyprojectcategory_id',$oneproductcategory->id)}}">{{ $oneproductcategory->title }}</a>
                        </div>
                    </div>
                    @endforeach
                    @endif

                </div>
            </div>

            <div class="col-md-2 col-sm-6 pull-right">
                <div class="footer_panel bottom30">
                    <h4 class="bottom15">اخر الاخبار</h4>
                    @if (isset( $Dataa['news']))
                    @foreach ( $Dataa['news'] as $new)
                    <div class="media" style="margin-top:0px;">
                        <div class="media-body">
                            <a href="{{ route('getnewpage',$new->id) }}">
                                {{ str_limit(strip_tags($new->title),45," ...")}}

                            </a>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-3 col-sm-6 pull-right">
                <div class="footer_panel bottom30">

                    <h4 class="bottom30">تواصل معنا</h4>
                    <ul class="getin_touch">
                        @if (isset($Dataa['allmainsettings']))
                        @foreach (explode("/",$Dataa['allmainsettings']->mobilenumber) as $value)
                        <li><i class="icon-telephone114"></i>{{$value}}</li>
                        @endforeach
                        @endif
                        @if (isset($Dataa['allmainsettings']->email))
                        <li><a href="javascript:void(0)">
                                <i class="icon-icons142"></i>
                                {{ $Dataa['allmainsettings']->email }}
                            </a> </li>
                        @endif
                        <li><a href="javascript:void(0)"><i class="icon-browser2"></i>{{route("homePage")}}</a></li>
                        @if (isset($Dataa['allmainsettings']->address))
                        <li><i class="icon-icons74"></i>{{$Dataa['allmainsettings']->address}}</li>
                        @endif
                    </ul>

                </div>
            </div>

        </div>
    </div>
</footer>
<!--CopyRight-->
<div class="copyright index2">
    <div class="copyright_inner">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <p>Copyright &copy; 2019 <span>Sadat Realestate</span>. All rights reserved.</p>
                </div>
                {{-- <div class="col-md-5 text-right">
                    <p>Designed by <a href="javascript:void(0)">Brighthemes</a></p>
                </div> --}}
            </div>
        </div>
    </div>
</div>