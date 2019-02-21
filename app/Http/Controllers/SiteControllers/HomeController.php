<?php

namespace App\Http\Controllers\SiteControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Realestate;
use App\Realestatecategory;
use App\Slider;
use App\News;
use App\Testinomial;
use App\Advice;

class HomeController extends Controller
{
    public function index()
    {
        $slides = Slider::all();
        $realEstates = Realestate::latest()->where('approvement', 1)->paginate(9);
        $lots = Realestate::latest()->where(['approvement'=> 1, 'catch'=>1])->paginate(9);
        $mostseen = Realestate::orderBy('views', 'desc')->where('approvement', 1)->paginate(9);
        $news = News::latest()->take(5)->get();
        $testinomials = Testinomial::all();
        $advices=Advice::whereActive(1)->paginate(6);


        return view('site.homePage', compact('slides', 'realEstates', 'news', 'testinomials', 'advices', 'lots', 'mostseen'));
    }
}
