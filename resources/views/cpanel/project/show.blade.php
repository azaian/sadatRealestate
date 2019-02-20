@extends('layouts.cpanel.index')

@section('title')
عرض المشروع
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
            <span class="breadcrumb-item active">عرض مشروع واحد</span>
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
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="tx-inverse tx-uppercase tx-bold tx-14 mg-t-80 mg-b-5">عنوان المشروع</h6>
            <p class="mg-b-25 mg-lg-b-50">{{ $oneprojectdata->title}}</p>
            <div class="pd-30 bd">
                <dl class="row">
                    <dt class="col-sm-3 tx-inverse">وصف المشروع</dt>
                    <dd class="col-sm-9">
                        <?php
                $aa = $oneprojectdata->description;
                echo htmlspecialchars_decode($aa);
                ?>
                    </dd>
                    <dt class="col-sm-3 tx-inverse">العنوان</dt>
                    <dd class="col-sm-9">
                        {{$oneprojectdata->address}}
                    </dd>
                </dl>
            </div>


            <br>
            <br>
            <br>
            <div class="pd-30 bd">
                <dl class="row">
                    <dt class="col-sm-3 tx-inverse">المساحه</dt>
                    <dd class="col-sm-9">
                        {{$oneprojectdata->area}}
                    </dd>
                    <dt class="col-sm-3 tx-inverse">السعر</dt>
                    <dd class="col-sm-9">
                        {{$oneprojectdata->price}}
                    </dd>
                </dl>
            </div>


            <br>
            <br>
            <br>
            <br>

            <div class="row mg-b-25">
                <div id="projectmap" style="width:100%;height:350px"></div>
            </div>


            <script>
                var marker = null;

                function initMap() {

                    var map = new google.maps.Map(document.getElementById('projectmap'), {
                        zoom: 15,
                        center: {
                            lat: <?php echo $oneprojectdata->lat;?>,
                            lng: <?php echo $oneprojectdata->lng;?>,
                        }
                    });

                    var MaekerPos = new google.maps.LatLng(<?php echo $oneprojectdata->lat;?>, <?php echo $oneprojectdata->lng;?>);
                    marker = new google.maps.Marker({
                        position: MaekerPos,
                        map: map
                    });

                }
            </script>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPN_XufKy-QTSCB68xFJlqtUjHQ8m6uUY&libraries=places&callback=initMap">
            </script>




        </div><!-- br-section-wrapper -->

        <br>
        <br>
        <br>
        <br>

        <img style="height:100%;width:100%;" src="{{imagepath('assets/img/project',$oneprojectdata->image)}}" alt="">

    </div><!-- br-pagebody -->
</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
@endsection