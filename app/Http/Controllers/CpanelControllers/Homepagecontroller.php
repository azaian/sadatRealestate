<?php

namespace App\Http\Controllers\CpanelControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;
use App\Realestate;
use App\Project;
use App\News;
use App\Advice;
// use App\Slider;
// use App\Slider;
class Homepagecontroller extends Controller
{
    public function index()
    {
      $slidercount=Slider::count();
      $realstatcount=Realestate::count();
      $projectscount=Project::count();
      $newscount=News::count();
      $advicecount=Advice::count();
        return view('cpanel.index',compact('slidercount','realstatcount','projectscount','newscount','advicecount'));
    }
}
