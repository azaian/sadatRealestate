@extends('layouts.site.index')
@section('title')
{{ $onenew->title }}
@endsection
@section('pagecontent')

<!-- Page Banner Start-->
<section class="page-banner padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="text-uppercase">{{ $onenew->title }}</h1>
            </div>
        </div>
    </div>
</section>
<!-- Page Banner End -->

<!-- News Details Start -->
<section id="news-section-1" class="news-section-details property-details padding_top rtl">
    <div class="container">

        <div class="row heading_space">

            <div class="col-md-8 pull-right">

                <div class="row">

                    <div class="news-1-box clearfix">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <img src="{{ url('assets/img/new',$onenew->image) }}" alt="image" class="img-responsive" />
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 top30">

                            <div class="news-details bottom10">
                                <span><i class="icon-eye"></i> {{ $onenew->view }}</span>
                            </div>
                            <p>{!! $onenew->description !!}.</p>
                        </div>
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
                                        اقل مساحه
                                        <input type="number" class="keyword-input" name="area[0]" placeholder="اقل مساحه">
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

                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="single-query form-group">
                                        اقل سعر
                                        <input type="number" class="keyword-input" name="price[0]" placeholder="اقل سعر">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="single-query form-group">
                                        اعلى سعر
                                        <input type="number" class="keyword-input" name="price[1]" placeholder="اعلى سعر">
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
                            <a href="{{ url('realestate/'.$lot->id) }}">{{ $lot->price }}</a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif


            </aside>

        </div>

    </div>
</section>
<!-- News Details End -->


@endsection