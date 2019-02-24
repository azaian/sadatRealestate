<?php

namespace App\Http\Controllers\CpanelControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subscriber;

class Subscribercontroller extends Controller
{

      /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */

      public function index()
      {
          $subscribers = Subscriber::all();

          return view('cpanel.subscribe.index', compact('subscribers'));
      }

      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function create()
      {
          return view('cpanel.subscribe.add');
      }

      /**
       * Store a newly created resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\Http\Response
       */
      public function store(Request $request)
      {
        //   return $request->all();

            Sendmailwithaction($request->message);
    //       $subscriber=Subscriber::all();
    //     if (isset($subscriber) && count($subscriber) > 0) {
    //     	   foreach ($subscriber as $onesubscriber) {
    // \Mail::to($onesubscriber->email)->send(new \App\Mail\Sendmail($request->message));
    //     	   }
    //     }
        
                return redirect()->back()->with('success', 'تم ارسال الرساله بنجاح ');

      }

      /**
       * Display the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function show($id)
      {
        $subscriber=Subscriber::find($id);
        return view('cpanel.subscribe.edit', compact('subscriber'));
      }

      /**
       * Show the form for editing the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function edit($id)
      {

          $subscriber=Subscriber::find($id);
          $subscriber->delete();
          return redirect()->back()->with('delete', 'تم مسح العنصر');
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
        // return $request->all();
        $subscriber=Subscriber::find($id);
        if (isset($subscriber)) {
            \Mail::to($subscriber->email)->send(new \App\Mail\Sendmail($request->message));
        }
        
        
                return redirect()->back()->with('success', 'تم ارسال الرساله بنجاح ');

      }

      /**
       * Remove the specified resource from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function delete($id)
      {
          $subscriber=Subscriber::find($id);
          $subscriber->delete();
          return redirect()->back()->with('delete', 'تم مسح العنصر');
      }


  }
