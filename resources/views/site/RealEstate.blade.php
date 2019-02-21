@extends('layouts.site.index')
@section('title')
Real Estate
@endsection
@section('custommetatags')
<meta property="og:image" content="{{ url('assets/img/realestate',$realEstate->main_pic) }}" />

<!-- Place this data between the <head> tags of your website -->
<meta name="description" content="content" />

<!-- Twitter Card data -->
<meta name="twitter:card" value="summary">

<!-- Open Graph data -->
<meta property="og:title" content="{{$realEstate->title}}" />
<meta property="og:type" content="article" />
<meta property="og:url" content="http://sadatrealestate.com/realestate/public/realestate/{{$realEstate->id}}" />
<meta property="og:image" content="{{ url('assets/img/realestate',$realEstate->main_pic) }}" />
<meta name="twitter:image" content="{{ url('assets/img/realestate',$realEstate->main_pic) }}">


<meta property="og:description" content="content" />

@endsection
@section('pagecontent')

<!-- Property Detail Start -->
<section id="property" class="padding_top padding_bottom_half">
    <div class="container">
        <div class="row">
            <div class="col-md-8 listing1 property-details pull-right">
                <h2 class="text-uppercase rtl">{{ $realEstate->title }}</h2>
                <p class="bottom30 top10 rtl">رقم العقار : {{ $realEstate->id }}
                    <br>عدد المشاهدات : {{ $realEstate->views }}
                    <br> افض الى المفضله: <a href="#" id="addfav"><i class="icon-like"></i></a>
                </p>
                <div id="property-d-1" class="owl-carousel ">
                    <div class="item"><img src="{{ url('assets/img/realestate/'.$realEstate->main_pic) }}" alt="image" /></div>
                    @if ( $realEstate->extraImages() !== NULL && count( $realEstate->extraImages() ) > 0 )
                    @foreach ($realEstate->extraImages() as $img)
                    <div class="item"><img src="{{ url('assets/img/realestate/'.$img->picturename) }}" alt="image" /></div>
                    @endforeach
                    @endif
                </div>
                <div id="property-d-1-2" class="owl-carousel pull-right">
                    <div class="item"><img src="{{ url('assets/img/realestate/'.$realEstate->main_pic) }}" alt="image" /></div>
                    @if ( $realEstate->extraImages() !== NULL && count( $realEstate->extraImages() ) > 0 )
                    @foreach ($realEstate->extraImages() as $img)
                    <div class="item"><img src="{{ url('assets/img/realestate/'.$img->picturename) }}" alt="image" /></div>
                    @endforeach
                    @endif
                </div>
                <div class="property_meta bg-black bottom40">
                    {{-- <span><i class="icon-select-an-objecto-tool"></i>4800 sq ft</span>
            <span><i class=" icon-microphone"></i>2 Office Rooms</span>
            <span><i class="icon-safety-shower"></i>1 Bathroom</span>
            <span><i class="icon-old-television"></i>TV Lounge</span>
            <span><i class="icon-garage"></i>1 Garage</span> --}}
                </div>
                <h2 class="text-uppercase rtl">تفاصيل الاعلان</h2>

                <div class="text-it-p bottom40 rtl">
                    <p>{{ $realEstate->details }}</p>
                </div>
                <div class="row property-d-table bottom40 rtl">
                    <div class="col-md-5 col-sm-5 col-xs-12 pull-right">
                        <h2 class="text-uppercase bottom20 rtl">ملخص التفاصيل</h2>

                        <table class="table table-striped table-responsive">
                            <tbody>
                                <tr>
                                    <td><b>الفئه</b></td>
                                    <td class="text-right">{{ $realEstate->category()->name }}</td>
                                </tr>
                                <tr>
                                    <td><b>الكود</b></td>
                                    <td class="text-right">{{ $realEstate->id }}</td>
                                </tr>
                                <tr>
                                    <td><b>السعر</b></td>
                                    <td class="text-right">{{ $realEstate->price }}</td>
                                </tr>
                                <tr>
                                    <td><b>المساحه</b></td>
                                    <td class="text-right">{{ $realEstate->area }}</td>
                                </tr>
                                <tr>
                                    <td><b>قابل للتفاوض</b></td>
                                    <td class="text-right">
                                        @if ($realEstate->negotiatale==1)
                                        نعم
                                        @else
                                        لا
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>النوع</b></td>
                                    <td class="text-right">
                                        @if ($realEstate->type=='rent')
                                        ايجار
                                        @else
                                        للبيع
                                        @endif</td>
                                </tr>
                                <tr>
                                    <td><b>الحاله</b></td>
                                    <td class="text-right">
                                        @if ($realEstate->avaialbe==1)
                                        متاح
                                        @else
                                        تم البيع
                                        @endif</td>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>تاريخ النشر</b></td>
                                    <td class="text-right">{{ $realEstate->created_at->toDateString() }}</td>
                                </tr>
                                <tr>
                                    <td><b>المنطقه</b></td>
                                    <td class="text-right">
                                        @if ($realEstate->district()!==NULL)
                                        {{ $realEstate->district()->name }}
                                        @else
                                        unkown
                                        @endif</td>
                                </tr>

                                {{-- extra data fileds  --}}

                                @if ( $realEstate->extraFields() !== Null && count($realEstate->extraFields())>0)
                                @foreach ($realEstate->extraFields() as $field)
                                <tr>
                                    <td><b>{{ $field->fieldData()->fieldname }}</b></td>
                                    <td class="text-right">
                                        {{ $field->value }}
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <h2 class="text-uppercase bottom20 rtl">تواصل معنا</h2>
                        <div class="agent_wrap bottom15" style="border:#936e55 3px solid;border-radius:10px;">
                            <table class="agent_contact table">
                                <tbody>
                                    @php
                                    $i=0;
                                    @endphp
                                    @if (isset($Dataa['allmainsettings']))
                                    @foreach (explode("/",$Dataa['allmainsettings']->mobilenumber) as $value)
                                    @if ($i++>=2)
                                    @break
                                    @endif
                                    <tr class="bottom10">
                                        <td><strong>الهاتف:</strong></td>
                                        <td class="text-right">
                                            {{ $value }}
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                    @if (isset($Dataa['allmainsettings']->email))
                                    <tr>
                                        <td><strong>الايميل:</strong></td>
                                        <td class="text-right">
                                            <a href="mailto:{{ $Dataa['allmainsettings']->email }}">
                                                {{ $Dataa['allmainsettings']->email }}
                                            </a>
                                        </td>
                                    </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                        <form class="callus" method="post" action="{{ route('sendnewpost') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 pull-right">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="الاسم" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" name="mobilenumber" class="form-control" placeholder="رقم الهاتف" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="الايميل" required>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" placeholder="الرساله" required></textarea>
                                    </div>
                                    <input type="hidden" name="rs_id" value="{{$realEstate->id }}">
                                </div>
                                <div class="col-sm-6">

                                </div>
                                <div class="col-sm-12 row">
                                    <div class="row">
                                        <div class="col-sm-3 pull-right">
                                            <input type="submit" style="width:unset;" class="btn-blue uppercase border_radius" value="ارسال">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                @if (isset($realEstate->videourl))
                @if (filter_var($realEstate->videourl, FILTER_VALIDATE_URL))
                <h2 class="text-uppercase bottom20 rtl">الفيديو</h2>
                <div class="row bottom40">
                    <div class="col-md-12 padding-b-20">
                        <div class="pro-video">
                            <figure class="wpf-demo-gallery">
                                <video class="video" controls>
                                    <source src="{{ $realEstate->videourl }}" type="video/mp4">
                                    <source src="{{ $realEstate->videourl }}" type="video/ogg">
                                </video>
                            </figure>
                        </div>
                    </div>
                </div>
                @endif
                @endif

                <h2 class="text-uppercase bottom20 rtl">الخريطه</h2>
                <div class="row bottom40">



                    {{-- map part  --}}

                    <div class="form-group">
                        <label for="exampleInputEmail1">{{__('ابحث على الخريطه')}}</label>
                        <div id="shoplocationedit" style="width:100%;height:350px"></div>
                    </div>
                </div>



            </div>

            <aside class="col-md-4 col-xs-12 rtl">
                <div class="property-query-area clearfix">
                    <div class="col-md-12">
                        <h3 class="text-uppercase bottom20 top15">بحث متقدم</h3>
                    </div>
                    <form class="callus" method="post" action="{{route('listing')}}">
                        @csrf
                        <div class="single-query form-group col-sm-12">
                            <div class="intro">
                                الفئه
                                <select name="cat_id" class="cat_id">
                                    <option value="">غير محدد</option>
                                    @if (isset($Dataa['categories'])&&count($Dataa['categories'])>0)
                                    @foreach ($Dataa['categories'] as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="single-query form-group col-sm-12">
                            المنطقه
                            <select name="district" class="district" style="background-color:#fff">
                                <option value="">غير محدد</option>
                            </select>

                        </div>
                        <div class="single-query form-group col-sm-12">
                            <div class="intro">
                                <select name="type">
                                    <option value="sale" class="active">بيع</option>
                                    <option value="rent">ايجار</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="single-query form-group">
                                        اعلى سعر
                                        <input type="number" class="keyword-input" name="price[1]" placeholder="اعلى سعر">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="single-query form-group">
                                        اكبر مساحه
                                        <input type="number" class="keyword-input" name="area[1]" placeholder="اكبر مساحه">
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-sm-12 form-group">
                            <button type="submit" class="btn-blue border_radius">بحث</button>
                        </div>
                    </form>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="bottom40 margin40 rtl">عقارات لقطه</h3>
                    </div>
                </div>

                @if ($lots !== NULL && count($lots)>0)
                @foreach ($lots as $lot)
                <div class="row bottom20 rtl pull-right">
                    <div class="col-md-4 col-sm-4 col-xs-6 p-image  pull-right">
                        <img src="{{ url('assets/img/realestate/'.$lot->main_pic) }}" alt="image" width="80px" height="77px" />
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-6  pull-right">
                        <div class="feature-p-text">
                            <h4>
                                <a href="{{ url('realestate/'.$lot->id) }}">{{ $lot->title }}</a>
                            </h4>
                            <p class="bottom15"></p>
                            <a href="{{ url('realestate/'.$lot->id) }}">مشاهده</a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif


            </aside>
        </div>
        <div class="social-networks">
            <div class="social-icons-2">
                <span class="share-it">مشاركه العقار</span>
                <span><a onclick="share(`http://sadatrealestate.com/realestate/public/realestate/{{$realEstate->id}}`)"><i class="fa fa-facebook" aria-hidden="true"></i> </a></span>


            </div>
        </div>

        <script>
            function share(url) {
                FB.ui({
                    method: 'share',
                    hashtag: '#thisisahashtag',
                    href: url,
                    display: 'popup'
                }, function(response) {});
            }
        </script>
    </div>
</section>
<!-- Property Detail End -->


@endsection

@section('extraJS')
{{-- get extra fields and district --}}
<script type="text/javascript">
    $("#addfav").click(function() {

        if (!!Cookies.get("rs_id")) {
            var cook = Cookies.get("rs_id").concat("/<?php echo $realEstate->id ?>");
            Cookies.set('rs_id', cook);
        }
        Cookies.set('rs_id', <?php echo $realEstate->id ?>);
        alert("added");
    });
</script>

<script>
    $(".cat_id").change(function() {
        var cat_id = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "{{ route('Ajax_get_districts_fields') }}",
            method: 'POST',
            data: {
                cat_id: cat_id,
                _token: token
            },
            success: function(data) {
                $(".district").html('');
                $(".district").html(data.options);
            },
            error: function(data) {
                $(".district").html('');
                $(".district").html(data.options);

            }
        });

    });

    $(".cat_id").each(function() {
        var cat_id = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "{{ route('Ajax_get_districts_fields') }}",
            method: 'POST',
            data: {
                cat_id: cat_id,
                _token: token
            },
            success: function(data) {
                $(".district").html('');
                $(".district").html(data.options);

            },
            error: function(data) {
                $(".district").html('');
                $(".district").html(data.options);

            }
        });

    });
