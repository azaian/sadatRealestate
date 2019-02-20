<?php

namespace App\Http\Controllers\CpanelControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Realestatecategory;

class RealestatecategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $realestatecategories = Realestatecategory::all();
        return view('cpanel.realestatecategory.index', compact('realestatecategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cpanel.realestatecategory.add');
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


        $newslider=new realestatecategory();
        $newslider->name=$request->name;
        $newslider->save();
        return redirect('admin/realestatecategory')->with('success', 'data inseret successfully');
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
        $realestatecategory=realestatecategory::find($id);
        return view('cpanel.realestatecategory.edit', compact('realestatecategory'));
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


        $realestatecategoryToupdate=realestatecategory::find($id);
        if ($realestatecategoryToupdate->name!=$request->name) {
            $realestatecategoryToupdate->name=$request->name;
            $realestatecategoryToupdate->save();
        }
        return redirect('admin/realestatecategory')->with('success', 'this data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $realestatecategory=realestatecategory::find($id);
        $realestatecategory->delete();
        return redirect()->back()->with('delete', 'data Deleted successfully');
    }

    public function changeactivationstatus($id)
    {
        $realestatecategory=realestatecategory::find($id);
        if ($realestatecategory->active == 0) {
            $realestatecategory->active=1;
        } else {
            $realestatecategory->active=0;
        }
        $realestatecategory->save();
        return redirect()->back()->with('success', 'status changed');
    }
}
