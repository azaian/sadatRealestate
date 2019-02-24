@extends('layouts.cpanel.index')

@section('title')
Add New real estate
@endsection
@section('realestates')
active
@endsection
@section('content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{url('admin/')}}">الرئيسيه</a>
            <a class="breadcrumb-item" href="{{route('realestates.index')}}">العقارات</a>
            <span class="breadcrumb-item active">اضافه عقار</span>
        </nav>
    </div><!-- br-pageheader -->


    @if (\Session::has('success'))
    <div class="alert alert-success alert-bordered pd-y-20" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <div class="d-sm-flex align-items-center justify-content-start">
            <i class="icon ion-ios-checkmark alert-icon tx-52 mg-r-20 tx-success"></i>
            <div class="mg-t-20 mg-sm-t-0">
                <h5 class="mg-b-2 tx-success">Success.</h5>
                <p class="mg-b-0 tx-gray">{{ \Session::get('success') }}</p>
            </div>
        </div><!-- d-flex -->
    </div>
    @endif


    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">اضافه عقار</h4>
    </div>

    <div class="br-pagebody">
        <div class="br-section-wrapper">

            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">بيانات العقار</h6>


            <form class="" action="{{ route('realestates.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mg-b-25">
                    <div class="col-lg">
                        الاسم
                        <input class="form-control" placeholder="الاسم" type="text" name="name" required>
                    </div><!-- col -->
                </div>
                <div class="row mg-b-25">
                    <div class="col-lg">
                        رقم الهاتف
                        <input class="form-control" placeholder="رقم الهاتف" type="text" name="phone_no" required>
                    </div><!-- col -->
                </div>

                <div class="row mg-b-25">
                    <div class="col-lg">
                        رقم الوتساب
                        <input class="form-control" placeholder="رقم الوتساب" type="text" name="whatsapp_no" required>
                    </div><!-- col -->
                </div>

                <div class="row mg-b-25">
                    <div class="col-lg">
                        عنوان الاعلان
                        <input class="form-control" placeholder="عنوان الاعلان" type="text" name="title" maxlength="50" required>
                    </div><!-- col -->
                </div>
                الايميل
                <div class="row mg-b-25">
                    <div class="col-lg">
                        <input class="form-control" placeholder="email" type="email" name="email">
                    </div>
                </div>
                النوع
                <div class="row mg-b-25">
                    <div class="col-lg">
                        <select class="form-control" name="type">
                            <option value="sale">بيع</option>
                            <option value="rent">اجار</option>
                        </select>
                    </div>
                </div>

                <div class="row mg-b-25">
                    <div class="col-lg">
                        الفئه
                        <select class="form-control cat_id" name="cat_id" required>
                            <option value="" disabled>غير محدد</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mg-b-25">
                    <div class="col-lg">
                        المنطقه
                        <select class="form-control" name="district">
                            <option>غير محدد</option>
                        </select>
                    </div>
                </div>

                <div class="row mg-b-25">
                    <div class="col-lg">
                        عنوان العقار
                        <input class="form-control" placeholder="عنوان العقار" type="text" name="rs_address">
                    </div><!-- col -->
                </div>

                <div class="row mg-b-25">
                    <div class="col-lg">
                        المساحه
                        <input class="form-control" placeholder="area" type="number" min="0" name="area" required>
                    </div>
                </div>

                <div class="row mg-b-25">
                    <div class="col-lg">
                        السعر
                        <input class="form-control" placeholder="price" min="0" type="number" name="price" required>
                    </div>
                </div>

                <div class="row mg-b-25">
                    <div class="col-lg">
                        قابل للتفوض
                        <select class="form-control" name="negotiable ">
                            <option value="1">نعم</option>
                            <option value="0">لا</option>
                        </select>
                    </div>
                </div>

                <div class="row mg-b-25">
                    <div class="col-lg">
                        وصف الاعلان
                        <textarea class="form-control" name="details" placeholder="تفاصيل عن الاعلان" rows="8" cols="80" required></textarea>
                        <script>
                            CKEDITOR.replace('details' );
                        </script>
                    </div><!-- col -->

                </div>

                {{-- extra fileds --}}
                <div class="extraFields">

                </div>

                <div class="row mg-b-25">
                    <div class="col-lg">
                        رابط الفيديو
                        <input class="form-control" placeholder="video url" type="text" name="videourl">
                    </div>
                </div>

                <div class="row mg-b-25">
                    <div class="col-lg">
                        الصوره الرئيسيه
                        <input class="form-control" placeholder="image" type="file" name="main_pic" required>
                    </div>
                </div>

                <div class="row mg-b-25">
                    <div class="col-lg">
                        صور اضافيه
                        <input class="form-control" placeholder="image" type="file" name="images[]" multiple>
                    </div>
                </div>

                {{-- map part  --}}
                <div class="form-group">
                    <input type="hidden" required class="form-control" name="lat" value="" id="shoplatedi" placeholder="Enter lat ">
                </div>

                <div class="form-group">
                    <input type="hidden" required class="form-control" name="lng" value="" id="shoplngedi" placeholder="Enter long">
                </div>
                <div class="form-group">

                    <label class="col-md-3 col-xs-12 control-label">{{__('ابحث بالعنوان')}}</label>
                    <div class="col-md-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                            <input type="text" class="form-control" id="autocomplete" placeholder="{{__('ابحث بالعنوان')}}" review required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">{{__('ابحث على الخريطه')}}</label>
                    <div id="shoplocationedit" style="width:100%;height:350px"></div>
                </div>

                <div class="row mg-b-25">
                    <div class="col-lg">
                        ملاحظات
                        <textarea class="form-control" name="adminnote" placeholder="" rows="8" cols="80"></textarea>
                    </div><!-- col -->

                </div>

                <input class="form-control" placeholder="price" type="hidden" name="approvement" value="1" required>

                <div class="row" style="float:right">
                    <div class="form-layout-footer">
                        <button class="btn btn-primary" type="submit">اضافه</button>
                    </div>
                </div>

            </form>

        </div><!-- br-section-wrapper -->
    </div><!-- br-pagebody -->

</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

@endsection

@section('extraJS')
{{-- get extra fields and district --}}
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
                $("select[name='district'").html('');
                $("select[name='district'").html(data.options);
                $(".extraFields").html('');
                $(".extraFields").html(data.fields);
            },
            error: function(data) {
                $("select[name='district'").html('');
                $("select[name='district'").html(data.options);

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
                $("select[name='district'").html('');
                $("select[name='district'").html(data.options);
                $(".extraFields").html('');
                $(".extraFields").html(data.fields);
            },
            error: function(data) {
                $("select[name='district'").html('');
                $("select[name='district'").html(data.options);

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