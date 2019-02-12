@extends('layouts.cpanel.index')

@section('title')
Update Mainsettings
@endsection
@section('mainsettings')
active
@endsection
@section('content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{url('admin/')}}">Home Page</a>
            <span class="breadcrumb-item active">Update Mainsettings</span>
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



    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">الاعدادات العامه</h4>
    </div>




    <div class="br-pagebody">
        <div class="br-section-wrapper">

            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">البيانات</h6>


            <form class="" action="{{ route('mainsettings.update',$mainsettingstoedit->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mg-b-25">
                    <div class="col-lg">
                        الهاتف مفصوله (/) مثل 0100 / 0120
                        <input class="form-control" placeholder="mobilenumber" type="text" name="mobilenumber" value="{{$mainsettingstoedit->mobilenumber}}">
                    </div>
                    <div class="col-lg">
                        الايميل
                        <input class="form-control" placeholder="email" type="email" name="email" value="{{$mainsettingstoedit->email}}">
                    </div><!-- col -->
                </div>

                <div class="row mg-b-25">

                    <div class="col-lg">
                        عنوان الشركه
                        <input class="form-control" placeholder="العنوان" type="text" name="address" value="{{ $mainsettingstoedit->address}}">
                    </div><!-- col -->
                </div>
                <div class="row mg-b-25">
                    <div class="col-lg">
                        رابط الفيس بوك
                        <input class="form-control" placeholder="facebook url" type="text" name="facebookurl" value="{{$mainsettingstoedit->facebookurl }}">
                    </div>
                    <div class="col-lg">
                        رابط تويتر
                        <input class="form-control" placeholder="twitter url" type="text" name="twitterurl" value="{{$mainsettingstoedit->twitterurl }}">
                    </div><!-- col -->
                    <div class="col-lg">
                        رابط اليوتيوب
                        <input class="form-control" placeholder="youtube url" type="text" name="googleplusurl" value="{{$mainsettingstoedit->googleplusurl }}">
                    </div><!-- col -->
                </div>
                <div class="row mg-b-25">

                    <div class="col-lg">
                        رابط الفيديو الخاص بالشركه
                        <input class="form-control" placeholder="العنوان" type="text" name="video" value="{{ $mainsettingstoedit->video}}">
                    </div><!-- col -->
                </div>
                <div class="row" style="float:right">
                    <div class="form-layout-footer">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </div>

            </form>

        </div><!-- br-section-wrapper -->
    </div><!-- br-pagebody -->

</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
@endsection