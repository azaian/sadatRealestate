@extends('layouts.site.index')
@section('title')
كل المشاريع
@endsection

@section('pagecontent')






<!-- Page Banner Start-->
<section class="page-banner padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="text-uppercase">{{ $projectcategory->title }}</h1>
            </div>
        </div>
    </div>
</section>
<!-- Page Banner End -->





<!-- Agent Start -->
<section id="agents" class="padding_top padding_bottom_half">
    <div class="container">
        <div class="row">



            @if (isset($allprojectsinoneprojectcategory) && count($allprojectsinoneprojectcategory) > 0)
            @foreach ($allprojectsinoneprojectcategory as $oneproject)
            <div class="col-sm-4 text-center">
                <div class="agent_wrap">
                    <div class="image">
                        <img style="height:100%;width:100%;" src="{{url('assets/img/project',$oneproject->image)}}" alt="Agents">
                    </div>
                    <div class="agent_text">
                        <h3>{{ $oneproject->title }}</h3>
                        <p>{{ $oneproject->address }}</p>
                        <p class="bottom20">{{ strip_tags(substr($oneproject->description, 0, 100))}}</p>
                        <a class="btn-more" href="{{ route('getprojectpage',$oneproject->id) }}">
                            <i><img alt="arrow" src="{{url('site/img/arrowlY.png')}}"></i><span>اعرض</span><i><img alt="arrow" src="{{url('site/img/arrowrY.png')}}"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
<!-- Agent End -->



@endsection