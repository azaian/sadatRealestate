@extends('layouts.cpanel.index')

@section('title')
اضافه نصيحه جديده
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
            <span class="breadcrumb-item active">اضافه نصيحه جديده</span>
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
        <h4 class="tx-gray-800 mg-b-5">اضافه نصيحه جديده</h4>
    </div>




    <div class="br-pagebody">
        <div class="br-section-wrapper">

            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">بيانات النصيحه</h6>


            <form class="" action="{{ route('advice.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mg-b-25">
                    <div class="col-lg">
                        <input required class="form-control" placeholder="العنوان" type="text" name="title">
                    </div><!-- col -->
                </div>

                <div class="row mg-b-25">
                    <div class="col-lg">
                        {{-- <textarea class="form-control" placeholder="description" type="text" name="description[en]" id="summernote"></textarea> --}}
                        {{-- <textarea class="ckeditor" cols="80" id="editor1" name="editor1" rows="10"></textarea>   --}}
                        <textarea name="description" cols="80"> تفاصيل النصيحه العربيه</textarea>
                        <script>
                            CKEDITOR.replace('description' );
                        </script>
                    </div>

                </div>
                <div class="row mg-b-25">
                    <div class="col-lg">
                    </div>
                    <div class="col-lg">
                        <label class="custom-file" style="float: right;">
                            <input required id="file2" class="custom-file-input" required type="file" name="image">
                            <span class="custom-file-control custom-file-control-primary"></span>
                        </label>
                    </div><!-- col -->

                </div><!-- row -->

                <div class="row" style="float:right">
                    <div class="form-layout-footer">
                        <button class="btn btn-primary" type="submit">اضف</button>
                    </div>
                </div>

            </form>

        </div><!-- br-section-wrapper -->
    </div><!-- br-pagebody -->

</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
@endsection