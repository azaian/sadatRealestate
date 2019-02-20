@extends('layouts.site.index')
@section('title')
About us
@endsection

@section('pagecontent')





<!-- Page Banner Start-->
<section class="page-banner padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="p-white text-uppercase">عن الشركه</h1>

            </div>
        </div>
    </div>
</section>
<!-- Page Banner End -->



<!-- testimonials Start -->
<section id="testinomila_page" class="padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-uppercase heading_space rtl">عن الشركه</h2>
            </div>
        </div>
        <div id="testinomial-masonry" class="cbp">

            @if (isset($allaboutusmessages) && count($allaboutusmessages)>0)
            <?php $i=1;?>
            @foreach ($allaboutusmessages as $onemessage)
            <div class="cbp-item pull-right rtl">
                <div class="cbp-caption-defaultWrap">
                    <div class="testinomial_box">
                        <div class="testinomial_desc blue_dark  text-center">
                            <h4 class="text-uppercase heading_space"> {{ $onemessage->title }} :</h4>
                            <p>{!! $onemessage->description !!}.
                            </p>
                            {{-- <img src="images/quote.png" alt="quote" class="quote"> --}}
                        </div>
                        {{-- <div class="testinomial_author">
                <img src="images/testinomils.png" alt="testinomial" width="59">
                <h4 class="color">SAM NICHOLSON</h4>
                <span class="post_img">( NorthMarq Capital  )</span>
             </div> --}}
                    </div>
                </div>
            </div>
            <?php $i++;?>
            @endforeach
            @endif





        </div>
    </div>
</section>
<!-- testimonials End -->




@endsection