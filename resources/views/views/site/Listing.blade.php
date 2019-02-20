@extends('layouts.site.index')
@section('title')
Home Page
@endsection

@section('pagecontent')

@include('layouts.site.search')

<!-- Property listing -->
<section id="property" class="padding index2 bg_light rtl">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="uppercase">عقارات</h2>
                <p class="heading_space"></p>
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
                                <span class="tag available-tag">
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
                        <a href="{{ url('realestate/'.$realEstate->id) }}"> <img src="{{ url('assets/img/realestate/'.$realEstate->main_pic)}}" alt="latest property" style="width:364px; height:254px;" class="img-responsive"></a>
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
                            <span>
                                {{ $realEstate->area }}
                                @if ($realEstate->category()->name== 'مزارع')
                                فدان
                                @else
                                متر
                                @endif
                                <i class="icon-select-an-objecto-tool"></i>
                            </span>
                            <span><i class="icon-bed" style="display:none"></i>
                                {{-- @if ($realEstate->available)
                                    متاح
                                    @else
                                    تم البيع
                                    @endif --}}
                            </span>
                            <span>
                                {{ $realEstate->views }}
                                <i class="fa fa-eye"></i>
                            </span>
                        </div>

                        <div class="favroute clearfix">
                            <p class="pull-md-right">{{ $realEstate->price }}
                                @if ($realEstate->category()->name== 'مزارع')
                                جنيه للفدان
                                @else
                                جنيه
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


        @if (isset($realEstates) && count($realEstates))
        <div class="row margin_bottom">
            <div class="col-md-12">
                <ul class="pager fix-pager">
                    <?php
                    $i=$realEstates->currentPage()-2;
                    $end=$realEstates->currentPage()+2;
                    if($i <= 0) {
                      $i=1;
                      $end=5;
                    }
                    ?>
                    @if ( $i > 1)
                    <li>
                        <a href="?page={{ $i-1 }}">
                            {{ "<<" }}
                        </a>
                    </li>
                    @endif
                    @for(; $i <= $end&&$i<=$realEstates->lastPage(); $i++)
                        <li class="@if($i == $realEstates->currentPage()) active @endif">
                            <a href="?page={{$i}}">
                                {{$i}}
                            </a>
                        </li>
                        @endfor
                        @if ( $i-1 < $realEstates->lastPage())
                            <li>
                                <a href="?page={{ $i }}">
                                    {{ ">>" }}
                                </a>
                            </li>
                            @endif
                </ul>
            </div>
        </div>
        @endif
        @endif
    </div>
</section>
<!-- Property listing Ends -->


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