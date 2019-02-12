@extends('layouts.cpanel.index')

@section('title')
category fields
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
            <span class="breadcrumb-item active">حقول اضافه للفئات</span>
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
        <h4 class="tx-gray-800 mg-b-5">حقول اضافه للفئات</h4>
    </div>


    <div class="br-pagebody">
        <div class="br-section-wrapper">

            <div class="table-wrapper">
                <table id="slidertable" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-5p">العنوان</th>
                            <th class="wd-5p">الحقول الاضافيه</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($realestatecategories) && count($realestatecategories)>0)
                        @foreach($realestatecategories as $onerealestate)
                        <tr>
                            <td>{{ $onerealestate->name }}</td>
                            <td>
                                <select class="" name="">
                                    @foreach ($CategoryFeildsData[$onerealestate->id] as $field)
                                    <option value="">{{ $field['fieldname']  }}</option>
                                    @endforeach
                                </select>
                                <a href="{{ route('categoryfeilds.show',$onerealestate->id) }}" class="btn btn-primary btn-icon rounded-circle mg-r-5">
                                    <div><i class="fa fa-edit"></i></div>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- br-section-wrapper -->
    </div><!-- br-pagebody -->

</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
@endsection
