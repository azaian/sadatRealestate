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
            <span class="breadcrumb-item active">اراء العملاء</span>
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



    <div class="br-pagebody">
        <div class="br-section-wrapper">

            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">اضافه و تعديل مناطق الفئات</h6>

            <form class="" action="{{ route('testinomial.update',$testinomial->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10"> تعديل</h6>
                <div class="row mg-b-25">
                    <div class="col-lg">
                        الاسم
                        <input class="form-control" placeholder="" type="text" value="{{$testinomial->name}}" name="name" required>
                    </div><!-- col -->

                </div>
                <div class="row mg-b-25">
                    <div class="col-lg">
                        الوصف
                        <textarea class="form-control" maxlength="190" name="description" rows="8" cols="80" required>{{$testinomial->description}}</textarea>
                    </div><!-- col -->
                </div><!-- col -->
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