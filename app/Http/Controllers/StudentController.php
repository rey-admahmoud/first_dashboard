<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\student;
use App\Models\subject;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        $studentdata=student::get();
        return view('admin.students.index',['studentdata'=>$studentdata]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deptdata=department::select('dno','dname')->get();
        return view('admin.students.create',['deptdata'=>$deptdata]);
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
            'ssn'=>'unique:students|required|min:1|max:100|numeric',
            'fname'=>'required|min:2|max:50',
            'lname'=>'required|min:2|max:50',
            'email'=>'email',
            'username'=>'unique:students|required|min:4|max:20',
            'gender'=>'required',
            'image'=>'nullable|image',
        ]);

        if($request->file('image')){
            $dataimage=$request->file('image')->getClientOriginalName();
            $dataimage=rand(0,54132365643).$dataimage;
            $path= $request->file('image')->storeAs('students',$dataimage,'upload');
        }else{
            $dataimage='null';
        }
        
        student::create([
            'ssn'=>$request->ssn,
            'fname'=>$request->fname,
            'lname'=>$request->lname,
            'email'=>$request->email,
            'username'=>$request->username,
            'gender'=>$request->gender,
            'image'=>$dataimage,
            'dno'=>$request->department
        ]);
   
        
        
        return redirect()->back()->with('msg','added........................');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($val)
    {
        $showdata=student::findorfail($val); 
        $deptstudent=$showdata->department;
        $substudent=$showdata->subject;
        return view('admin.students.show',['showdata'=>$showdata,'deptstudent'=>$deptstudent,'substudent'=>$substudent]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($val)
    {
        $deptdata=department::select('dno','dname')->get();
        $datassn=student::findorfail($val);
        return view('admin.students.edit',['deptdata'=>$deptdata,'datassn'=>$datassn]);
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
        $student=student::findorfail($id);
       
        
        $student->update([
            'ssn'=>$request->ssn,
            'fname'=>$request->fname,
            'lname'=>$request->lname,
            'email'=>$request->email,
            'username'=>$request->username,
            'gender'=>$request->gender,
            'dno'=>$request->department
        ]);
       
        return redirect()->route('students.index')->with('msg','update..................');

       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletstudent=student::findorfail($id);
        $deletstudent->delete();
        return redirect()->route('students.index');
    }
    public function archive(){

        $studentdata =student::onlyTrashed()->select()->get();
        return view('admin.students.archive',['studentdata'=>$studentdata]);

    }
    public function forcedelete($id){
        $data=student::withTrashed()->findorfail($id);
        $data->forcedelete();
        return back();
    }
    public function restore($id){
        student::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('students.index');
    }
 
}
