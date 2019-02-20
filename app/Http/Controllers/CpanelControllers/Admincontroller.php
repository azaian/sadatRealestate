<?php

namespace App\Http\Controllers\CpanelControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
class Admincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $alladmins=User::where('id','!=','1')->get();
        return view('cpanel.admin.index',compact('alladmins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    if ($request->password != $request->password_confirmation) {
      return redirect()->back()->with('error', 'الارقام السريه غير متطابقه');
    }
    if (!isset($request->email)) {
      return redirect()->back()->with('error', 'عليك اختيار بريد الكترونى ');
    }
    
    if(User::whereEmail($request->email)->first()){
      return redirect()->back()->with('error', 'عليك اختيار بريد الكترونى  مختلف هذا البريد مستخدم من قبل ');  
    }

    $newadmin=new User();
    $newadmin->name=$request->name;
    $newadmin->email=$request->email;
    $newadmin->superadmin=0;
    $newadmin->password=Hash::make($request->password);
    $newadmin->save();
      return redirect()->back()->with('success', 'تم اضافه  المدير بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usertochangepriv=User::find($id);
        if ($usertochangepriv->superadmin == 1 ) {
          $usertochangepriv->superadmin=0;
        }else{
          $usertochangepriv->superadmin=1;
        }
        $usertochangepriv->save();
        return redirect()->back()->with('success', 'تم تغير الصلاحيه');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
