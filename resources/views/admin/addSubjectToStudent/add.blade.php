

@extends('layout.master')
@section('bread_crumb')
<div class="page-breadcrumb">
    <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">add students</h4>
        <div class="ms-auto text-end">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">
              <a href="#">Add New</a></li>
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
@endsection

@section('content')
@section('content')
<div class="row">
  <div class="col-12">
  <div class="card">

<form class="form-horizontal" action="{{ route('subject_student.create') }}" enctype="multipart/form-data" method="post">
  {{-- @method('put') --}}
  @csrf
  <div class="card-body">
    {{-- @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $val )
            <li>{{ $val }}</li>
          @endforeach
        </ul>
      </div>
    @endif --}}
    @if(Session::has('msg'))
    <div class="alert alert-success">{{ Session::get('msg') }}</div>
    @endif
  
    
    <div class="form-group row">
        <label
          for="fname"
          class="col-sm-3 text-end control-label col-form-label"
          >Department</label
        >
        <div class="col-sm-9">
          <select class="form-control" name="ssn">
            @foreach ($datastudent as $val)
            <option value="{{ $val['ssn'] }}">{{ $val['fname']." ".$val['lname'] }}</option>
            @endforeach
              
         
          </select>
        </div>
      </div>

 
   
  
    
    <div class="form-group row">
      <label
        for="fname"
        class="col-sm-3 text-end control-label col-form-label"
        >Department</label
      >
      <div class="col-sm-9">
        <select class="form-control" name="id_subject">
          @foreach ($datasubject as $val)
          <option value="{{ $val['id'] }}">{{ $val['name'] }}</option>
          @endforeach
       
        </select>
      </div>
    </div>
  </div>
  <div class="border-top">
    <div class="card-body">
      <button type="submit" class="btn btn-primary">
        Add
      </button>
    </div>
  </div>
</form>
  </div>
  </div>
</div>
@endsection