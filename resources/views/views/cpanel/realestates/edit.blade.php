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
            <a class="breadcrumb-item" href="{{url('admin/')}}">Home Page</a>
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

            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Real estates</h6>


            <form class="" action="{{ route('realestates.update',$realEstate->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mg-b-25">

                    <div class="col-lg">
                        <input class="form-control" placeholder="الاسم" type="text" name="name" @if(isset($realEstate))
                        value="{{$realEstate->name}}"
                        @endif
                        required>
                    </div><!-- col -->
                </div>

                <div class="row mg-b-25">

                    <div class="col-lg">
                        <input class="form-control" placeholder="رقم الهاتف" type="text" name="phone_no" @if(isset($realEstate))
                        value="{{$realEstate->phone_no}}"
                        @endif
                        required>
                    </div><!-- col -->
                </div>

                <div class="row mg-b-25">
                    <div class="col-lg">
                        <input class="form-control" placeholder="رقم الوتساب" type="text" name="whatsapp_no" @if(isset($realEstate))
                        value="{{$realEstate->whatsapp_no}}"
                        @endif
                        required>
                    </div><!-- col -->
                </div>

                <div class="row mg-b-25">
                    <div class="col-lg">
                        <input class="form-control" placeholder="title" maxlength="50" type="text" name="title" @if(isset($realEstate))
                        value="{{ $realEstate->title }}"
                        @endif
                        required>
                    </div>
                </div>

                <div class="row mg-b-25">
                    <div class="col-lg">
                        <input class="form-control" placeholder="email" type="email" name="email" @if(isset($realEstate))
                        value="{{ $realEstate->email}}"
                        @endif
                        >
                    </div>
                </div>

                <div class="row mg-b-25">
                    <div class="col-lg">
                        <select class="form-control" name="type">
                            <option value="sale" @if ($realEstate->type=="sale")
                            selected="selected"
                            @endif
                            >بيع</option>
                            <option value="rent" @if ($realEstate->type=="rent")
                            selected="selected"
                            @endif >اجار</option>
                        </select>
                    </div>
                </div>

                <div class="row mg-b-25">
                    <div class="col-lg">
                        categories
                        <select class="form-control cat_id" name="cat_id" required>
                            <option disabled value="غير محدد">غير محدد</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($category->id==$realEstate->cat_id)
                            selected="selected"
                            @endif
                            >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mg-b-25">
                    <div class="col-lg">
                        districts
                        <select class="form-control" name="district">
                            <option value="">غير محدد</option>
                            @foreach ($realEstate->category()->categorydistricts() as $district)
                            <option value="{{ $district->id }}" @if ($district->id==$realEstate->district)
                            selected="selected"
                            @endif
                            >{{ $district->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mg-b-25">
                    <div class="col-lg">
                        <input class="form-control" placeholder="real estate address" type="text" name="rs_address" @if(isset($realEstate->rs_address))
                        value="{{ $realEstate->rs_address }}"
                        @endif
                        >
                    </div>

                </div>

                <div class="row mg-b-25">
                    <div class="col-lg">
                        <input class="form-control" placeholder="area" type="number" min="0" name="area" @if(isset($realEstate->area))
                        value="{{ $realEstate->area }}"
                        @endif
                        required>
                    </div>
                </div>

                <div class="row mg-b-25">
                    <div class="col-lg">
                        <input class="form-control" placeholder="price" type="number" min="0" name="price" @if(isset($realEstate->price))
                        value="{{ $realEstate->price }}"
                        @endif
                        required>
                    </div>
                </div>

                <div class="row mg-b-25">
                    <div class="col-lg">
                        <select class="form-control" name="negotiable ">
                            <option value=1 @if(isset($realEstate->negotiable))
                                @if ($realEstate->negotiable==1)
                                selected="selected"
                                @endif
                                @endif
                                >نعم</option>
                            <option value=0 @if(isset($realEstate->negotiable))
                                @if ($realEstate->negotiable==0)
                                selected="selected"
                                @endif
                                @endif
                                >لا</option>
                        </select>
                    </div>
                </div>

                <div class="row mg-b-25">
                    <div class="col-lg">
                        <textarea class="form-control" name="details" placeholder="تفاصيل عن الاعلان" rows="8" cols="80" required>@if(isset($realEstate->details)){{ $realEstate->details }}@endif</textarea>
                    </div><!-- col -->

                </div>


                {{-- extra fileds --}}
                <div class="extraFields">

                    @foreach ($realEstate->category()->categoryfeilds() as $field)
                    <div class="row mg-b-25">
                        <div class="col-lg">
                            {{ $field->fieldname }}
                            <input class="form-control" placeholder="" type="text" name="extrafields[{{ $field->id }}]" @if(isset($field->Data($realEstate->id)->value))
                            value="{{$field->Data($realEstate->id)->value}}"
                            @endif
                            >
                        </div>
                    </div>

                    @endforeach
                </div>


                <div class="row mg-b-25">
                    <div class="col-lg">
                        <input class="form-control" placeholder="video url" type="text" name="videourl" @if(isset($realEstate->videourl))
                        value="{{$realEstate->videourl }}"
                        @endif
                        >
                    </div>
                </div>

                <div class="row mg-b-25">
                    main image
                    <div class="col-lg">
                        <input class="form-control" placeholder="image" type="file" name="main_pic">
                    </div>
                </div>

                <div class="row mg-b-25">
                    extra images
                    <div class="col-lg">
                        <input class="form-control" placeholder="image" type="file" name="images[]" multiple>
                    </div>
                </div>

                {{-- map part  --}}
                <div class="form-group">
                    <input type="hidden" required class="form-control" name="lat" @if(isset($realEstate->lat))
                    value="{{$realEstate->lat }}"
                    @endif
                    id="shoplatedi" placeholder="Enter lat ">
                </div>

                <div class="form-group">
                    <input type="hidden" required class="form-control" name="lng" @if(isset($realEstate->lng))
                    value="{{$realEstate->lng }}"
                    @endif
                    id="shoplngedi" placeholder="Enter long">
                </div>
                <div class="form-group">

                    <label class="col-md-3 col-xs-12 control-label">{{__('trans.SearchByAddress')}}</label>
                    <div class="col-md-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                            <input type="text" class="form-control" id="autocomplete" placeholder="{{__('trans.SearchByAddress')}}" review>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">{{__('trans.LocationOnMap')}}</label>
                    <div id="shoplocationedit" style="width:100%;height:350px"></div>
                </div>

                <div class="row mg-b-25">
                    <div class="col-lg">
                        <textarea class="form-control" name="adminnote" placeholder="تفاصيل عن الاعلان" rows="8" cols="80">@if(isset($realEstate->adminnote)){{ $realEstate->adminnote }}@endif</textarea>
                    </div><!-- col -->

                </div>

                <div class="row" style="float:right">
                    <div class="form-layout-footer">
                        <button class="btn btn-primary" type="submit">Update</button>
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
                lat: <?php if (isset($realEstate->lat)){echo $realEstate->lat;}?>,
                lng: <?php if (isset($realEstate->lng)){echo $realEstate->lng;}?>
            }
        });

        var MArkerPos = new google.maps.LatLng(
            <?php if (isset($realEstate->lat)){echo $realEstate->lat;}?>,
            <?php if (isset($realEstate->lat)){echo $realEstate->lat;}?>
        );
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