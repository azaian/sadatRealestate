<?php

namespace App\Http\Controllers\SiteControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;

use App\Slider;
use App\News;
use App\Realestatecategory;
use App\Categoryfeild;
use App\Realestate;
use App\Rsextradata;
use App\Rsextrapicture;
use App\District;
use App\Advice;

class PagesController extends Controller
{
    public function showRealEstate($id)
    {
        $realEstate = Realestate::findOrFail($id);
        $realEstate->views++;
        $realEstate->save();
        $lots = Realestate::latest()->where([
      ['approvement',1],
      ['catch',1],
      ['cat_id',$realEstate->cat_id]
      ])->take(5)->get();
        $rel_realEstates = Realestate::latest()->where([
      ['approvement',1],
      ['cat_id',$realEstate->cat_id]
      ])->take(15)->get();
        // if (isset($realEstate->extraImages())) {
        //   print_r($realEstate->extraImages());
        // }
        return view('site.RealEstate', compact('realEstate', 'lots', 'rel_realEstates'));
    }


    public function searchResult(Request $request)
    {
        $searchCondtions=$this->setSearchConditions($request);
        $realEstates = RealEstate::latest()->where($searchCondtions)->paginate(12);
        return view('site.Listing', compact('realEstates'));
    }

    public function getsearchResult(Request $request)
    {
        return 1;
        $searchCondtions=$this->setSearchConditions($request);
        $realEstates = RealEstate::latest()->where($searchCondtions)->paginate(12);
        return view('site.Listing', compact('realEstates'));
    }

    public function addrealestate()
    {
        $categories = Realestatecategory::all();
        return view('site.addrealestate', compact('categories'));
    }

    public function storerealestate(Request $request)
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
        $msg = 'تم اضافه عقارك برقم '.$realEstate->id;
        return redirect('addrealestate')->with('success', $msg);
    }

    public function Ajax_get_districts_fields_site(Request $request)
    {
        if ($request->ajax()) {
            $districts = District::where('cat_id', $request->cat_id)->get()->toArray();
            $fields = Categoryfeild::where('cat_id', $request->cat_id)->get()->toArray();

            $data = view('cpanel.districts.ajaxdistricts', compact('districts'))->render();
            $dataFields = view('site.ajaxfields', compact('fields'))->render();

            return response()->json(['options'=>$data,'fields'=>$dataFields]);
        }
    }






    private function setSearchConditions($request)
    {
        $array = ['type','cat_id','price','area','district','id'];

        if (isset($request->type)) {
            $searchCondtions[]=['type',$request->type];
        }
        if (isset($request->id)) {
            $searchCondtions[]=['id',$request->id];
        }
        if (isset($request->cat_id)) {
            $searchCondtions[]=['cat_id',$request->cat_id];
        }
        if (isset($request->district)) {
            $searchCondtions[]=['district',$request->district];
        }
        if (isset($request->price[0])) {
            $searchCondtions[]=['price','>=',(int)$request->price[0]];
        }
        if (isset($request->price[1])) {
            $searchCondtions[]=['price','<=',(int)$request->price[1]];
        }
        if (isset($request->area[0])) {
            $searchCondtions[]=['area','>=',(int)$request->area[0]];
        }
        if (isset($request->area[1])) {
            $searchCondtions[]=['area','<=',(int)$request->area[1]];
        }

        if (isset($searchCondtions)) {
            return $searchCondtions;
        }

        return 1;
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
}// class ending
