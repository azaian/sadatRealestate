<?php

namespace App\Http\Controllers\CpanelControllers;

use App\Advice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alladvices=Advice::paginate(5);
        return view('cpanel.advice.index', compact('alladvices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cpanel.advice.add');
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
        $pathtoupload= public_path('assets/img/advice');

        $newrecorde=new Advice();
        $newrecorde->title=$request->title;
        $newrecorde->description=$request->description;
        $newrecorde->image=uploadimage($request->image, $pathtoupload);

        $newrecorde->save();

        $message= "تم اضافه نصيحه عقاريه جديده تحت عنوان <br> ".$newrecorde->title;
        Sendmailwithaction($message);
        return redirect()->back()->with('success', 'تم اضافه النصيحه');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $oneadvicedata=Advice::find($id);
        return view('cpanel.advice.show', compact('oneadvicedata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oneadvicetoedit=Advice::find($id);
        return view('cpanel.advice.edit', compact('oneadvicetoedit'));
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
        $pathtoupload= public_path('assets/img/advice');

        $adviceToupdate=Advice::find($id);
        $adviceToupdate->title=$request->title;
        $adviceToupdate->description=$request->description;
        if (isset($request->image)) {
            $adviceToupdate->image=uploadimage($request->image, $pathtoupload);
        }
        $adviceToupdate->save();
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

        $advice=Advice::find($id);
        deletefile($pathtoupload."/".$advice->image);
        $advice->delete();
        return redirect()->back()->with('success', 'تم مسح البيانات');
    }

    public function changeactivationstatus($id)
    {
        $advice=Advice::find($id);
        if ($advice->active == 0) {
            $advice->active=1;
        } else {
            $advice->active=0;
        }
        $advice->save();
        return redirect()->back()->with('success', 'تم تغير حاله البيانات ');
    }
}
