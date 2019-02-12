@extends('layouts.cpanel.index')

@section('title')
    Contact Us Index
    @endsection
@section('contactus')
    active
    @endsection
    @section('content')

            <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="{{url('admin/')}}">الرئيسيه</a>
                <span class="breadcrumb-item active">تواصل معنا</span>
            </nav>
        </div><!-- br-pageheader -->



@if (\Session::has('delete'))
  <div class="alert alert-success alert-bordered pd-y-20" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="d-sm-flex align-items-center justify-content-start">
              <i class="icon ion-ios-checkmark alert-icon tx-52 mg-r-20 tx-success"></i>
              <div class="mg-t-20 mg-sm-t-0">
                <h5 class="mg-b-2 tx-success">تم.</h5>
                <p class="mg-b-0 tx-gray">{{ \Session::get('delete') }}</p>
              </div>
            </div><!-- d-flex -->
          </div>
@endif



        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">جدول الرسائل</h4>
        </div>




        <div class="br-pagebody">
            <div class="br-section-wrapper">
                {{-- <a href="{{ route('contactus.create') }}" class="btn btn-primary btn-with-icon">
                    <div class="ht-40 justify-content-between">
                        <span class="pd-x-15">Add New Slide</span>
                        <span class="icon wd-40"><i class="fa fa-plus"></i></span>
                    </div>
                </a> --}}
                <div class="table-wrapper">
                    <table id="slidertable" class="table display responsive nowrap">
                        <thead>
                        <tr>
                          <th class="wd-5p">الاسم</th>
                            <th class="wd-5p">رقم الهاتف</th>
                            <th class="wd-5p">البريد الالكترونى</th>
                            <th class="wd-500p">الرساله</th>
                            <th class="wd-20p">الاجرائات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($allContactusmessages) && count($allContactusmessages)>0)
                            @foreach($allContactusmessages as $onemessage)
                              <tr>
                                <td>{{ $onemessage->name }}</td>
                                <td>{{ $onemessage->mobilenumber }}</td>
                                <td>{{ $onemessage->email }}</td>
                                <td>{{ $onemessage->message }}</td>

                                <td>
                                  <a href="{{ route('contactus.delete',$onemessage->id) }}" class="btn btn-dark btn-icon rounded-circle mg-r-5">
                                    <div><i class="fa fa-trash"></i></div>
                                  </a>
                                </td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
                {{ $allContactusmessages->links() }}

            </div><!-- br-section-wrapper -->

        </div><!-- br-pagebody -->
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection
