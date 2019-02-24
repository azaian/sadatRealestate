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
use App\Subscriber;

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


    public function addemail(Request $request)
    {
        $newsubscriber=new Subscriber();
        $newsubscriber->email=$request->email;
        $newsubscriber->save();
//        \Mail::to($request->email)->send(new \App\Mail\Subscribermail());
//
//        MAIL_DRIVER=smtp
        //MAIL_HOST=smtp.gmail.com
        //MAIL_PORT=587
        //MAIL_USERNAME='zayed.grand@gmail.com'
        //MAIL_PASSWORD='wuudxbrxoguzyptm'
        //MAIL_ENCRYPTION=tls
        //MAIL_FROM_NAME='ana saudi'
        //MAIL_FROM_ADDRESS='zayed.grand@gmail.com'
        //https://stackoverflow.com/questions/32515245/how-to-to-send-mail-using-gmail-in-laravel-5-1
        return redirect()->back();
    }
}
