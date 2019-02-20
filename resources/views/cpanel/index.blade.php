@extends('layouts.cpanel.index')
@section('title')
  الرئيسيه
@endsection

@section('homepage')
    active
    @endsection
@section('content')

    <div class="br-mainpanel">
        <div class="pd-30">
            <h4 class="tx-gray-800 mg-b-5">لوحه التحكم</h4>
            <p class="mg-b-0">تمكنك فى تغير محتوى الموقع الالكترونى عن طريق اضافه او تعديل البيانات </p>
        </div><!-- d-flex -->

        <div class="br-pagebody mg-t-5 pd-x-30">
            <div class="row row-sm">
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-teal rounded overflow-hidden">
                        <div class="pd-25 d-flex align-items-center">
                            <i class="ion ion-images tx-60 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Slider</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{ $slidercount }}</p>
                                <span class="tx-11 tx-roboto tx-white-6">الصور المتحركه</span>
                            </div>
                        </div>
                    </div>
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
                    <div class="bg-danger rounded overflow-hidden">
                        <div class="pd-25 d-flex align-items-center">
                            <i class="ion ion-home tx-60 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">العقارات</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{ $realstatcount }}</p>
                                <span class="tx-11 tx-roboto tx-white-6">عدد العقارات</span>
                            </div>
                        </div>
                    </div>
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                    <div class="bg-primary rounded overflow-hidden">
                        <div class="pd-25 d-flex align-items-center">
                            <i class="ion ion-star tx-60 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">المشاريع</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{ $projectscount }}</p>
                                <span class="tx-11 tx-roboto tx-white-6">عدد المشاريع </span>
                            </div>
                        </div>
                    </div>
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                    <div class="bg-br-primary rounded overflow-hidden">
                        <div class="pd-25 d-flex align-items-center">
                            <i class="ion ion-bookmark tx-60 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">الاخبار العقاريه</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{ $newscount }}</p>
                                <span class="tx-11 tx-roboto tx-white-6">عدد الاخبار العقاريه</span>
                            </div>
                        </div>
                    </div>
                </div><!-- col-3 -->

            </div><!-- row -->
            <br>
            <div class="row row-sm">
              <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                  <div class="bg-success rounded overflow-hidden">
                      <div class="pd-25 d-flex align-items-center">
                          <i class="ion ion-bookmark tx-60 lh-0 tx-white op-7"></i>
                          <div class="mg-l-20">
                              <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">النصائح العقاريه</p>
                              <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{ $advicecount }}</p>
                              <span class="tx-11 tx-roboto tx-white-6">عدد النصائح العقاريه</span>
                          </div>
                      </div>
                  </div>
              </div><!-- col-3 -->
            </div><!-- row -->

        </div><!-- br-pagebody -->

    </div><!-- br-mainpanel -->
    @endsection
