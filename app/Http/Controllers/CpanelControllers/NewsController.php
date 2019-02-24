<?php

namespace App\Http\Controllers\CpanelControllers;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allnews=News::paginate(5);
        return view('cpanel.new.index', compact('allnews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cpanel.new.add');
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
        $pathtoupload= public_path('assets/img/new');

        $newrecorde=new News();
        $newrecorde->title=$request->title;
        $newrecorde->description=$request->description;
        $newrecorde->image=uploadimage($request->image, $pathtoupload);

        $newrecorde->save();
        $message= "تم اضافه خبر جديد تحت عنوان <br> ".$request->title;
        Sendmailwithaction($message);
        return redirect()->back()->with('success', 'تم اضافه الخبر ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $onenewdata=News::find($id);
        return view('cpanel.new.show', compact('onenewdata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $onenewtoedit=News::find($id);
        return view('cpanel.new.edit', compact('onenewtoedit'));
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
        $pathtoupload= public_path('assets/img/new');

        $newToupdate=News::find($id);
        $newToupdate->title=$request->title;
        $newToupdate->description=$request->description;
        if (isset($request->image)) {
            $newToupdate->image=uploadimage($request->image, $pathtoupload);
        }
        $newToupdate->save();
        return redirect()->back()->with('success', 'تم تعديل البيانات');
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
        $pathtoupload= public_path('assets/img/new');

        $new=News::find($id);
        deletefile($pathtoupload."/".$new->image);
        $new->delete();
        return redirect()->back()->with('success', 'تم مسح البيانات');
    }

    public function changeactivationstatus($id)
    {
        $new=News::find($id);
        if ($new->active == 0) {
            $new->active=1;
        } else {
            $new->active=0;
        }
        $new->save();
        return redirect()->back()->with('success', 'تم تغير حاله البيانات ');
    }
}
