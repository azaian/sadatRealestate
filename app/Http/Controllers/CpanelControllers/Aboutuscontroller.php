<?php

namespace App\Http\Controllers\CpanelControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Aboutus;

class Aboutuscontroller extends Controller
{

      /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */

    public function index()
    {
        $aboutusmessages = Aboutus::all();
        return view('cpanel.aboutus.index', compact('aboutusmessages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cpanel.aboutus.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();

        $newaboutusmessage=new Aboutus();
        $newaboutusmessage->title=$request->title;
        $newaboutusmessage->description=$request->description;
        $newaboutusmessage->save();
        return redirect()->back()->with('success', 'تم اضافه عنصر جديد');
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
        $aboutusmessagetoedit=Aboutus::find($id);
        return view('cpanel.aboutus.edit', compact('aboutusmessagetoedit'));
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

        $aboutusmessageToupdate=Aboutus::find($id);
        $aboutusmessageToupdate->title=$request->title;
        $aboutusmessageToupdate->description=$request->description;
        $aboutusmessageToupdate->save();
        return redirect()->back()->with('success', 'تم تعديل بيانات العنصر');
    }


    public function delete($id)
    {
        $aboutusmessage=Aboutus::find($id);
        $aboutusmessage->delete();
        return redirect()->back()->with('success', 'تم مسح العنصر بنجاح');
    }
}
