@extends('layouts.cpanel.index')

@section('title')
category fields
@endsection
@section('realestates')
active
@endsection
@section('content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{url('admin/')}}">الرئيسيه</a>
            <span class="breadcrumb-item active">العقارات</span>
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
    @if (\Session::has('error'))
    <div class="alert alert-danger alert-bordered pd-y-20" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <div class="d-sm-flex align-items-center justify-content-start">
            <i class="icon ion-ios-checkmark alert-icon tx-52 mg-r-20 tx-danger"></i>
            <div class="mg-t-20 mg-sm-t-0">
                <h5 class="mg-b-2 tx-danger">خطأ</h5>
                <p class="mg-b-0 tx-gray">{{ \Session::get('error') }}</p>
            </div>
        </div><!-- d-flex -->
    </div>
    @php
    \Session::forget('error')
    @endphp
    @endif


    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">العقارات</h4>
    </div>


    <div class="br-pagebody">
        <div class="br-section-wrapper">

            <div class="row">
                <div class="col-md-2 col-xs-6">

                    <form class="" action="{{ route("getRs") }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="" style="display:block">ابحث بكود العقار</label>
                            <input class="" type="number" min=0 name="id" value="" required>
                            <input type="submit" name="submit" value="بحث">
                        </div>
                    </form>
                </div>
                <div class="col-md-1">

                </div>
                <div class="col-md-9 col-xs-12">

                    <form class="" action="{{ route("multiaction") }}" method="post">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="selected_RSs" value="" required hidden>

                                    تم اختيار كود العقارات التاليه للتعديل
                                    <input class="form-control" type="text" name="selected_RSsf" value="" disabled>
                                </div>
                            </div>
                            @csrf
                            <div class="col-md-4">
                                <div class="pull-left">
                                    <div class="row">

                                        <button class="btn rounded-circle btn-success btn-icon rounded-circle" type="submit" name="action" value="approvement">
                                            <div><i class="fa fa-bullhorn"></i></div>
                                        </button>

                                        <button class="btn  rounded-circle  btn-success btn-icon rounded-circle" type="submit" name="action" value="available">
                                            <div><i class="fa fa-thumbs-up"></i></div>
                                        </button>

                                        <button class="btn  rounded-circle  btn-success btn-icon rounded-circle" type="submit" name="action" value="catch">
                                            <div><i class="fa fa-star"></i></div>
                                        </button>

                                        {{-- <button class="btn btn-primary rounded-circle" type="submit" name="action" value="delete">
                                            <i class="fa fa-trash"></i>
                                        </button> --}}

                                    </div>
                                    <div class="row" style="margin-top:10px">

                                        <button class="btn  rounded-circle  btn-danger btn-icon rounded-circle" type="submit" name="action" value="unapprovement">
                                            <div><i class="fa fa-bullhorn"></i></div>
                                        </button>
                                        <button class="btn  rounded-circle  btn-danger btn-icon rounded-circle" type="submit" name="action" value="unavailable">
                                            <div><i class="fa fa-thumbs-down"></i></div>
                                        </button>

                                        <button class="btn  rounded-circle  btn-danger btn-icon rounded-circle" type="submit" name="action" value="uncatch">
                                            <div><i class="fa fa-star"></i></div>
                                        </button>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <hr>
            <hr>
            <div class="table-wrapper">

                <table id="slidertable" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-10p">كود</th>
                            <th class="wd-20p">العنوان</th>
                            <th class="wd-5p">الفئه</th>
                            <th class="wd-10p">الاسم</th>
                            <th class="wd-5p">رقم الهاتف</th>
                            <th class="wd-20p">ملاحظات</th>
                            <th class="wd-30p" ></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($realEstates) && count($realEstates)>0 && isset($realEstates[0]->id))
                        @foreach($realEstates as $realEstate)
                        <tr>
                            <td>
                                <input type="checkbox" name="selected_rs" value="{{ $realEstate->id }}">
                                <a href="{{route('realEstate', $realEstate->id )}}">{{ $realEstate->id }}</a>
                            </td>
                            <td>{{$realEstate->title}}</td>
                            <td>{{$realEstate->category()->name}}</td>
                            <td>{{$realEstate->name}}</td>
                            <td>{{$realEstate->phone_no}}</td>
                            <td>{{$realEstate->adminnote}}</td>
                            <td>
                                <a href="{{ route('realestates.edit',$realEstate->id) }}" class="btn btn-primary btn-icon rounded-circle">
                                    <div><i class="fa fa-edit"></i></div>
                                </a>

                                @if ($realEstate->approvement == 1)
                                <a href="{{ route('realestates.changeFlagStatus',[$realEstate->id,'approvement']) }}" class="btn btn-success btn-icon rounded-circle">
                                    <div><i class="fa fa-bullhorn"></i></div>
                                </a>
                                @else
                                <a href="{{ route('realestates.changeFlagStatus',[$realEstate->id,"approvement"]) }}" class="btn btn-danger btn-icon rounded-circle">
                                    <div><i class="fa fa-bullhorn"></i></div>
                                </a>
                                @endif

                                @if ($realEstate->available == 1)
                                <a href="{{ route('realestates.changeFlagStatus',[$realEstate->id,'available']) }}" class="btn btn-success btn-icon rounded-circle">
                                    <div><i class="fa fa-thumbs-up"></i></div>
                                </a>
                                @else
                                <a href="{{ route('realestates.changeFlagStatus',[$realEstate->id,"available"]) }}" class="btn btn-danger btn-icon rounded-circle">
                                    <div><i class="fa fa-thumbs-down"></i></i></div>
                                </a>
                                @endif

                                @if ($realEstate->catch == 1)
                                <a href="{{ route('realestates.changeFlagStatus',[$realEstate->id,'catch']) }}" class="btn btn-success btn-icon rounded-circle">
                                    <div><i class="fa fa-star"></i></div>
                                </a>
                                @else
                                <a href="{{ route('realestates.changeFlagStatus',[$realEstate->id,"catch"]) }}" class="btn btn-danger btn-icon rounded-circle">
                                    <div><i class="fa fa-star"></i></div>
                                </a>
                                @endif

                                @if (!empty($realEstate->messages()->toArray()))
                                <a href="{{ route('contactus.show',$realEstate->id) }}" class="btn btn-success btn-icon rounded-circle">
                                    <div><i class="fa fa-envelope "></i></div>
                                </a>
                                @endif


                                <form class="pull-left" method="post" action="{{ route('realestates.destroy',$realEstate->id) }}">
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
            </div><!-- table-wrapper -->
            @if ($realEstates instanceof \Illuminate\Pagination\LengthAwarePaginator)
            {{$realEstates->links()}}
            @endif
        </div><!-- br-section-wrapper -->
    </div><!-- br-pagebody -->

</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

@endsection

@section('extraJS')
<script type="text/javascript">
    $(document).ready(function() {
        $("input[type=checkbox]").click(function() {
            var favorite = [];
            $.each($("input[name='selected_rs']:checked"), function() {
                favorite.push($(this).val());
            });
            $("input[name=selected_RSs]").val(favorite.join(","));
            $("input[name=selected_RSsf]").val(favorite.join(","));
            // alert("My favourite sports are: " + favorite.join(","));
        });
    });
</script>
@endsection
