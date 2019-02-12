@extends('layouts.site.index')
@section('title')
Home Page
@endsection

@section('pagecontent')

<!--Slider-->
@if (isset($slides)&&count($slides)>0)
<div class="rev_slider_wrapper">
    <div id="rev_slider_full" class="rev_slider" data-version="5.0">
        <ul>
            @foreach ($slides as $slide)
            <!-- SLIDE  -->
            <li data-transition="fade">
                <!-- MAIN IMAGE -->
                <img src="{{url('assets/img/slider/'.$slide->image)}}" alt="" data-bgposition="center center" data-bgfit="cover">
                <!-- LAYER NR. 1 -->
                <h1 class="tp-caption tp-resizeme uppercase" data-x="left" data-hoffset="15" data-y="275" data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
                  data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-mask_out="x:0;y:0;s:inherit;e:inherit;" data-start="500" data-splitin="none" data-splitout="none" style="z-index: 6;">{{ $slide->title }}
                </h1>
                <p class="tp-caption  tp-resizeme" data-x="left" data-hoffset="15" data-y="320" data-transform_idle="o:1;" data-transform_in="opacity:0;s:2000;e:Power3.easeInOut;" data-transform_out="opacity:0;s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-mask_out="x:0;y:0;s:inherit;e:inherit;" data-start="800">{{$slide->description }}
                </p>
                <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="15" data-y="400" data-width="full" data-transform_idle="o:1;" data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
                  data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-mask_out="x:0;y:0;s:inherit;e:inherit;" data-start="800">
                    <a href="{{route('getaboutuspage')}}" class="btn-blue border_radius uppercase active">عن الشركه</a>
                    <a href="{{route('getcontactuspage')}}" class="btn-white border_radius uppercase">تواصل معنا</a>
                </div>
            </li>
            @endforeach

        </ul>
    </div>
    <!-- END REVOLUTION SLIDER -->
</div>
@endif



<!--Advance Search-->
@include('layouts.site.search')
<!--Advance Search Ends-->


