<?php

namespace App\Http\Controllers\CpanelControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\Projectcategory;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allprojects=Project::paginate(5);
        return view('cpanel.project.index', compact('allprojects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allprojectcategories=Projectcategory::paginate(100);
        return view('cpanel.project.add', compact('allprojectcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pathtoupload= public_path('assets/img/project');

        $newproject=new Project();
        $newproject->title=$request->title;
        $newproject->description=$request->description;
        $newproject->price=$request->price;
        $newproject->area=$request->area;
        $newproject->address=$request->address;
        $newproject->lat=$request->lat;
        $newproject->lng=$request->lng;
        $newproject->projectcategory_id=$request->projectcategory_id;
        $newproject->Image=uploadimage($request->image, $pathtoupload);
        $newproject->save();
        return redirect()->back()->with('success', 'تم اضافه االمشروع');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $oneprojectdata=Project::find($id);
        return view('cpanel.project.show', compact('oneprojectdata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oneProjecttoedit=Project::find($id);
        $allprojectcategories=Projectcategory::paginate(5);
        return view('cpanel.project.edit', compact('oneProjecttoedit', 'allprojectcategories'));
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
        $pathtoupload= public_path('assets/img/project');

        $projecttoupdate=Project::find($id);
        $projecttoupdate->title=$request->title;
        $projecttoupdate->description=$request->description;
        $projecttoupdate->price=$request->price;
        $projecttoupdate->area=$request->area;
        $projecttoupdate->address=$request->address;
        $projecttoupdate->lat=$request->lat;
        $projecttoupdate->lng=$request->lng;
        $projecttoupdate->projectcategory_id=$request->projectcategory_id;
        if (isset($request->image)) {
            deletefile($pathtoupload."/".$projecttoupdate->image);
            $projecttoupdate->Image=uploadimage($request->image, $pathtoupload);
        }
        $projecttoupdate->save();
        return redirect()->back()->with('success', 'تم تعديل بيانات المشروع');
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
        $pathtoupload= public_path('assets/img/project');


        $Project=Project::find($id);
        deletefile($pathtoupload."/".$project->image);
        $Project->delete();
        return redirect()->back()->with('success', 'تم مسح البيانات');
    }

    public function changeactivationstatus($id)
    {
        $Project=Project::find($id);
        if ($Project->active == 0) {
            $Project->active=1;
        } else {
            $Project->active=0;
        }
        $Project->save();
        return redirect()->back()->with('success', 'تم تغير حاله البيانات ');
    }
}
