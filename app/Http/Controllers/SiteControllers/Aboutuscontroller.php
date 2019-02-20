<?php

namespace App\Http\Controllers\SiteControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Aboutus;
class Aboutuscontroller extends Controller
{
    public function index(){
      $allaboutusmessages=Aboutus::all();
      return view('site.Aboutuspage',compact('allaboutusmessages'));
    }

}
