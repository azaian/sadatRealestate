@extends('layouts.cpanel.index')

@section('title')
  عرض النصيحه
    @endsection
@section('advice')
    active
    @endsection
    @section('content')

            <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
              <a class="breadcrumb-item" href="{{url('admin/')}}">الرئيسيه</a>
                <a class="breadcrumb-item" href="{{route('advice.index')}}">النصائح العقاريه</a>
                <span class="breadcrumb-item active">عرض النصيحه الواحده</span>
            </nav>
        </div><!-- br-pageheader -->



@if (\Session::has('success'))
  <div class="alert alert-success alert-bordered pd-y-20" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="d-sm-flex align-items-center justify-content-start">
              <i class="icon ion-ios-checkmark alert-icon tx-52 mg-r-20 tx-success"></i>
              <div class="mg-t-20 mg-sm-t-0">
                <h5 class="mg-b-2 tx-success">تم.</h5>
                <p class="mg-b-0 tx-gray">{{ \Session::get('success') }}</p>
              </div>
            </div><!-- d-flex -->
          </div>
@endif
      <div class="br-pagebody">
        <div class="br-section-wrapper">
          <h6 class="tx-inverse tx-uppercase tx-bold tx-14 mg-t-80 mg-b-5">عنوان النصيحه</h6>
          <p class="mg-b-25 mg-lg-b-50">{{ unserialize($oneadvicedata->title)['ar'] }}</p>
          <div class="pd-30 bd">
            <dl class="row">
              <dt class="col-sm-3 tx-inverse">وصف النصيحه</dt>
              <dd class="col-sm-9">
                <?php
                $aa =$oneadvicedata->description;
                echo htmlspecialchars_decode($aa);
                ?>
              </dd>
            </dl>
          </div>



          <h6 class="tx-inverse tx-uppercase tx-bold tx-14 mg-t-80 mg-b-5">title</h6>
          <p class="mg-b-25 mg-lg-b-50">{{ $oneadvicedata->title }}</p>
          <div class="pd-30 bd">
            <dl class="row">
              <dt class="col-sm-3 tx-inverse">description</dt>
              <dd class="col-sm-9">
                <?php
                $aa = $oneadvicedata->description;
                echo htmlspecialchars_decode($aa);
                ?>
              </dd>
            </dl>
          </div>

        </div><!-- br-section-wrapper -->
        <img style="height:100%;width:100%;"src="{{imagepath('assets/img/advice',$oneadvicedata->image)}}" alt="">

      </div><!-- br-pagebody -->
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection
