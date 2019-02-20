@extends('layouts.site.index')
@section('title')
اضافه عقار
@endsection

@section('pagecontent')
<!-- My Properties  -->
<section id="property" class="padding listing1 rtl">
    <div class="container">
        <div class="row">

            @if (\Session::has('success'))
            <div class="alert alert-success alert-bordered pd-y-20" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="d-sm-flex align-items-center justify-content-start">
                    <i class="icon ion-ios-checkmark alert-icon tx-52 mg-r-20 tx-success"></i>
                    <div class="mg-t-20 mg-sm-t-0">
                        <h5 class="mg-b-2 tx-success">تم.</h5>
                        <p class="mg-b-0 tx-gray">{{ \Session::get('success') }}</p>
                    </div>
                </div><!-- d-flex -->
            </div>
            @endif

            <div class="col-sm-1 col-md-2"></div>
            <div class="col-sm-10 col-md-8">
                <h2 class="text-uppercase bottom40">اضف عقارك</h2>
                <form action="{{ route('storerealestate') }}" method="post" enctype="multipart/form-data" class="callus clearfix border_radius submit_property">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="single-query form-group bottom20">
                                <label>الاسم</label>
                                <input type="text" required class="keyword-input" placeholder="الاسم" name="name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="single-query form-group bottom20">
                                <label>عنوان الاعلان</label>
                                <input type="text" required class="keyword-input" name="title" placeholder="عنوان الاعلان" maxlength="50">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="single-query form-group bottom20">
                                <label>رقم الهاتف</label>
                                <input type="text" required class="keyword-input" name="phone_no" placeholder="رقم الهاتف">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="single-query form-group bottom20">
                                <label>رقم الوتساب</label>
                                <input type="text" required class="keyword-input" name="whatsapp_no" placeholder="رقم الوتساب">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="single-query form-group bottom20">
                                <label>الايميل</label>
                                <input type="email" name="email" class="keyword-input" name="whatsapp_no" placeholder="الايميل">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class=" single-query bottom20">
                                <label>الحاله </label>
                                <div class="intro">
                                    <select name="type">
                                        <option value="sale">للبيع</option>
                                        <option value="rent">للايجار</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class=" single-query bottom20">
                                <label>الفئه </label>

                                <select name="type" class="cat_id" required>
                                    <option disabled value="">غير محدد</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class=" single-query bottom20">
                                <label>المنطقه </label>
                                <select name="district" class="district">
                                    <option value="">غير محدد</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="single-query form-group bottom20">
                                <label>المساحه</label>
                                <input type="number" class="keyword-input" name="area" min="0" placeholder="المساحه" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="single-query form-group bottom20">
                                <label>السعر</label>
                                <input type="number" class="keyword-input" name="price" min="0" placeholder="السعر">
                            </div>
                        </div>

                        {{-- extra fileds --}}
                        <div class="extraFields">

                        </div>

                        <div class="col-sm-12">
                            <h3 class="bottom15 margin40">تفاصيل الاعلان </h3>
                            <textarea class="keyword-input" style="width:100%" name="details"></textarea>
                        </div>

                        <div class="col-sm-12">
                            <div class="single-query form-group bottom20">
                                <label>عنوان الفيديو</label>
                                <input type="text" class="keyword-input" name="videourl" min="0" placeholder="عنوان الفيديو">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="single-query form-group bottom20">
                                <label>الصوره الرئيسيه</label>
                                <input type="file" class="keyword-input" name="main_pic" placeholder="" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="single-query form-group bottom20">
                                <label>صور اضافه</label>
                                <input type="file" class="keyword-input" name="images[]" placeholder="" multiple>
                            </div>
                        </div>

                        {{-- map part  --}}
                        <div class="form-group">
                            <input type="hidden" required class="form-control" name="lat" value="" id="shoplatedi" placeholder="Enter lat ">
                        </div>

                        <div class="form-group">
                            <input type="hidden" required class="form-control" name="lng" value="" id="shoplngedi" placeholder="Enter long">
                        </div>
                        <div class="single-query form-group bottom20">
                            <label class="col-md-12 col-xs-12 control-label">{{__('ابحث بالعنوان')}}</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" class="form-control" id="autocomplete" placeholder="{{__('ابحث بالعنوان')}}" review required>
                                </div>
                            </div>
                        </div>

                        <div class="single-query form-group bottom20 col-md-12">
                            <label for="exampleInputEmail1">{{__('ابحث على الخريطه')}}</label>
                            <div id="shoplocationedit" style="width:100%;height:350px"></div>
                        </div>



                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn-blue border_radius margin40">اضف العقار</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-1 col-md-2"></div>
            <div class="col-sm-4">
            </div>
        </div>
    </div>
</section>
@endsection



@section('extraJS')
{{-- get extra fields and district --}}
<script>
    $(".cat_id").change(function() {
        var cat_id = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "{{ route('Ajax_get_districts_fields_site') }}",
            method: 'POST',
            data: {
                cat_id: cat_id,
                _token: token
            },
            success: function(data) {
                $(".district").html('');
                $(".district").html(data.options);
                $(".extraFields").html('');
                $(".extraFields").html(data.fields)
            },
            error: function(data) {
                $(".district").html('');
                $(".district").html(data.options);;
            }
        });

    });

    $(".cat_id").each(function() {
        var cat_id = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "{{ route('Ajax_get_districts_fields_site') }}",
            method: 'POST',
            data: {
                cat_id: cat_id,
                _token: token
            },
            success: function(data) {
                $(".district").html('');
                $(".district").html(data.options);
                $(".extraFields").html('');
                $(".extraFields").html(data.fields);
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
                lat: 30.3593519,
                lng: 30.5327214000
            }
        });

        var MArkerPos = new google.maps.LatLng(30.3593519, 30.5327214000);
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