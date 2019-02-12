<?php

namespace App\Http\Controllers\SiteControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Realestate;

class Newscontroller extends Controller
{
    public function GetAllNewsPage()
    {
        $allactivenews=News::whereActive(1)->paginate(10);
        // return $allactiveadvices;
        return view('site.allnewspage', compact('allactivenews'));
    }
    public function GetOneNewePage($new_id)
    {
        $lots = Realestate::latest()->where([
  ['approvement',1],
  ['catch',1]
  ])->take(5)->get();
        $onenew=News::whereId($new_id)->first();
        if (isset($onenew)) {
            $onenew->view=$onenew->view +1;
            $onenew->save();
            return view('site.onenewpage', compact('onenew', 'lots'));
        }
    }
}
