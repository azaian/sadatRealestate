@extends('layouts.site.index')
@section('title')
كل الاخبار العقاريه
@endsection

@section('pagecontent')



<!-- Page Banner Start-->
<section class="page-banner padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="text-uppercase">الاخبار العقاريه</h1>

            </div>
        </div>
    </div>
</section>
<!-- Page Banner End -->



<!-- Agent-Profile Start -->
<section id="news" class="news-section-details padding_bottom_half padding_top rtl">
    <div class="container">
        <div class="row">
            @if (isset($allactivenews) && count($allactivenews))
            @foreach ( $allactivenews as $onenew)
            <div class="col-md-4 col-sm-6 col-xs-12 heading_space pull-right">
                <div class="sim-lar-p">
                    <div class="image bottom20">
                        <img style="height:100%;width:100%;" src="{{url('assets/img/new',$onenew->image)}}" alt="Agents">
                    </div>
                    <div class="sim-lar-text">
                        <h3 class="bottom10"><a href="{{ route('getnewpage',$onenew->id) }}">{{ $onenew->title }}</a></h3>
                        <p><span><i class="icon-eye"></i>{{ $onenew->view }}</span></p>
                        <p class="bottom20">{!!str_limit(strip_tags($onenew->description, 200))!!}</p>
                        <a class="btn-more" href="{{ route('getnewpage',$onenew->id) }}">
                            <i><img alt="arrow" src="{{url('site/img/arrowlY.png')}}"></i><span>اعرض</span><i><img alt="arrow" src="{{url('site/img/arrowrY.png')}}"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
            @if (isset($allactivenews) && count($allactivenews))
            <div class="row margin_bottom">
                <div class="col-md-12">
                    <ul class="pager">
                        @for($i = 1; $i <= $allactivenews->lastPage(); $i++)
                            <li class="@if($i == $allactivenews->currentPage()) active @endif">
                                <a href="?page={{$i}}">
                                    {{$i}}
                                </a>
                            </li>
                            @endfor


                    </ul>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
<!-- Agent-Profile End -->

{{-- @if (isset($allactivenews) && count($allactivenews))
                <div class="row margin_bottom">
                   <div class="col-md-12">
                      <ul class="pager">
                        @for($i = 1; $i <= $allactivenews->lastPage(); $i++)
                          <li class="@if($i == $allactivenews->currentPage()) active @endif">
                              <a href="?page={{$i}}">
{{$i}}
</a>
</li>
@endfor
</ul>
</div>
</div>
@endif --}}


@endsection