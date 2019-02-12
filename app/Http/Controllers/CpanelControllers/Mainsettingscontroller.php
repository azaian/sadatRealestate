<?php

namespace App\Http\Controllers\CpanelControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mainsettings;

class Mainsettingscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainsettingstoedit=Mainsettings::first();
        if (isset($mainsettingstoedit)) {
            return view('cpanel.mainsettings.edit', compact('mainsettingstoedit'));
        }
        $mainsettingstoedit= new Mainsettings();
        $mainsettingstoedit->save();
        $mainsettingstoedit=Mainsettings::first();
        return view('cpanel.mainsettings.edit', compact('mainsettingstoedit'));
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        // return $request->all();
        $mainsettingstoupdate=Mainsettings::find($id);
        $mainsettingstoupdate->mobilenumber=$request->mobilenumber;
        $mainsettingstoupdate->address=$request->address;
        $mainsettingstoupdate->email=$request->email;
        $mainsettingstoupdate->facebookurl=$request->facebookurl;
        $mainsettingstoupdate->twitterurl=$request->twitterurl;
        $mainsettingstoupdate->googleplusurl=$request->googleplusurl;
        $mainsettingstoupdate->video=$request->video;
        $mainsettingstoupdate->save();
        return redirect()->back()->with('success', 'تم تعديل الاعدادات العامه');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
