<?php

namespace App\Http\Controllers;
use App\Models\department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deptdata=department::get();
        return view('admin.departments.index',['deptdata'=>$deptdata]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.departments.create');
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
            'dno'=>'required|min:1|max:100',
            'dname'=>'required|min:2|max:15|unique:departments'
        ]);
        department::create([
            'dno'=>$request->dno,
            'dname'=>$request->dname
        ]);
        
        return redirect()->route('departments.index')->with('msg','added....................');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=department::findorfail($id);
        return view('admin.departments.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=department::findorfail($id);
        return view('admin.departments.edit',['data'=>$data]);
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
                'dno'=>'required|min:1|max:100',
                'dname'=>'required|min:2|max:15|unique:departments'
            ]);
            $data=department::findorfail($id);
            // return $request;
            $data->update([
                'dname'=>$request->dname
            ]);
            return redirect()->route('departments.index')->with('msg','update........................');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $daletedept=department::findorfail($id);
       $daletedept->delete();
       return redirect()->route('departments.index')->with('msg2','deleted..........................');
    }

    public function archive(){
        $deptdata=department::onlyTrashed()->select()->get();
        
        return view('admin.departments.archive',['deptdata'=>$deptdata]);
    }
    public function restore($id){
        $data=department::withTrashed()->findOrFail($id);
        $data->restore();
        return back();
    }
    public function forcedelete($id){
        $data=department::withTrashed()->findOrFail($id);
        $data->forceDelete();
        return back();
    }
}
