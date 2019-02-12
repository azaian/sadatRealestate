<?php

namespace App\Http\Controllers\CpanelControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Realestatecategory;
use App\Categoryfeild;

class categoryFeildsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $realestatecategories=Realestatecategory::all();
        $CategoryFeildsData=$this->getCategoryFeildsData($realestatecategories);
        return view('cpanel.categoryfeilds.index', compact('realestatecategories', 'CategoryFeildsData'));
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
        $newfield = new Categoryfeild();
        $newfield->cat_id = $request->category_id;
        $newfield->fieldname = $request->fieldname;
        $newfield->save();
        return redirect()->back()->with('success', 'data inserted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $realestatecategories=Realestatecategory::findOrFail($id);
        $CategoryFeildsData=$realestatecategories->categoryFeilds();

        return view('cpanel.categoryfeilds.edit', compact('realestatecategories', 'CategoryFeildsData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryField = Categoryfeild::findOrFail($id);
        return view('cpanel.categoryfeilds.editfield', compact('categoryField'));
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
        $categoryField = Categoryfeild::findOrFail($id);
        $categoryField->fieldname = $request->fieldname;
        $fieldName = $request->fieldname;
        $categoryField->save();
        return redirect()->route('categoryfeilds.show', $categoryField->category()->id)->with('success', 'data field '.$fieldName.'  successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo "destroy".$id;
        $categoryField = Categoryfeild::findOrFail($id);
        $fieldName = $categoryField->fieldname;
        $cat_id = $categoryField->category()->get()->toArray()[0]['id'];
        $categoryField->delete();
        return redirect()->route('categoryfeilds.show', $cat_id)->with('success', 'data field '.$fieldName.'  successfully deleted');
    }

    private function getCategoryFeildsData($caregories)
    {
        if (isset($caregories)) {
            $categoryFeildsData=null;
            foreach ($caregories as $cat) {
                $categoryFeildsData[$cat->id] = $cat->categoryFeilds();
            }
            return $categoryFeildsData;
        }
    }
}
