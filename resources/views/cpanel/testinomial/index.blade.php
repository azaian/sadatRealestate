@extends('layouts.cpanel.index')

@section('title')
category fields
@endsection
@section('testinomial')
active
@endsection
@section('content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{url('admin/')}}">الرئيسيه</a>
            <span class="breadcrumb-item active">مناطق الفئات</span>
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
        <h4 class="tx-gray-800 mg-b-5">مناطق </h4>
    </div>


    <div class="br-pagebody">
        <div class="br-section-wrapper">
            {{-- <a href="{{ route('testinomial.create') }}" class="btn btn-primary btn-with-icon">
            <div class="ht-40 justify-content-between">
                <span class="pd-x-15">اضافه</span>
                <span class="icon wd-40"><i class="fa fa-plus"></i></span>
            </div>
            </a> --}}
            <div class="table-wrapper">
                <table id="slidertable" class="table display responsive nowrap">
                    <thead>
                        <tr>

                            <th class="wd-5p">الكود</th>
                            <th class="wd-5p">الاسم</th>
                            <th class="wd-5p">الوصف</th>
                            <th class="wd-5p"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($testinomials) && count($testinomials)>0)
                        @foreach($testinomials as $testinomial)
                        <tr>
                            <td>{{$testinomial->id}}</td>
                            <td>{{$testinomial->name}}</td>
                            <td>{{$testinomial->description}}</td>
                            <td>
                                <a href="{{ route('testinomial.edit',$testinomial->id) }}" class="btn btn-primary btn-icon rounded-circle">
                                    <div><i class="fa fa-edit"></i></div>
                                </a>
                                <form class="pull-left" method="post" action="{{ route('testinomial.destroy',$testinomial->id) }}">
                                    @csrf
                                    <button class="btn btn-primary rounded-circle" type="submit">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <input type="hidden" name="_method" value="DELETE">
                                </form>
                            </td>

                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                <hr>
                <form class="" action="{{ route('testinomial.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10"> افاضه</h6>
                    <div class="row mg-b-25">
                        <div class="col-lg">
                            الاسم
                            <input class="form-control" placeholder="" type="text" name="name" required>
                        </div><!-- col -->

                    </div>
                    <div class="row mg-b-25">
                        <div class="col-lg">
                            الوصف
                            <textarea class="form-control" name="description" maxlength="190" rows="8" cols="80" required></textarea>
                        </div><!-- col -->
                    </div><!-- col -->
                    <div class="row" style="float:right">
                        <div class="form-layout-footer">
                            <button class="btn btn-primary" type="submit">اضاقه</button>
                        </div>
                    </div>


                </form>
            </div><!-- table-wrapper -->
        </div><!-- br-section-wrapper -->
    </div><!-- br-pagebody -->

</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
@endsection