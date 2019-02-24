@extends('layouts.cpanel.index')

@section('title')
جدول المشاريع
@endsection
@section('project')
active
@endsection
@section('content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{url('admin/')}}">الرئيسيه</a>
            <span class="breadcrumb-item active">المشاريع</span>
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
        <h4 class="tx-gray-800 mg-b-5">جدول المشاريع</h4>
    </div>




    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <a href="{{ route('project.create') }}" class="btn btn-primary btn-with-icon">
                <div class="ht-40 justify-content-between">
                    <span class="pd-x-15">اضافه مشروع جديد</span>
                    <span class="icon wd-40"><i class="fa fa-plus"></i></span>
                </div>
            </a>
            <div class="table-wrapper">
                <table id="slidertable" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-30p">العنوان</th>
                            <th class="wd-5p">السعر</th>
                            <th class="wd-5p">المساحه</th>
                            <th class="wd-20p">الصوره</th>
                            <th class="wd-40p">الاجرائات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($allprojects) && count($allprojects)>0)
                        @foreach($allprojects as $oneprojects)
                        <tr>
                            <td>{{$oneprojects->title}}</td>
                            <td>{{$oneprojects->price}}</td>
                            <td>{{$oneprojects->area}}</td>

                            <td>
                                <img style="height:100%;width:100%;" src="{{imagepath('assets/img/project',$oneprojects->image)}}" alt="">
                            </td>
                            <td>
                                <a href="{{ route('project.edit',$oneprojects->id) }}" class="btn btn-primary btn-icon rounded-circle mg-r-5">
                                    <div><i class="fa fa-edit"></i></div>
                                </a>
                                @if ($oneprojects->active == 1)
                                <a href="{{ route('project.changeactivationstatus',$oneprojects->id) }}" class="btn btn-danger btn-icon rounded-circle mg-r-5">
                                    <div><i class="fa fa-times"></i></div>
                                </a>
                                @else
                                <a href="{{ route('project.changeactivationstatus',$oneprojects->id) }}" class="btn btn-success btn-icon rounded-circle mg-r-5">
                                    <div><i class="fa fa-arrow-right"></i></div>
                                </a>
                                @endif
                                <a href="{{ route('project.delete',$oneprojects->id) }}" class="btn btn-dark btn-icon rounded-circle mg-r-5">
                                    <div><i class="fa fa-trash"></i></div>
                                </a>
                                <a href="{{ route('project.show',$oneprojects->id) }}" class="btn btn-success btn-icon rounded-circle mg-r-5">
                                    <div><i class="fa fa-arrow-right"></i></div>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @endif

                    </tbody>
                </table>
            </div><!-- table-wrapper -->
            {{ $allprojects->links() }}

        </div><!-- br-section-wrapper -->
    </div><!-- br-pagebody -->

</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
@endsection