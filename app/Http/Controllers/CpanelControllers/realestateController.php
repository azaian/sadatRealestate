<?php

namespace App\Http\Controllers\CpanelControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;

use App\Realestatecategory;
use App\Categoryfeild;
use App\Realestate;
use App\Rsextradata;
use App\Rsextrapicture;
use App\District;
use App\Contactus;

class RealestateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $realEstates = Realestate::latest()->whereApprovement(1)->paginate(20);
        return view('cpanel.realestates.index', compact('realEstates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Realestatecategory::all();
        return view('cpanel.realestates.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $realEstate = new Realestate();
        $tablecols=Schema::getColumnListing('realestates');
        foreach ($tablecols as $col) {
            if (isset($request[$col])) {
                if (is_array($request[$col])) {
                    $realEstate[$col]=serialize($request[$col]);
                } else {
                    $realEstate[$col]=$request[$col];
                }
            }
        }

        // upload main image
        $pathtoupload= public_path('assets/img/realestate');
        $realEstate->main_pic=uploadimage($request->main_pic, $pathtoupload);

        $realEstate->save();
        $RS_id=$realEstate->id;

        // store extra fields
        if (isset($request->extrafields)) {
            $this->storeExtraFeilds($request->extrafields, $RS_id);
        }

        if (isset($request->images)) {
            $this->storeExtraImages($request->images, $RS_id, $pathtoupload);
        }





        $message= "تم اضافه عقار جديد تحت عنوان <br> ".$realEstate->name;
        Sendmailwithaction($message);



        return redirect('admin/realestates')->with('success', 'data inseret successfully');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        if ($id == "waiting") {
            $realEstates = Realestate::latest()->whereApprovement(0)->paginate(20);
            return view('cpanel.realestates.index', compact('realEstates'));
        } elseif ($id== "msg") {
            $IDs= Contactus::latest()->where('rs_id', "!=", -1)->pluck('rs_id');
            $Ids=array();
            if (isset($IDs[0])) {
                $Ids=$IDs->toArray();
            }
            $realEstates = Realestate::latest()->whereIn("id", $Ids)->whereApprovement(1)->paginate(20);
            return view('cpanel.realestates.index', compact('realEstates'));
        }
    }

    public function getRs(Request $request)
    {
        $realEstates[] =  Realestate::find($request->id);
        if (empty($realEstates[0])) {
            redirect('admin/realestates')->with('error', 'الكود غير موجود');
        }

        return view('cpanel.realestates.index', compact('realEstates'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $realEstate = Realestate::findOrFail($id);
        $categories = Realestatecategory::all();
        //print_r($realEstate->extraFields()[0]->fieldName());
        return view('cpanel.realestates.edit', compact('realEstate', 'categories'));
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
        $realEstate = Realestate::findOrFail($id);
        $tablecols=Schema::getColumnListing('realestates');
        foreach ($tablecols as $col) {
            if (isset($request[$col])&&$col!="main_pic") {
                if (is_array($request[$col])) {
                    $realEstate[$col]=serialize($request[$col]);
                } else {
                    $realEstate[$col]=$request[$col];
                }
            }
        }

        // update main image
        if (isset($request->main_pic)) {
            $pathtoupload= public_path('assets/img/realestate');
            $fullpath = $pathtoupload."/".$realEstate->main_pic;
            deletefile($fullpath);
            $realEstate->main_pic=uploadimage($request->main_pic, $pathtoupload);
        }

        $realEstate->save();
        $RS_id=$realEstate->id;

        // update extra fields
        Rsextradata::where('rs_id', $RS_id)->delete();
        if (isset($request->extrafields)) {
            $this->storeExtraFeilds($request->extrafields, $RS_id);
        }

        if (isset($request->images)) {
            $pathtoupload= public_path('assets/img/realestate');
            $this->storeExtraImages($request->images, $RS_id, $pathtoupload);
        }
        return redirect('admin/realestates')->with('success', 'data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $realEstate = Realestate::findOrFail($id);
        $extradatas = Rsextradata::where('rs_id', $realEstate->id)->get();
        $extraimgs = Rsextrapicture::where('rs_id', $realEstate->id)->get();
        if (isset($extradatas)&&count($extradatas)>0) {
            foreach ($extradatas as $extradata) {
                $extradata->delete();
            }
        }

        if (isset($extraimgs)&&count($extraimgs)>0) {
            foreach ($extraimgs as $extraimg) {
                $fullpath =public_path('assets/img/realestate')."/".$extraimg->picturename;
                deletefile($fullpath);
                $extraimg->delete();
            }
        }

        $fullpath =public_path('assets/img/realestate')."/".$realEstate->main_pic;
        deletefile($fullpath);
        $realEstate->delete();

        return redirect('admin/realestates')->with('success', 'data deleted successfully');
    }


    // store extra fields
    private function storeExtraFeilds($extraFields, $RS_id)
    {
        foreach ($extraFields as $id => $value) {
            if (isset($value)) {
                $extradata= new Rsextradata();
                $extradata->rs_id=$RS_id;
                $extradata->cf_id=$id;
                if (is_array($value)) {
                    $extradata->value=$value;
                } else {
                    $extradata->value=$value;
                }
                $extradata->save();
            }
        }
    }

    private function storeExtraImages($images, $RS_id, $path)
    {
        $deletedimg = Rsextrapicture::where('rs_id', $RS_id)->get();
        Rsextrapicture::where('rs_id', $RS_id)->delete();

        if (isset($deletedimg)&&count($deletedimg)>0) {
            foreach ($deletedimg as $img) {
                $fullpath = $path."/".$img->picturename;
                deletefile($fullpath);
            }
        }

        if (is_array($images)) {
            foreach ($images as $image) {
                $img = new Rsextrapicture();
                $img->picturename=uploadimage($image, $path);
                $img->rs_id=$RS_id;
                $img->save();
            }
        }
    }

    public function Ajax_get_districts_fields(Request $request)
    {
        if ($request->ajax()) {
            $districts = District::where('cat_id', $request->cat_id)->get()->toArray();
            $fields = Categoryfeild::where('cat_id', $request->cat_id)->get()->toArray();

            $data = view('cpanel.districts.ajaxdistricts', compact('districts'))->render();
            $dataFields = view('cpanel.categoryfeilds.ajaxfields', compact('fields'))->render();

            return response()->json(['options'=>$data,'fields'=>$dataFields]);
        }
    }

    public function Ajax_get_districts_fields_edit(Request $request)
    {
        if ($request->ajax()) {
            $districts = District::where('cat_id', $request->cat_id)->get()->toArray();
            $fields = Categoryfeild::where('cat_id', $request->cat_id)->get()->toArray();
            if (isset($request->district_id)) {
                $district_id=$request->district_id;
                $data = view('cpanel.districts.ajaxdistricts', compact('districts', 'district_id'))->render();
            }
            $data = view('cpanel.districts.ajaxdistricts', compact('districts'))->render();
            $dataFields = view('cpanel.categoryfeilds.ajaxfields', compact('fields'))->render();

            return response()->json(['options'=>$data,'fields'=>$dataFields]);
        }
    }

    public function changeFlagStatus($id, $actionOn)
    {
        $realEstate = Realestate::findOrFail($id);
        if ($realEstate->$actionOn==1) {
            $realEstate->$actionOn=0;
        } else {
            $realEstate->$actionOn=1;
        }
        $realEstate->save();
        return redirect('admin/realestates')->with('success', 'toggled successfully');
    }
}
