<?php

namespace App\Http\Controllers\CpanelControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Testinomial;

class testinomialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testinomials = Testinomial::all();
        return view('cpanel.testinomial.index', compact('testinomials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $testinomial = new Testinomial();
        $testinomial->name =  $request->name;
        $testinomial->description =  $request->description;
        $testinomial->save();
        return redirect()->back()->with('success', 'تم اضافه ');
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
        $testinomial = Testinomial::findOrFail($id);
        return view('cpanel.testinomial.edit', compact('testinomial'));
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
        $testinomial = Testinomial::findOrFail($id);
        $testinomial->name =  $request->name;
        $testinomial->description =  $request->description;
        $testinomial->save();
        return redirect()->back()->with('success', ' تم التعديل ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testinomial = Testinomial::findOrFail($id);
        $testinomial->delete();
        return redirect()->route('testinomial.index')->with('success', 'تم الحذف');
    }
}
