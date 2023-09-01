<?php

namespace App\Http\Controllers;

use App\Models\subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=subject::get();
        return view('admin.subject.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subject.addsubject');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id'=>'required|unique:subject|numeric',
            'name'=>'required'
        ]);
        subject::create([
            'id'=>$request->id,
            'name'=>$request->name
        ]);
        return redirect()->back()->with('msg','added....................');
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
        $data=subject::findorfail($id);
        return view('admin.subject.edit',['data'=>$data]);
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
        $request->validate([
            'id'=>'required|numeric',
            'name'=>'required'
        ]);

        $data=subject::findorfail($id);
        $data->update([
            'id'=>$request->id,
            'name'=>$request->name
        ]);
        return redirect()->route('subjects.index')->with('msg','updated...........................');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=subject::findorfail($id);
        $data->delete();
        return back()->with('msg2','deleted.....................');
    }
    public function archive(){
        $data=subject::onlyTrashed()->get();
        return view('admin.subject.archive',['data'=>$data]);
    }
    public function restoreSubject($id){
        $data=subject::withTrashed()->findOrFail($id);
        $data->restore();
        return redirect()->route('subjects.index')->with('msg','restored.................');
    }
    public function forcedelete($id){
        $data=subject::withTrashed()->findOrFail($id);
        $data->forceDelete();
        return back()->with('msg2','deleted........................');
    }
}
