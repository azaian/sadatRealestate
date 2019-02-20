<?php

namespace App\Http\Controllers\SiteControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contactus;
class Contactuscontroller extends Controller
{
    public function index(){
      return view('site.Contactuspage');
    }
    public function sendnewmessage(Request $request){
      // return $request->all();
      $newMessage=new Contactus();
      $newMessage->name=$request->name;
      $newMessage->mobilenumber=$request->mobilenumber;
      $newMessage->email=$request->email;
      $newMessage->message=$request->message;
      $newMessage->save();
      return redirect()->back();
    }
}
