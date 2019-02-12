@extends('layouts.site.index')
@section('title')
{{ $project->title }}
@endsection

@section('pagecontent')
<!-- Page Banner Start-->
<section class="page-banner padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="text-uppercase">{{ $project->title }}</h1>
            </div>
        </div>
    </div>
</section>
<!-- Page Banner End -->


<!-- Agent Profile -->
<section id="agents" class="padding_bottom_half padding_top">
    <div class="container">
        <div class="row">
            <div class="col-md-8 listing1 pull-right">
                <div class="row ">
                    <div class="col-sm-12 bottom40">
                        <div class="agent_wrap">
                            <div class="image">
                                <img style="width:100%;height:100%" src="{{ url('assets/img/project',$project->image) }}" alt="Agents">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 bottom40">
                        <div class="agent_wrap rtl">
                            <h3>{{ $project->title }}</h3>
                            <p class="bottom30">{!! htmlspecialchars_decode($project->description) !!}</p>
                            <table class="agent_contact table">
                                <tbody>
                                    <tr class="bottom10">
                                        <td><strong>العنوان:</strong></td>
                                        <td class="text-right">{{ $project->address }}</td>
                                    </tr>
                                    <tr class="bottom10">
                                        <td><strong>السعر:</strong></td>
                                        <td class="text-right">{{ $project->price }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>المساحه</strong></td>
                                        <td class="text-right">{{ $project->area }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>عدد المشاهدات:</strong></td>
                                        <td class="text-right">{{ $project->view }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div style="border-bottom:1px solid #d3d8dd;" class="bottom15"></div>

                        </div>
                    </div>
                </div>
            </div>
            <aside class="col-md-4 col-xs-12">

                <div class="row">
                    <div class="col-md-12">
                        <h3 class="bottom40 margin40 rtl">مشاريع متعلقه </h3>
                    </div>
                </div>

                @if (isset($allprojectsinoneprojectcategory) && count($allprojectsinoneprojectcategory) > 0)
                @foreach ($allprojectsinoneprojectcategory as $oneproject)
                <div class="row bottom20">
                    <div class="col-md-4 col-sm-4 col-xs-6 p-image pull-right">
                        <img style="height:100%;width:100%" src="{{ url('assets/img/project',$oneproject->image) }}" alt="image" />
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-6 rtl pull-right">
                        <div class="feature-p-text ">
                            <h4>{{ $oneproject->title }}</h4>
                            <p class="bottom15">{{ $oneproject->address }}</p>
                            <a href="{{ route('getprojectpage',$oneproject->id) }}">{{ $oneproject->view }}</a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif

            </aside>
        </div>
    </div>
</section>
<!-- Agent Profile End -->
<section class="container">
    <div class="row">
        <div class="col-xs-12">

            <h2 class="text-uppercase bottom20 rtl">مكان المشروع على الخريطه</h2>
            <div class="row bottom40">
                <div class="col-md-12 bottom20">
                    <div class="property-list-map">
                        <div id="oneprojectmap" class="multiple-location-map" style="width:100%;height:430px;"></div>
                    </div>
                </div>


                <script>
                    var marker = null;

                    function initMap() {

                        var map = new google.maps.Map(document.getElementById('oneprojectmap'), {
                            zoom: 10,
                            center: {
                                lat: <?php echo $project->lat?>,
                                lng: <?php echo $project->lng?>,
                            }
                        });

                        var MaekerPos = new google.maps.LatLng(<?php echo $project->lat?>, <?php echo $project->lat?>);
                        marker = new google.maps.Marker({
                            position: MaekerPos,
                            map: map
                        });

                    }
                </script>
                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPN_XufKy-QTSCB68xFJlqtUjHQ8m6uUY&libraries=places&callback=initMap">
                </script>


            </div>
        </div>
    </div>
</section>


@endsection