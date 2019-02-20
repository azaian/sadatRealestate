@extends('layouts.cpanel.index')

@section('title')
Update realestatecategory
@endsection
@section('categoryfeilds')
active
@endsection
@section('content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{url('admin/')}}">الرئيسيه</a>
            <a class="breadcrumb-item" href="{{route('categoryfeilds.index')}}">حقول اضافيه للفئات</a>
            <span class="breadcrumb-item active">تعديل حقل</span>
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
                <h5 class="mg-b-2 tx-success">Success.</h5>
                <p class="mg-b-0 tx-gray">{{ \Session::get('success') }}</p>
            </div>
        </div><!-- d-flex -->
    </div>
    @endif


    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">الفئه : {{ $categoryField->category()->name }} </h4>
    </div>


    <div class="br-pagebody">
        <div class="br-section-wrapper">

            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">الحقول الاضافيه</h6>

            <form class="" action="{{ route('categoryfeilds.update',$categoryField->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">تعديل الحقل</h6>
                <div class="row mg-b-25">

                    <div class="col-lg">
                        <input class="form-control" placeholder="الحقل الجديد" type="text" name="fieldname" value="{{ $categoryField->fieldname }}" required>
                    </div><!-- col -->
                    <div class="col-lg">
                    </div>

                </div>

                <div class="row" style="float:right">
                    <div class="form-layout-footer">
                        <button class="btn btn-primary" type="submit">تعديل</button>
                    </div>
                </div>


            </form>

        </div><!-- br-section-wrapper -->
    </div><!-- br-pagebody -->

</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
@endsection
