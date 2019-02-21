<?php

namespace App\Http\Controllers\CpanelControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contactus;

class Contactuscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allContactusmessages=Contactus::latest()->whereRsId(-1)->paginate(10);
        // return $allContactusmessages;
        return view('cpanel.contactus.index', compact('allContactusmessages'));
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
        $allContactusmessages=Contactus::latest()->whereRsId($id)->paginate(10);
        return view('cpanel.contactus.index', compact('allContactusmessages'));
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
        //
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
    public function delete($id)
    {
        $message=Contactus::find($id);
        $message->delete();
        return redirect()->back()->with('delete', 'تم مسح العنصر بنجاح');
    }
}
