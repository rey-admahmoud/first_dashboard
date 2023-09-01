<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\subject;
use App\Models\subject_student;
use Illuminate\Http\Request;

class AddsubjecttostudentController extends Controller
{
    public function index(){
        $datastudent=student::select()->get();
        $datasubject=subject::select()->get();
        return view('admin.addSubjectToStudent.add',['datastudent'=>$datastudent,'datasubject'=>$datasubject]);
    }
    public function create(Request $request){
        $request->validate([
            // 'id_subject'=>'required',
            // 'id_student'=>'required'
        ]);
        subject_student::create([
            'id_subject'=>$request->id_subject,
            'id_student'=>$request->ssn
        ]);
        return back()->with('msg','added.....................');
    }
}
