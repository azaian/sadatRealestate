<?php

namespace App\Http\Controllers\CpanelControllers;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Slidercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $sliders = Slider::all();
        return view('cpanel.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cpanel.slider.add');
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
        $pathtoupload= public_path('assets/img/slider');

        $newslider=new Slider();
        $newslider->title=$request->title;
        $newslider->description=$request->description;
        $newslider->image=uploadimage($request->image, $pathtoupload);
        $newslider->save();
        return redirect()->back()->with('success', 'ام اضافه البيانات');
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
        $slide=Slider::find($id);
        return view('cpanel.slider.edit', compact('slide'));
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
        $pathtoupload= public_path('assets/img/slider');

        $sliderToupdate=Slider::find($id);
        $sliderToupdate->title=$request->title;
        $sliderToupdate->description=$request->description;
        if (isset($request->image)) {
            $sliderToupdate->image=uploadimage($request->image,$pathtoupload);
        }
        $sliderToupdate->save();
        return redirect()->back()->with('success', 'تم تعديل البيانات');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $pathtoupload= public_path('assets/img/slider');

        $slide=Slider::find($id);
        deletefile($pathtoupload."/".$slide->image);
        $slide->delete();
        return redirect()->back()->with('delete', 'تم مسح العنصر');
    }

    public function changeactivationstatus($id)
    {
        $slide=Slider::find($id);
        if ($slide->active == 0) {
            $slide->active=1;
        } else {
            $slide->active=0;
        }
        $slide->save();
        return redirect()->back()->with('success', 'تم تغير حاله العنصر');
    }
}
