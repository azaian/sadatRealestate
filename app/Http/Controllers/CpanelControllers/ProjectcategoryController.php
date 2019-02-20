<?php

namespace App\Http\Controllers\CpanelControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Projectcategory;

class ProjectcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allprojectcategories=Projectcategory::paginate(5);
        return view('cpanel.projectcategory.index', compact('allprojectcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cpanel.projectcategory.add');
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

        $newrecorde=new Projectcategory();
        $newrecorde->title=$request->title;
        $newrecorde->save();
        return redirect()->back()->with('success', 'تم اضافه الفئه');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //  $oneprojectcategorydata=Projectcategory::find($id);
      //return view('cpanel.projectcategory.show',compact('$oneprojectcategorydata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oneprojectcategorytoedit=Projectcategory::find($id);
        return view('cpanel.projectcategory.edit', compact('oneprojectcategorytoedit'));
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
        $projectcategoryToupdate=Projectcategory::find($id);
        $projectcategoryToupdate->title=$request->title;

        $projectcategoryToupdate->save();
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
        $projectcategory=Projectcategory::find($id);
        $projectcategory->delete();
        return redirect()->back()->with('success', 'تم مسح البيانات');
    }

    public function changeactivationstatus($id)
    {
        $projectcategory=Projectcategory::find($id);
        if ($projectcategory->active == 0) {
            $projectcategory->active=1;
        } else {
            $projectcategory->active=0;
        }
        $projectcategory->save();
        return redirect()->back()->with('success', 'تم تغير حاله البيانات ');
    }
}
