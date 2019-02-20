@extends('layouts.cpanel.index')

@section('title')
تعديل بيانات المشروع
@endsection
@section('project')
active
@endsection
@section('content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{url('admin/')}}">الرئيسيه</a>
            <a class="breadcrumb-item" href="{{route('project.index')}}">المشاريع</a>
            <span class="breadcrumb-item active">تعديل بيانات المشروع</span>
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
                <h5 class="mg-b-2 tx-success">تم.</h5>
                <p class="mg-b-0 tx-gray">{{ \Session::get('success') }}</p>
            </div>
        </div><!-- d-flex -->
    </div>
    @endif



    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">تعديل بيانات المشروع</h4>
    </div>




    <div class="br-pagebody">
        <div class="br-section-wrapper">

            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">بيانات المشروع</h6>


            <form class="" action="{{ route('project.update',$oneProjecttoedit->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mg-b-25">
                    <div class="col-lg">
                        <input required class="form-control" placeholder="title" type="text" name="title" value="{{ $oneProjecttoedit->title }}">
                    </div>

                </div>

                <div class="row mg-b-25">
                    <div class="col-lg">
                        <textarea name="description" cols="80" required>
                            <?php
                              $aa =$oneProjecttoedit->description;
                              echo htmlspecialchars_decode($aa);
                              ?>
                            </textarea>
                        <script>
                            CKEDITOR.replace('description' );
                       </script>
                    </div>
                </div>

                <div class="row mg-b-25">

                    <div class="col-lg">
                        <input required class="form-control" require placeholder="العنوان" type="text" name="address" value="{{ $oneProjecttoedit->address}}">
                    </div><!-- col -->
                </div>
                <div class="row mg-b-25">
                    <div class="col-lg">
                        <input required class="form-control" require placeholder="السعر" type="text" name="price" value="{{ $oneProjecttoedit->price }}">
                    </div>
                    <div class="col-lg">
                        <input required class="form-control" require placeholder="المساحه" type="text" name="area" value="{{ $oneProjecttoedit->area }}">
                    </div><!-- col -->
                </div>
                <div class="row">
                    <div class="col-lg">
                        <select class="form-control select2" require name="projectcategory_id" required>
                            <option disabled>اختر فئه المشروع من هنا</option>
                            @if (isset($allprojectcategories) && count($allprojectcategories) > 0 )
                            @foreach ($allprojectcategories as $oneprojectcategory)
                            @if ($oneprojectcategory->id == $oneProjecttoedit->projectcategory_id)
                            <option selected value="{{ $oneprojectcategory->id }}">{{$oneprojectcategory->title}}</option>
                            @else
                            <option value="{{ $oneprojectcategory->id }}">{{$oneprojectcategory->title}}</option>
                            @endif
                            @endforeach
                            @endif
                        </select>
                    </div><!-- col-4 -->
                </div>

                <div class="row mg-b-25">
                    <input required type="hidden" required class="form-control" name="lat" value="{{ $oneProjecttoedit->lat }}" id="projectlatedi" placeholder="Enter lat ">
                    <input required type="hidden" required class="form-control" name="lng" value="{{ $oneProjecttoedit->lng }}" id="projectlngedi" placeholder="Enter long">
                </div>


                <div class="row mg-b-25">
                    <input required type="text" class="form-control" id="autocomplete" placeholder="ابحث بالمكان ">
                </div>
                <div class="row mg-b-25">
                    <div id="projectmapedi" style="width:100%;height:350px"></div>
                </div>


                <script>
                    var marker = null;
        var placeSearch, autocomplete;

        function initMap() {
            autocomplete =
                new google.maps.places.Autocomplete((document.getElementById('autocomplete')),
                    {types: ['geocode']});
            var map = new google.maps.Map(document.getElementById('projectmapedi'), {
                zoom: 7,
                center: {lat: <?php echo $oneProjecttoedit->lat;?>, lng: <?php echo $oneProjecttoedit->lng;?>, }
            });

            var MaekerPos = new google.maps.LatLng(<?php echo $oneProjecttoedit->lat;?>,<?php echo $oneProjecttoedit->lng;?>);
            marker = new google.maps.Marker({
                position: MaekerPos,
                map: map
            });
            autocomplete.addListener('place_changed', function(){
                placeMarkerAndPanTo(autocomplete.getPlace().geometry.location, map);
                document.getElementById("projectlatedi").value=autocomplete.getPlace().geometry.location.lat();
                document.getElementById("projectlngedi").value=autocomplete.getPlace().geometry.location.lng();
            });
            map.addListener('click', function(e) {
                placeMarkerAndPanTo(e.latLng, map);
                document.getElementById("projectlatedi").value=e.latLng.lat();
                document.getElementById("projectlngedi").value=e.latLng.lng();
            });
        }
        function placeMarkerAndPanTo(latLng, map) {
            map.setZoom(15);
            marker.setPosition(latLng);
            map.panTo(latLng);
        }
    </script>
                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPN_XufKy-QTSCB68xFJlqtUjHQ8m6uUY&libraries=places&callback=initMap">
                </script>









                <div class="row mg-b-25">
                    <div class="col-lg">
                    </div>
                    <div class="col-lg">
                        <label class="custom-file" style="float: right;">
                            <input id="file2" class="custom-file-input" type="file" name="image">
                            <span class="custom-file-control custom-file-control-primary"></span>
                        </label>
                    </div><!-- col -->

                </div><!-- row -->

                <div class="row" style="float:right">
                    <div class="form-layout-footer">
                        <button class="btn btn-primary" type="submit">تعديل</button>
                    </div>
                </div>

            </form>

        </div><!-- br-section-wrapper -->
    </div><!-- br-pagebody -->

</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
@endsection