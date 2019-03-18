@extends('layouts.site.index')
@section('title')
{{ $advice->title }}
@endsection
@section('custommetatags')
    <meta property="og:image" content="{{ url('assets/img/advice',$advice->image) }}" />

    <!-- Place this data between the <head> tags of your website -->
    <meta name="description" content="content" />

    <!-- Twitter Card data -->
    <meta name="twitter:card" value="summary">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{$advice->title}}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="http://sadatrealestate.com/realestate/public/getadvicepage/{{$advice->id}}" />
    <meta property="og:image" content="{{ url('assets/img/advice',$advice->image) }}" />
    <meta name="twitter:image" content="{{ url('assets/img/advice',$advice->image) }}">


    <meta property="og:description" content="content" />

@endsection

@section('pagecontent')

<!-- Page Banner Start-->
<section class="page-banner padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="text-uppercase">{{ $advice->title }}</h1>
            </div>
        </div>
    </div>
</section>
<!-- Page Banner End -->

<!-- News Details Start -->
<section id="news-section-1" class="news-section-details property-details padding_top">
    <div class="container">

        <div class="row heading_space">

            <div class="col-md-8 pull-right rtl">

                <div class="row">

                    <div class="news-1-box clearfix">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <img src="{{ url('assets/img/advice',$advice->image) }}" alt="image" class="img-responsive" />
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 top30">

                            <div class="news-details bottom10">
                                <span><i class="icon-eye"></i> {{ $advice->view }}</span>
                            </div>
                            <p>{!! htmlspecialchars_decode($advice->description) !!}.</p>
                            
                            <div class="social-networks">
                                <div class="social-icons-2">
                                  <span class="share-it">مشاركه النصيحه</span>
                                  <span><a onclick="share(`http://sadatrealestate.com/realestate/public/getadvicepage/{{$advice->id}}`)"><i class="fa fa-facebook" aria-hidden="true"></i> </a></span>
                                 
                                  
                                </div>
                              </div>
                            
                            
                            <a onclick="share(`http://sadatrealestate.com/realestate/public/getadvicepage/{{$advice->id}}`)">share</a>

                            <script>
                                function share(url) {
                                    FB.ui({
                                        method: 'share',
                                        hashtag: '#thisisahashtag',
                                        href: url,
                                        display:'popup'


                                        }, function(response){}
                                    );
                                }
                            </script>
                        </div>
                    </div>

                </div>
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
<!-- News Details End -->


@endsection
