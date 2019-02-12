<?php

namespace App\Http\Controllers\SiteControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Advice;
class Advicecontroller extends Controller
{
    public function GetAllAdvicesPage(){
      $allactiveadvices=Advice::whereActive(1)->paginate(10);
      // return $allactiveadvices;
      return view('site.alladvicespage',compact('allactiveadvices'));
    }
    public function GetOneAdvicePage($advice_id){
      $advice=Advice::whereId($advice_id)->first();

      if (isset($advice)) {
        $advice->view=$advice->view +1;
        $advice->save();
        return view('site.oneadvicepage',compact('advice'));
      }
    }
}
