@extends('layouts.cpanel.index')

@section('title')
Recycle Bin
@endsection
@section('recyclebin')
active
@endsection
@section('content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{url('admin/')}}">الرئيسيه</a>
            <span class="breadcrumb-item active">محذوفات</span>
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
            <div class="table-wrapper">
                <table id="slidertable" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-5p" style="width:1%">كود</th>
                            <th class="wd-5p">العنوان</th>
                            <th class="wd-5p" style="width:13%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($tarshedItems) && count($tarshedItems)>0)
                        @foreach($tarshedItems as $key=> $tarshedItem)
                        <tr>
                            <td>
                                @if (isset($tarshedItem->id))
                                {{$tarshedItem->id}}
                                @endif
                            </td>
                            <td>
                                @if (isset($tarshedItem->title))
                                {{$tarshedItem->title}}
                                @elseif (isset($tarshedItem->name))
                                {{$tarshedItem->name}}
                                @endif
                            </td>
                            <td>
                                <form class="pull-left" method="post" action="{{ route('recyclebin.destroy',$tarshedItem->id) }}">
                                    @csrf
                                    <button class="btn btn-primary rounded-circle mg-r-5" type="submit">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="model" value="{{$model}}">
                                </form>

                                <form class="pull-left" method="post" action="{{ route('recyclebin.update',$tarshedItem->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-success b rounded-circle mg-r-5" type="submit">
                                        <i class="fa fa-bullhorn"></i>
                                    </button>
                                    <input type="hidden" name="model" value="{{$model}}">
                                </form>
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