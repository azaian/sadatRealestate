<?php

namespace App\Http\Controllers\CpanelControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\District;
use App\Realestatecategory;
use App\Categoryfeild;

class DistrictsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $realestatecategories=Realestatecategory::all();
        $CategoryDistrict=$this->getCategoryDistrictData($realestatecategories);
        return view('cpanel.districts.index', compact('realestatecategories', 'CategoryDistrict'));
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
        $newDistrict = new District();
        $newDistrict->cat_id = $request->category_id;
        $newDistrict->name = $request->name;
        $newDistrict->save();
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
        $CategoryDistrictData=$realestatecategories->categorydistricts()->toArray();

        return view('cpanel.districts.edit', compact('realestatecategories', 'CategoryDistrictData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryDistrict = District::findOrFail($id);
        return view('cpanel.districts.editdistrict', compact('categoryDistrict'));
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
        $categoryDistrict = District::findOrFail($id);
        $categoryDistrict->name = $request->name;
        $districtName = $request->name;
        $categoryDistrict->save();
        return redirect()->route('districts.show', $categoryDistrict->category()->id)->with('success', 'data district '.$districtName.'  successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $CategoryDistrict = District::findOrFail($id);
        $districtName = $CategoryDistrict->name;
        $cat_id = $CategoryDistrict->category()->get()->toArray()[0]['id'];
        $CategoryDistrict->delete();
        return redirect()->route('districts.show', $cat_id)->with('success', 'district '.$districtName.'  successfully deleted');
    }






    private function getCategoryDistrictData($caregories)
    {
        $CategoryDistrictData=null;
        foreach ($caregories as $cat) {
            $CategoryDistrictData[$cat->id] = $cat->categorydistricts()->toArray();
        }
        return $CategoryDistrictData;
    }
}
