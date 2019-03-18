@extends('layouts.site.index')
@section('title')
كل النصائح العقاريه
@endsection

@section('pagecontent')




<!-- Page Banner Start-->
<section class="page-banner padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="text-uppercase">النصائح العقاريه</h1>
            </div>
        </div>
    </div>
</section>
<!-- Page Banner End -->



<!-- News Start -->
<section id="news-section-1" class="property-details padding_top">
    <div class="container property-details">
        <div class="row">
            <div class="col-md-8 pull-right">
                <div class="row">
                    @if (isset($allactiveadvices) && count($allactiveadvices))
                    @foreach ( $allactiveadvices as $oneadvice)

                    <div class="news-1-box clearfix">
                        <div class="col-md-5 col-sm-5 col-xs-12 pull-right">
                            <div class="image-2 ">
                                <a href="{{ route('getadvicepage',$oneadvice->id) }}">
                                    <img src="{{ url('assets/img/advice',$oneadvice->image) }}" alt="image" class="img-responsive" />
                                </a>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-12 padding-left-25 rtl">
                            <h3><a href="{{ route('getadvicepage',$oneadvice->id) }}">{{ $oneadvice->title }}</a></h3>
                            <div class="news-details padding-b-10 margin-t-5">
                                <span><i class="icon-eye"></i>{{ $oneadvice->view }}</span>
                            </div>
                            <p class="bottom20">{!!substr(strip_tags($oneadvice->description), 0, 200)!!}</p>
                            <div class="pro-3-link padding-t-20">
                                <a class="btn-more" href="{{ route('getadvicepage',$oneadvice->id) }}">
                                    <i><img alt="arrow" src="{{url('site/img/arrowlY.png')}}"></i><span>اعرض</span><i><img alt="arrow" src="{{url('site/img/arrowrY.png')}}"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    @endforeach
                    @endif

                </div>

                @if (isset($allactiveadvices) && count($allactiveadvices))
                <div class="row margin_bottom">
                    <div class="col-md-12">
                        <ul class="pager">
                            @for($i = 1; $i <= $allactiveadvices->lastPage(); $i++)
                                <li class="@if($i == $allactiveadvices->currentPage()) active @endif">
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
            <aside class="col-md-4 col-xs-12 rtl">
                <div class="property-query-area clearfix">
                    <div class="col-md-12">
                        <h3 class="text-uppercase bottom20 top15 rtl">بحث متقدم</h3>
                    </div>
                    <form class="callus rtl" method="post" action="{{route('listing')}}" style="color:#fff">
                        @csrf
                        <div class=" form-group col-md-6 col-sm-12 pull-right ">
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
                        <div class="col-md-6 form-groupcol-sm-12 pull-right ">
                            <div class="single-query  ">
                                المنطقه
                                <select name="district" class="district" style="background-color:#fff !important; ">
                                    <option value="">غير محدد</option>
                                </select>

                            </div>
                        </div>



                        <div class="col-sm-6  form-group pull-right" style="margin-bottom: 19px;">
                            <div class="single-query">
                                اقل سعر
                                <input type="number" class="keyword-input" name="price[0]" placeholder="اقل سعر">
                            </div>
                        </div>

                        <div class="col-sm-6  form-group pull-right" style="margin-bottom: 19px;">
                            <div class="single-query">
                                اعلى سعر
                                <input type="number" class="keyword-input" name="price[1]" placeholder="اعلى سعر">
                            </div>
                        </div>


                        <div class="col-sm-6 pull-right">
                            <div class="single-query form-group">
                                اقل المساحه
                                <input type="number" class="keyword-input" name="area[0]" placeholder="اقل مساحه">
                            </div>
                        </div>

                        <div class="col-sm-6 pull-right">
                            <div class="single-query form-group">
                                اكبر المساحه
                                <input type="number" class="keyword-input" name="area[1]" placeholder="اكبر مساحه">
                            </div>
                        </div>

                        <div class=" form-group col-md-6 col-sm-12 pull-right">
                            <div class="intro">
                                النوع
                                <select name="type">
                                    <option value="sale" class="active">بيع</option>
                                    <option value="rent">ايجار</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6 form-group">
                            <button type="submit" class=" btn-blue border_radius center-block" style="display:block !important">بحث</button>
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
<!-- News End -->




@endsection
