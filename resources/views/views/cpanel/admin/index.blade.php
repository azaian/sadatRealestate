@extends('layouts.cpanel.index')

@section('title')
كل المديرين
@endsection
@section('admins')
active
@endsection
@section('content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
  <div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="{{url('admin/')}}">الرئيسيه</a>
      <span class="breadcrumb-item active">كل المديرين</span>
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
@elseif (\Session::has('error'))
<div class="alert alert-danger alert-bordered pd-y-20" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
  <div class="d-sm-flex align-items-center justify-content-start">
    <i class="icon ion-ios-checkmark alert-icon tx-52 mg-r-20 tx-danger"></i>
    <div class="mg-t-20 mg-sm-t-0">
      <h5 class="mg-b-2 tx-danger">خطا.</h5>
      <p class="mg-b-0 tx-gray">{{ \Session::get('error') }}</p>
    </div>
  </div><!-- d-flex -->
</div>

  @endif



  <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
    <h4 class="tx-gray-800 mg-b-5">الجدول</h4>
  </div>




  <div class="br-pagebody">

    <div class="br-section-wrapper">

      <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">اضافه بيانات مدير جديد </h6>


      <form class="" action="{{ route('admins.store') }}" method="post">
        @csrf
        <div class="row mg-b-25">
          <div class="col-3">
            <input class="form-control" placeholder="الاسم" type=" text" name="name">
          </div><!-- col -->
          <div class="col-3">
            <input class="form-control" placeholder="البريد الالكترونى" type="email" name="email">
          </div><!-- col -->
          <div class="col-3">
            <input class="form-control" placeholder="الرقم السرى" type="password" name="password">
          </div><!-- col -->
          <div class="col-3">
            <input class="form-control" placeholder="الرقم السرى" type="password" name="password_confirmation">
          </div><!-- col -->
        </div>
        <div class="row" style="float:right">
          <div class="form-layout-footer">
            <button class="btn btn-primary" type="submit">اضافه</button>
          </div>
        </div>
    </div>
    <div class="row mg-b-25">
      <div class="col-lg"></div>
    </div><!-- row -->



    </form>

  </div><!-- br-section-wrapper -->




  <div class="br-section-wrapper">
    <div class="table-wrapper">
      <table id="slidertable" class="table display responsive nowrap">
        <thead>
          <tr>
            <th class="wd-5p">الاسم</th>
            <th class="wd-5p">البريد الالكترونى</th>
            <th class="wd-5p">الصفه</th>
            <th class="wd-20p">الاجراء</th>
          </tr>
        </thead>
        <tbody>
          @if(isset($alladmins) && count($alladmins)>0)
          @foreach($alladmins as $oneadmin)
          <tr>
            <td>{{$oneadmin->name}}</td>
            <td>{{$oneadmin->email}}</td>
            @if ($oneadmin->superadmin == 1)
              <td>مدير عام</td>
              <td>
                <a href="{{ route('admins.edit',$oneadmin->id) }}" class="btn btn-danger btn-icon rounded-circle mg-r-5">
                  <div><i class="fa fa-edit"></i></div></a>
              </td>            @else
              <td>مدير</td>
              <td>
                <a href="{{ route('admins.edit',$oneadmin->id) }}" class="btn btn-primary btn-icon rounded-circle mg-r-5">
                  <div><i class="fa fa-edit"></i></div></a>
              </td>

            @endif

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