<!-- Property listing -->
<section id="property" class="padding index2 bg_light">
    <div class="container rtl">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="uppercase">العقارات</h2>
                <p class="heading_space">. </p>
                <br>
            </div>
        </div>


        @if (isset($realEstates)&&count($realEstates)>0)
        <div class="row">
            @foreach ($realEstates as $realEstate)
            <div class="col-sm-6 col-md-4 pull-right">
                <div class="property_item heading_space">
                    <div class="property_head @if ($realEstate->catch)
                        default_clr
                      @endif text-center">
                        @if ($realEstate->catch)
                        <img src="{{ url('site/images/favruite.png') }}" alt="property" class="start_tag">
                        @endif
                        <h3 class="captlize">
                            <?php echo str_limit($realEstate->title,50)?>
                            <div class="price clearfix">
                                <span class="tag" style="left:-15px; right:unset; bottom:unset;top:-10px; font-size:14px">
                                    @if ($realEstate->available)
                                    متاح
                                    @else
                                    تم البيع
                                    @endif
                                </span>
                            </div>
                        </h3>
                    </div>
                    <div class="image">
                        <a href="{{ url('realestate/'.$realEstate->id) }}"> <img src="{{ url('assets/img/realestate/'.$realEstate->main_pic)}}" alt="latest property" class="img-responsive" style="width:364px; height:254px;"></a>
                        <div class="price clearfix">
                            <span class="tag">
                                @if ($realEstate->type=='sale')
                                للبيع
                                @else
                                للايجار
                                @endif
                            </span>
                        </div>

                    </div>
                    <div class="proerty_content">
                        <div class="property_meta">
                            <span><i class="icon-select-an-objecto-tool"></i>{{ $realEstate->area }}
                                @if (isset($realEstate))
                                @if ($realEstate->category()->name == 'مزارع')
                                فدان
                                @else
                                متر
                                @endif</span>
                                @endif
                                <span><i class="icon-bed" style="display:none"></i>
                                    @if ($realEstate->available)
                                    متاح
                                    @else
                                    تم البيع
                                    @endif</span>
                                    <span><i class="icon-safety-shower"></i>{{ $realEstate->views }}</span>
                        </div>

                        <div class="favroute clearfix">
                            <p class="pull-md-right">{{ $realEstate->price }}
                                @if (isset($realEstate))

                                @if ($realEstate->category()->name== 'مزارع')
                                جنيه للفدان
                                @else
                                جنيه
                                @endif
                                @endif
                            </p>
                            {{-- <ul class="pull-right">
                                  <li><a href="javascript:void(0)"><i class="icon-like"></i></a></li>
                                  <li><a href="#two" class="share_expender" data-toggle="collapse"><i class="icon-share3"></i></a></li>
                              </ul> --}}
                        </div>
                        {{-- <div class="toggle_share collapse" id="two">
                              <ul>
                                  <li><a href="javascript:void(0)" class="facebook"><i class="icon-facebook-1"></i> Facebook</a></li>
                                  <li><a href="javascript:void(0)" class="twitter"><i class="icon-twitter-1"></i> Twitter</a></li>
                                  <li><a href="javascript:void(0)" class="vimo"><i class="icon-vimeo3"></i> Vimeo</a></li>
                              </ul>
                          </div> --}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                {{ $realEstates->links() }}
            </div>
        </div>
        @endif
    </div>
</section>
<!-- Property listing Ends -->




<!--Testinomials-->
<section id="testinomial" class="padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h2 class="uppercase">الارء العملاء</h2>
<p class="heading_space">. </p>
                <br>            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="testinomial-slider" class="owl-carousel">


                    @if (isset($testinomials) && count($testinomials)>0)
                    @foreach ($testinomials as $testinomial)
                    <div class="item">
                        <div class="testinomial_content text-center">
                            <h4 class="uppercase">{{$testinomial->name}}</h4>
                            <img src="/site/images/stars.png" alt="rating" class="bottom30">
                            <p>{{ $testinomial->description }}</p>
                        </div>
                    </div>
                    @endforeach
                    @endif

                </div>
            </div>
        </div>
        <div class="col-xs-12 text-center">
            <a href="javascript:void(0)" class="cd-see-all btn-white border_radius margin40"><i class="fa fa-th" aria-hidden="true"></i>عرض الكل</a>
        </div>
    </div>
</section>
<div class="cd-testimonials-all">
    <div class="cd-testimonials-all-wrapper">
        <ul>
            @if (isset($testinomials) && count($testinomials)>0)
            @foreach ($testinomials as $testinomial)
            <li class="cd-testimonials-item">
                <p>{{$testinomial->description}}</p>
                <div class="cd-author">
                    <ul class="cd-author-info">
                        <li>{{$testinomial->name}}</li>
                    </ul>
                </div>
            </li>
            @endforeach
            @endif
        </ul>
    </div>
    <!-- cd-testimonials-all-wrapper -->
    <a href="javascript:void(0)" class="close-btn">اغلاق</a>
</div>
<!--Testinomials Ends-->






<!--Agents-->
<section id="layouts" class="padding_top rtl">
    <div class="container">
        <div class="row">
            <div class="col-sm-7 margin_bottom pull-right">
                <h2 class="uppercase">اخر الاخبار</h2>
                <p class="heading_space"></p>
                @if (isset($news)&&count($news)>0)
                @foreach ($news as $new)

                <div class="media news_media">
                    <div class="media-right">
                        <a href="{{ route('getnewpage',$new->id) }}">
                            <img class="media-object border_radius" src="{{ url('assets/img/new/'.$new->image) }}" alt="Latest news" height="140" width="152">
                        </a>
                    </div>
                    <div class="media-body">
                        <h3><a href="{{ route('getnewpage',$new->id) }}">{{$new->title}}</a></h3>
                        <span class="bottom15"><i class="icon-clock4"></i>{{$new->created_at->toDateString()}}</span>
                        <p class="bottom15">{!! str_limit(strip_tags($new->description),340," ...") !!}
                        </p>
                        {{-- <a href="javascript:void(0)" class="btn-more">
                            <i><img src="images/arrowl.png" alt="arrow"></i>
                            <span>Contact Me</span>
                            <i><img src="images/arrowr.png" alt="arrow"></i>
                        </a> --}}
                    </div>
                </div>
                @endforeach
                @endif

            </div>
            <div class="col-sm-5  margin_bottom pull-right">
                <h2 class="uppercase">نصائح عقاريه </h2>
                <p class="heading_space"></p>
                @if (isset($advices)&&count($advices)>0)
                @foreach ($advices as $advice)

                <div class="media news_media">
                    <div class="media-right">
                        <a href="{{ route('getadvicepage',$advice->id) }}">
                            <img class="media-object border_radius" src="{{ url('assets/img/advice/'.$advice->image) }}" alt="Latest news" height="140" width="152">
                        </a>
                    </div>
                    <div class="media-body">
                        <h3><a href="{{ route('getnewpage',$advice->id) }}">{{$advice->title}}</a></h3>
                        <span class="bottom15"><i class="icon-clock4"></i>{{$advice->created_at->toDateString()}}</span>
                        <p class="bottom15">{!! str_limit(strip_tags($advice->description),120," ...") !!}
                        </p>
                        {{-- <a href="javascript:void(0)" class="btn-more">
                            <i><img src="images/arrowl.png" alt="arrow"></i>
                            <span>Contact Me</span>
                            <i><img src="images/arrowr.png" alt="arrow"></i>
                        </a> --}}
                    </div>
                </div>
                @endforeach
                @endif
            </div>


            {{--
            <div class="col-sm-4 margin_bottom">
                <h2 class="uppercase"> Our Agents</h2>
                <p class="heading_space">We have Properties in these Areas.</p>
                <div id="agent-slider" class="owl-carousel">
                    <div class="item">
                        <div class="image bottom15">
                            <img src="images/agent-slider1.jpg" alt="Our Agents" class="border_radius">
                        </div>
                        <div class="item-bottom">
                            <div class="row">
                                <div class="col-sm-5 bottom15">
                                    <h3>Jill Warren</h3>
                                    <small>sales executive</small>
                                </div>
                                <div class="col-sm-7 bottom15">
                                    <a href="#."><i class="icon-icons142"></i> jill
                                        @castle.com</a>
                                </div>
                            </div>
                            <p class="bottom15">orem ipsum dolor sit amet, consectetuer adipiscing tempor cum soluta nobis eleifend...</p>
                            <a class="uppercase btn-blue border_radius" href="#.">Contact me</a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="image bottom15">
                            <img src="images/agent-slider1.jpg" alt="Our Agents" class="border_radius">
                        </div>
                        <div class="item-bottom">
                            <div class="row">
                                <div class="col-sm-5 bottom15">
                                    <h3>Jill Warren</h3>
                                    <small>sales executive</small>
                                </div>
                                <div class="col-sm-7 bottom15">
                                    <a href="#."><i class="icon-icons142"></i>jill
                                        @castle.com</a>
                                </div>
                            </div>
                            <p class="bottom15">orem ipsum dolor sit amet, consectetuer adipiscing tempor cum soluta nobis eleifend...</p>
                            <a class="uppercase btn-blue border_radius" href="#.">Contact me</a>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <div style="border-bottom:1px solid #d3d8dd;"></div>
    </div>
</section>
<!--Agents Ends-->


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
                $(".district").html('');
                $(".district").html(data.options);
            },
            error: function(data) {
                $(".district").html('');
                $(".district").html(data.options);

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
                $(".district").html('');
                $(".district").html(data.options);

            },
            error: function(data) {
                $(".district").html('');
                $(".district").html(data.options);

            }
        });

    });
</script>
@endsection