</script>


{{-- map of real estate --}}

<script>
    var marker = null;
    var placeSearch, autocomplete;

    function initMap() {
        autocomplete =
            new google.maps.places.Autocomplete((document.getElementById('autocomplete')), {
                types: ['geocode']
            });
        var map = new google.maps.Map(document.getElementById('shoplocationedit'), {
            zoom: 12,
            center: {
                lat: <?php echo $realEstate->lat ?>,
                lng: <?php echo $realEstate->lng ?>
            }
        });

        var MArkerPos = new google.maps.LatLng(<?php echo $realEstate->lat ?>, <?php echo $realEstate->lng ?>);
        marker = new google.maps.Marker({
            position: MArkerPos,
            map: map
        });
        autocomplete.addListener('place_changed', function() {
            placeMarkerAndPanTo(autocomplete.getPlace().geometry.location, map);
            document.getElementById("shoplatedi").value = autocomplete.getPlace().geometry.location.lat();
            document.getElementById("shoplngedi").value = autocomplete.getPlace().geometry.location.lng();
        });
        map.addListener('click', function(e) {
            placeMarkerAndPanTo(e.latLng, map);
            document.getElementById("shoplatedi").value = e.latLng.lat();
            document.getElementById("shoplngedi").value = e.latLng.lng();

        });
    }

    function placeMarkerAndPanTo(latLng, map) {
        map.setZoom(12);
        marker.setPosition(latLng);
        map.panTo(latLng);
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPN_XufKy-QTSCB68xFJlqtUjHQ8m6uUY&libraries=places&callback=initMap">
</script>
@endsection