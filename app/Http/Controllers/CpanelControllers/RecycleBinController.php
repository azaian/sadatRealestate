<?php

namespace App\Http\Controllers\CpanelControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Realestate;
use App\Aboutus;
use App\Advice;
use App\News;
use App\Project;

class RecycleBinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($model)
    {
        $modelname = 'App\\'.$model;
        $tarshedItems = $modelname::onlyTrashed()->get();

        return view('cpanel.recyclebin.index', compact('tarshedItems', 'model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = 'App\\'.$request['model'];
        $restoredItem=$model::onlyTrashed($id)->where('id', $id)->restore();
        return redirect()->back()->with('success', 'تمت الاستعاده');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $model = 'App\\'.$request['model'];
        $restoredItem=$model::onlyTrashed($id)->where('id', $id)->forceDelete();
        return redirect()->back()->with('success', ' تم الحذف نهائيا');
    }
}
