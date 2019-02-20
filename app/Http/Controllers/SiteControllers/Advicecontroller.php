<?php

namespace App\Http\Controllers\SiteControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Advice;
use App\Realestate;

class Advicecontroller extends Controller
{
    public function GetAllAdvicesPage()
    {
        $allactiveadvices=Advice::whereActive(1)->paginate(10);
        $lots = Realestate::latest()->where([
['approvement',1],
['catch',1]
])->take(3)->get();
        // return $allactiveadvices;
        return view('site.alladvicespage', compact('allactiveadvices', 'lots'));
    }
    public function GetOneAdvicePage($advice_id)
    {
        $advice=Advice::whereId($advice_id)->first();
        $lots = Realestate::latest()->where([
['approvement',1],
['catch',1]
])->take(5)->get();
        if (isset($advice)) {
            $advice->view=$advice->view +1;
            $advice->save();
            return view('site.oneadvicepage', compact('advice', 'lots'));
        }
    }
}
